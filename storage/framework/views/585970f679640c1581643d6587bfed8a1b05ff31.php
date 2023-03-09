
<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main_menu', 'Home'); ?>
<?php $__env->startSection('active_menu', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-12">
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tilmedia\resources\views/backend/dashboard.blade.php ENDPATH**/ ?>