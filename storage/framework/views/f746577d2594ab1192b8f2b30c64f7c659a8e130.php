
<?php $__env->startSection('title', 'Admin Management'); ?>
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/plugins/fontawesome-free/css/all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(asset('assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/plugins/select2/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main_menu', 'Admin Management'); ?>
<?php $__env->startSection('active_menu', 'Admin'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="card-title">Admin List</h3>
                </div>
                <div class="col-md-6" style="text-align: right">
                    
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_modal">
                        Add Admin
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="add_modal" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <form id="SubmitForm" autocomplete="off">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">Name <span>*</span></label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Enter name" autocomplete="off">
                                <span id="error_name" class="text-danger error_field"></span>
                            </div>

                            <div class="form-group">
                                <label for="email">Email address <span>*</span></label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Enter email" autocomplete="off">
                                <span id="error_email" class="text-danger error_field"></span>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="mobile" class="form-control" id="mobile"
                                    placeholder="Enter phone number">
                                <span id="error_mobile" class="text-danger error_field"></span>
                            </div>

                            <div class="form-group">
                                <label for="password">Password <span>*</span></label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Password">
                                <span id="error_password" class="text-danger error_field"></span>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control" style="width: 100%;">
                                    <option selected="selected">Active</option>
                                    <option>Inactive</option>
                                </select>
                                <span id="error_status" class="text-danger error_field"></span>
                            </div>
                            <div class="form-group">
                                <label class="required">Role</label>
                                <select name="role_id" id="role_id" class="form-control select2">
                                    <option value="" selected>Please select your role</option>
                                    
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value=" <?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <span id="error_role_id" class="text-danger error_field"></span>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </div>
                    </form>
                    

                </div>
            </div>
        </div>

        
        <div class="modal fade" id="edit_modal" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <form id="updateSubmit" autocomplete="off">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <input type="hidden" id="edit_admin_id" value="">
                            <div class="form-group">
                                <label for="name">Name <span>*</span></label>
                                <input type="text" name="name" class="form-control" id="Editname"
                                    placeholder="Enter name" autocomplete="off">
                                <span id="error_name" class="text-danger error_field"></span>
                            </div>

                            <div class="form-group">
                                <label for="email">Email address <span>*</span></label>
                                <input type="email" name="email" class="form-control" id="Editemail"
                                    placeholder="Enter email" autocomplete="off">
                                <span id="error_email" class="text-danger error_field"></span>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="mobile" class="form-control" id="Editmobile"
                                    placeholder="Enter phone number">
                                <span id="error_mobile" class="text-danger error_field"></span>
                            </div>

                            <div class="form-group">
                                <label for="password">Password <span>*</span></label>
                                <input type="password" name="password" class="form-control" id="Editpassword"
                                    placeholder="Password">
                                <span id="error_password" class="text-danger error_field"></span>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control" style="width: 100%;">
                                    <option selected="selected">Active</option>
                                    <option>Inactive</option>
                                </select>
                                <span id="error_status" class="text-danger error_field"></span>
                            </div>
                            <div class="form-group">
                                <label class="required">Role</label>
                                <select name="role_id" id="Editrole_id" class="form-control">


                                </select>
                                <span id="error_role_id" class="text-danger error_field"></span>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                    

                </div>
            </div>
        </div>

        

        <!-- /.card-header -->
        <div class="card-body">
            <table id="test" class="table table-bordered table-striped">
                <?php
                $i = 1;
                ?>
                <thead>
                    <tr class="table-info">
                        <th scope="col">Serial</th>
                        <th scope="col">Role</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody class="admintable">


                </tbody>

                <tfoot>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Role</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/plugins/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/plugins/pdfmake/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/plugins/pdfmake/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/plugins/datatables-buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/backend/plugins/select2/js/select2.full.min.js')); ?> "></script>
    <script>
        function getdatatable() {
            $("#test").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#test_wrapper .col-md-6:eq(0)');

            //Initialize Select2 Elements
            $('.select2').select2()
        }


        $(document).ready(function() {
            getData()
            function getData() {
                $.ajax({
                    url: "<?php echo e(url('/admin/getAdmin')); ?>",
                    type: 'GET',
                    dataType: "json",
                    success: function(res) {
                        $('.admintable').html('');
                        console.log(res);
                        $.each(res.admins, function(key, admin) {
                            var role = "not assigned";
                            if (admin.role) {
                                role = admin.role.name
                            }
                            $('.admintable').append('<tr>\
                                <th scope="row">' + ++key + '</th>\
                                 <td>' + role + '</td>\
                                 <td>' + admin.name + '</td>\
                                 <td>' + admin.mobile + '</td>\
                                 <td>' + admin.email + '</td>\
                                 <td><button type="button" class="btn btn-sm btn-info edit_purchase" value="' + admin.id + '" data-toggle="modal" data-target="#edit_modal"> Edit </button>\
                                 &nbsp <button type="button" class="btn btn-sm btn-danger deleteAdmin" value="' + admin
                                .id + '" > Delete </button></td>\
                                ')
                        });
                    },
                    error: function(err) {},
                })
                getdatatable();
            }


            $('#SubmitForm').on('submit', function(e) {
                e.preventDefault();
                jQuery.ajax({
                    url: "<?php echo e(url('/admin/admin_create')); ?>",
                    type: "POST",
                    data: jQuery('#SubmitForm').serialize(),
                    success: function(response) {
                        if (response.success) {
                            $('#SubmitForm')[0].reset();
                            $('#add_modal').modal('hide');
                            getData();
                        }
                    },
                    error: function(response) {
                        $('#error_name').text(response.responseJSON.errors.name);
                        $('#error_email').text(response.responseJSON.errors.email);
                        $('#error_mobile').text(response.responseJSON.errors.mobile);
                        $('#error_password').text(response.responseJSON.errors.password);
                        $('#error_status').text(response.responseJSON.errors.status);
                        $('#error_role_id').text(response.responseJSON.errors.role_id);

                    }
                });
            });

            $(document).on('click', '.edit_purchase', function(e) {
                e.preventDefault();
                var admin_id = $(this).val();
                // alert(purchase_id);
                $.ajax({
                    url: "<?php echo e(url('/admin/edit-admin')); ?>" + "/" + admin_id,
                    success: function(data) {

                        $('#edit_admin_id').empty();
                        $('#Editname').empty();
                        $('#Editemail').empty();
                        $('#Editmobile').empty();
                        $('#Editpassword').empty();
                        $('#edit_admin_id').val(admin_id);
                        $('#Editname').val(data.admin.name);
                        $('#Editemail').val(data.admin.email);
                        $('#Editmobile').val(data.admin.mobile);
                        $('#Editpassword').val(data.admin.password);
                        var editroles = '<option value="' + data.admin.role.id +
                            '" selected >' + data.admin.role.name + '</option>';
                        $.each(data.roles, function(key, roleList) {
                            editroles += '<option value="' + roleList.id + '" >' +
                                roleList.name + '</option>';

                        });
                        $('#Editrole_id').html(editroles);

                    }
                });
            })

            $('#updateSubmit').submit(function(e) {
                e.preventDefault();
                let id = $('#edit_admin_id').val();
                // alert(id);
                let formData = new FormData(this);
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo e(url('/admin/update-admin')); ?>" + "/" + id,
                    data: formData,
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function(response) {
                        console.log(response);
                        $('#updateSubmit')[0].reset();
                        $('#edit_modal').modal('hide');
                        getData();
                    },
                })
            });

            $(document).on('click', '.deleteAdmin', function(e) {
                e.preventDefault();
                var id = $(this).val();
                // alert(id);
                jQuery.ajax({
                    url: "<?php echo e(url('/admin/delete-admin')); ?>" + "/" + id,
                    success: function() {
                        getData();
                    }
                });
            })


            function error_notification(message) {
                var notify = $.notify('<i class="fa fa-bell-o"></i><strong>' + message + '</strong> ', {
                    type: 'theme',
                    allow_dismiss: true,
                    delay: 2000,
                    showProgressbar: true,
                    timer: 300
                });
            }

            function clear_error_field() {
                $('#error_name').text('');
                $('#error_email').text('');
                $('#error_mobile').text('');
                $('#error_password').text('');
                $('#error_status').text('');
                $('#error_role_id').text('');
            }

        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tilmedia\resources\views/backend/admin/index.blade.php ENDPATH**/ ?>