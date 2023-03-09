
<?php $__env->startSection('title', 'Role'); ?>
<?php $__env->startPush('css'); ?>
<link href="<?php echo e(asset('public/assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('public/assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('public/assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main_menu', 'Role Management'); ?>
<?php $__env->startSection('active_menu', 'Role'); ?>
<?php $__env->startSection('content'); ?>
<div class="card">
    <div class="card-header">
        <div class="row justify-content-between align-items-center">
            <div class="col-6">
                <h6 class="card-title">Total: <span class="badge badge-secondary" id="total_data"></span></h6>
            </div>
            <div class="col-md-6" style="text-align: right">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_modal">
                    Add Role
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
<?php echo $__env->make('backend.role.role_create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backend.role.role_edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('public/assets/backend/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/backend/plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/backend/plugins/datatables-buttons/js/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/backend/plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>"></script>
<?php echo $__env->make('backend.role.role_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('backend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tilmedia_next_decade_mir_dohs\resources\views/backend/role/index.blade.php ENDPATH**/ ?>