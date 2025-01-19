<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        @role('admin')


        <li class="nav-item has-treeview {{ Route::is('admin.house.index') || Route::is('admin.house.create') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Route::is('admin.house.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Houses
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.house.index') }}" class="nav-link {{ Route::is('admin.house.index') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create / View Houses</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class=" d-none nav-item has-treeview {{ Route::is('admin.dustbin_types.index') || Route::is('admin.dustbin_types.create') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Route::is('admin.dustbin_types.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-trash-alt"></i>
                <p>
                    Dustbin Types
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.dustbin_types.index') }}" class="nav-link {{ Route::is('admin.dustbin_types.index') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create / View</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item has-treeview {{ Route::is('admin.dustbins.index') || Route::is('admin.dustbins.create') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Route::is('admin.dustbins.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-trash-alt"></i>
                <p>
                    Dustbin
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.dustbins.index') }}" class="nav-link {{ Route::is('admin.dustbin_types.index') ? 'active' : '' }}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Create / View</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.user.index') }}"
                class="nav-link {{ Route::is('admin.user.index') || Route::is('admin.user.create') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>Users
                    <span class="badge badge-info right">{{ $userCount }}</span>
                </p>
            </a>
        </li>
        <li class="nav-item d-none">
            <a href="{{ route('admin.role.index') }}"
                class="nav-link {{ Route::is('admin.role.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-tag"></i>
                <p>Role
                    <span class="badge badge-success right">{{ $RoleCount }}</span>
                </p>
            </a>
        </li>
        <li class="nav-item d-none">
            <a href="{{ route('admin.permission.index') }}"
                class="nav-link {{ Route::is('admin.permission.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-hat-cowboy"></i>
                <p>Permission
                    <span class="badge badge-danger right">{{ $PermissionCount }}</span>
                </p>
            </a>
        </li>
        <li class="nav-item d-none">
            <a href="{{ route('admin.category.index') }}"
                class="nav-link {{ Route::is('admin.category.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-list-alt"></i>
                <p>Category
                    <span class="badge badge-warning right">{{ $CategoryCount }}</span>
                </p>
            </a>
        </li>
        <li class="nav-item d-none">
            <a href="{{ route('admin.subcategory.index') }}"
                class="nav-link {{ Route::is('admin.subcategory.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-list"></i>
                <p>Sub Category
                    <span class="badge badge-secondary right">{{ $SubCategoryCount }}</span>
                </p>
            </a>
        </li>
        <li class="nav-item d-none">
            <a href="{{ route('admin.collection.index') }}"
                class="nav-link {{ Route::is('admin.collection.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-pdf"></i>
                <p>Collection
                    <span class="badge badge-primary right">{{ $CollectionCount }}</span>
                </p>
            </a>
        </li>
        <li class="nav-item d-none">
            <a href="{{ route('admin.product.index') }}"
                class="nav-link {{ Route::is('admin.product.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>Products
                    <span class="badge badge-warning right">{{ $ProductCount }}</span>
                </p>
            </a>
        </li>

        <li class="nav-item has-treeview {{ Route::is('admin.house_type.index') || Route::is('admin.house_type.create') || Route::is('admin.dustbin_types.index') || Route::is('admin.dustbin_types.create') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p> Setings <i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">

                <!-- Dustbin Type Menu -->
                <li class="nav-item {{ Route::is('admin.dustbin_types.index') || Route::is('admin.dustbin_types.create') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="fas fa-trash nav-icon"></i>
                        <p> Dustbin Type <i class="right fas fa-angle-left"></i> </p>
                    </a>
                    <ul class="nav nav-treeview {{ Route::is('admin.dustbin_types.index') || Route::is('admin.dustbin_types.create') ? 'menu-open' : '' }}">
                        <li class=" nav-item ">
                            <a href="{{ route('admin.dustbin_types.index') }}" class="nav-link {{ Route::is('admin.dustbin_types.index') || Route::is('admin.dustbin_types.create') ? 'active' : '' }}">
                                <i class="far {{ Route::is('admin.dustbin_types.index') || Route::is('admin.dustbin_types.create') ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                                <p>Create / View</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- House Type Menu -->
                <li class="nav-item {{ Route::is('admin.house_type.index') || Route::is('admin.house_type.create') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="fas fa-home nav-icon"></i>
                        <p> House Type <i class="right fas fa-angle-left"></i> </p>
                    </a>
                    <ul class="nav nav-treeview {{ Route::is('admin.house_type.index') || Route::is('admin.house_type.create') ? 'menu-open' : '' }}">
                        <li class=" nav-item ">
                            <a href="{{ route('admin.house_type.index') }}" class="nav-link {{ Route::is('admin.house_type.index') || Route::is('admin.house_type.create') ? 'active' : '' }}">
                                <i class="far {{ Route::is('admin.house_types.index') || Route::is('admin.house_types.create') ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                                <p>Create / View</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- House Type Menu -->
                <li class="nav-item d-none {{ Route::is('admin.house_type.index') || Route::is('admin.house_type.create') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="fas fa-home nav-icon"></i>
                        <p> House Type <i class="right fas fa-angle-left"></i> </p>
                    </a>
                    <ul class="nav nav-treeview {{ Route::is('admin.house_type.index') || Route::is('admin.house_type.create') ? 'menu-open' : '' }}">
                        <li class=" nav-item ">
                            <a href="{{ route('admin.house_type.index') }}" class="nav-link {{ Route::is('admin.house_type.index') || Route::is('admin.house_type.create') ? 'active' : '' }}">
                                <i class="far {{ Route::is('admin.house_types.index') || Route::is('admin.house_types.create') ? 'fa-dot-circle' : 'fa-circle' }} nav-icon"></i>
                                <p>Create / View</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        @endrole
        @role('agency')
        <li class="nav-item">
            <a href="{{ route('pickup.index') }}"
                class="nav-link {{ Route::is('pickup.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-th"></i>
                <p>Pickup</p>
            </a>
        </li>
        @endrole
        <li class="nav-item">
            <a href="{{ route('admin.profile.edit') }}"
                class="nav-link {{ Route::is('admin.profile.edit') ? 'active' : '' }}">
                <i class="nav-icon fas fa-id-card"></i>
                <p>Profile</p>
            </a>
        </li>

    </ul>
</nav>