<?php
$currentControllerName = Request::segment(2);
$currentFullRouteName = Route::getFacadeRoot()
    ->current()
    ->uri();
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    
    <a href="{{ route('admin_dashboard') }}" class="brand-link">
        <img src="{{ asset('public/assets/backend/img/logo.png') }}" alt="TLMEDIA Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">TILMEDIA</span>
    </a>
    
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('public/assets/backend/img/avatar.png') }}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Session::get('LoggedAdminName') }}</a>
            </div>
        </div>
        
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                
                <li class="nav-item">
                    <a href="{{ route('admin_dashboard') }}"
                       class="nav-link {{ $currentControllerName == 'dashboard' || null ? 'active' : '' }} {{ $currentControllerName == null ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                
                {{-- Package --}}
                <?php $menuArr = ['package_list', 'package_create'] ?>
                <li class="nav-item {{ in_array($currentControllerName, $menuArr) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{  in_array($currentControllerName, $menuArr) ? 'active' : '' }}">
                        <i class="fas fa-cubes"></i>
                        <p>
                            Packages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('package_list') }}" class="nav-link {{ $currentControllerName == 'package_list' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Packages</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                {{-- User --}}
                <?php $menuArr = ['user_list', 'user_create'] ?>
                <li class="nav-item {{ in_array($currentControllerName, $menuArr) ? 'menu-open' : '' }}">
                    <a href="" class="nav-link {{  in_array($currentControllerName, $menuArr) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Customers
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('customer_profile')}}"
                               class="nav-link {{ $currentControllerName == 'customer_profile' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user_list') }}"
                               class="nav-link {{ $currentControllerName == 'user_list' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Customer</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                {{-- set top box box --}}
                <?php $menuArr = ['setTop_box', 'package_create'] ?>
                <li class="nav-item {{ in_array($currentControllerName, $menuArr) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{  in_array($currentControllerName, $menuArr) ? 'active' : '' }}">
                        <i class="fas fa-cubes"></i>
                        <p>
                            SetTop Box
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('setTop_box') }}" class="nav-link {{ $currentControllerName == 'setTop_box' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All SetTop Box </p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-header">Role Permission</li>
                <?php $menuArr = ['admin_list', 'admin_create'] ?>
                <li class="nav-item {{ in_array($currentControllerName, $menuArr) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{  in_array($currentControllerName, $menuArr) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Admin
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin_list') }}"
                               class="nav-link {{ $currentControllerName == 'admin_list' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Admins</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                
                {{-- Role --}}
                <?php $menuArr = ['role_list', 'role_list'] ?>
                <li class="nav-item {{ in_array($currentControllerName, $menuArr) ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{  in_array($currentControllerName, $menuArr) ? 'active' : '' }}">
                        <i class="fas fa-cubes"></i>
                        <p>
                            Role Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('role_list') }}" class="nav-link {{ $currentControllerName == 'role_list' ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Roles</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
