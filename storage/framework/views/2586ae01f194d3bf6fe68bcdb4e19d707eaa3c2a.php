<?php
$currentControllerName = Request::segment(2);
$currentFullRouteName = Route::getFacadeRoot()
    ->current()
    ->uri();
    // dd($currentControllerName);
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!--Logo Section -->
    <a href="<?php echo e(route('admin_dashboard')); ?>" class="brand-link">
        <img src="<?php echo e(asset('public/assets/backend/img/logo.png')); ?>" alt="TLMEDIA Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">TILMEDIA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- User Information -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo e(asset('public/assets/backend/img/avatar.png')); ?>" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo e(Session::get('LoggedAdminName,')); ?></a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="<?php echo e(route('admin_dashboard')); ?>"
                        class="nav-link <?php echo e($currentControllerName == 'dashboard' || null ? 'active' : ''); ?> <?php echo e($currentControllerName == null ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                
                <?php $menuArr = ['admin_list', 'admin_create'] ?>
                <li class="nav-item <?php echo e(in_array($currentControllerName, $menuArr) ? 'menu-open' : ''); ?>">
                    <a href="#" class="nav-link <?php echo e(in_array($currentControllerName, $menuArr) ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Admin
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin_list')); ?>"
                                class="nav-link <?php echo e($currentControllerName == 'admin_list' ? 'active' : ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Admins</p>
                            </a>
                        </li>
                        
                        
                    </ul>
                </li>


                  
                  <?php $menuArr = ['role_list','role_list'] ?>
                  <li class="nav-item <?php echo e(in_array($currentControllerName, $menuArr) ? 'menu-open' : ''); ?>">
                      <a href="#" class="nav-link <?php echo e(in_array($currentControllerName, $menuArr) ? 'active' : ''); ?>">
                          <i class="fas fa-cubes"></i>
                          <p>
                              Role Management
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right">2</span>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="<?php echo e(route('role_list')); ?>" class="nav-link <?php echo e($currentControllerName == 'role_list' ? 'active' : ''); ?>">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>All Roles</p>
                              </a>
                          </li>
                          
                      </ul>
                  </li>

                
                <?php $menuArr = ['user_list', 'user_create'] ?>
                <li class="nav-item <?php echo e(in_array($currentControllerName, $menuArr) ? 'menu-open' : ''); ?>">
                    <a href="" class="nav-link <?php echo e(in_array($currentControllerName, $menuArr) ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users profile
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('customer_profile')); ?>"
                                class="nav-link <?php echo e($currentControllerName == 'customer_profile' ? 'active' : ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('user_list')); ?>"
                                class="nav-link <?php echo e($currentControllerName == 'user_list' ? 'active' : ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('user_create')); ?>" class="nav-link <?php echo e($currentControllerName == 'user_create' ? 'active' : ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>

                
                <?php $menuArr = ['package_list', 'package_create'] ?>
                <li class="nav-item <?php echo e(in_array($currentControllerName, $menuArr) ? 'menu-open' : ''); ?>">
                    <a href="#" class="nav-link <?php echo e(in_array($currentControllerName, $menuArr) ? 'active' : ''); ?>">
                        <i class="fas fa-cubes"></i>
                        <p>
                            Packages
                            <i class="fas fa-angle-left right"></i>  
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('package_list')); ?>" class="nav-link <?php echo e($currentControllerName == 'package_list' ? 'active' : ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Packages</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('package_create')); ?>" class="nav-link <?php echo e($currentControllerName == 'package_create' ? 'active' : ''); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Package</p>
                            </a>
                        </li>
                    </ul>
                </li>


                
              

                <li class="nav-header">Others</li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Calendar
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH C:\xampp\htdocs\tilmedia\resources\views/backend/layout/sidebar.blade.php ENDPATH**/ ?>