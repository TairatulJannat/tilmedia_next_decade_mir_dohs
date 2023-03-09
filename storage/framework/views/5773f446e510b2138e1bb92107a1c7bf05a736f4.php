<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title'); ?> - <?php echo e(config('app.name')); ?></title>
    <link rel="apple-touch-icon" href="<?php echo e(asset('public/assets/backend/img/logo.png')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('public/assets/backend/img/logo.png')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('public/assets/backend/plugins/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/backend/css/adminlte.min.css')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="<?php echo e(asset('public/assets/backend/plugins/select2/css/select2.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/backend/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/assets/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
    <?php echo $__env->yieldPushContent('css'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php echo $__env->make('backend.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('backend.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1><?php echo $__env->yieldContent('title'); ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo $__env->yieldContent('link'); ?>"><?php echo $__env->yieldContent('main_menu'); ?></a></li>
                                <li class="breadcrumb-item active"><?php echo $__env->yieldContent('active_menu'); ?></li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <?php echo $__env->yieldContent('content'); ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php echo $__env->make('backend.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\tilmedia_next_decade_mir_dohs\resources\views/backend/layout/app.blade.php ENDPATH**/ ?>