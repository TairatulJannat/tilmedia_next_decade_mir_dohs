
<?php $__env->startSection('title', 'User Management'); ?>
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main_menu', 'User Management'); ?>
<?php $__env->startSection('active_menu', 'User'); ?>
<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User List</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered yajra-datatable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th width="100px">Action</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(function () {
            var table = $('.yajra-datatable').DataTable({
                "order": [[1, 'desc']],
                "bFilter": false,
                "columnDefs": [
                    {"className": "dt-center", "targets": "_all"}
                ], "bDestroy": true,
                processing: true,
                serverSide: true,
                "language": {
                    processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
                },
                ajax: {
                    url: "<?php echo e(url('admin/search_user')); ?>",
                    type: 'POSt',
                    data: function (d) {
                        d.name = $('#name').val();
                        d._token = '<?php echo e(csrf_token()); ?>'
                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false},
                    {data: 'name', name: 'name', orderable: true},
                    {data: 'contact_no', name: 'contact_no', orderable: false},
                    {data: 'email', name: 'email', orderable: false},
                    {data: 'address', name: 'address', orderable: false},
                    {data: 'status', name: 'status', orderable: false},
                    {data: 'action', name: 'action', searchable: false,},
                ],
            });
            $('#search_form').on('submit', function (event) {
                event.preventDefault();
                table.draw(true);
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tilmedia_next_decade_mir_dohs\resources\views/backend/user/index.blade.php ENDPATH**/ ?>