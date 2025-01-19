<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\DustbinController;
use App\Http\Controllers\DustbinTypesController;
use App\Http\Controllers\GarbageCollectionController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\HouseTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PickupController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCateoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('user', UserController::class);
        Route::resource('role', RoleController::class);
        Route::resource('permission', PermissionController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('subcategory', SubCateoryController::class);
        Route::resource('collection', CollectionController::class);
        Route::resource('product', ProductController::class);
        Route::resource('house_type', HouseTypeController::class);
        Route::resource('house', HouseController::class);
        // Route::resource('dustbintypes', DustbinTypes::class);
        Route::resource('dustbin_types', DustbinTypesController::class);
        Route::get('/dustbins/check_dustbin_code', [DustbinController::class, 'checkDustbinCode'])->name('dustbins.check_dustbin_code');
        Route::resource('dustbins', DustbinController::class);
        // Route::resource('collection', GarbageCollectionController::class);
        Route::get('/get/subcategory', [ProductController::class, 'getsubcategory'])->name('getsubcategory');
        Route::get('/remove-external-img/{id}', [ProductController::class, 'removeImage'])->name('remove.image');
    });
});

Route::middleware(['auth', 'verified', 'role:agency'])->group(function () {
    Route::get('/scan/{code}', [PickupController::class, 'scan']);
    Route::resource('pickup', PickupController::class);
});
