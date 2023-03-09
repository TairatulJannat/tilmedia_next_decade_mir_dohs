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
        <img src="<?php echo e(asset('public/assets/backend/img/logo.png')); ?>" alt="TLMEDIA Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">TILMEDIA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- User Information -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo e(asset('public/assets/backend/img/avatar.png')); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo e(Session::get('LoggedCustomerName')); ?></a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="<?php echo e(route('admin_dashboard')); ?>" class="nav-link <?php echo e($currentControllerName == 'dashboard' || null ? 'active' : ''); ?> <?php echo e($currentControllerName == null ? 'active' : ''); ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside><?php /**PATH C:\xampp\htdocs\tilmedia_next_decade_mir_dohs\resources\views/backend/layout/customer_sidebar.blade.php ENDPATH**/ ?>