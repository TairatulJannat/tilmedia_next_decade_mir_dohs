<?php $__env->startSection('title', 'User Management'); ?>
<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('main_menu', 'User Management'); ?>
<?php $__env->startSection('active_menu', 'Add User'); ?>

<?php $__env->startSection('content'); ?>
    <!-- left column -->
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="inputForm" autocomplete="off">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Name <span>*</span></label>
                            <input type="text" name="name" class="form-control" id="name"
                                placeholder="Enter name" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="email">Email address <span>*</span></label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="Enter email" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" name="phone" class="form-control" id="phone"
                                placeholder="Enter phone number">
                        </div>

                        <div class="form-group">
                            <label for="password">Password <span>*</span></label>
                            <input type="password" name="password" class="form-control" id="password"
                                placeholder="Password">
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control select2" style="width: 100%;">
                                <option selected="selected">Active</option>
                                <option>Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>
        $(function() {
            $.validator.setDefaults({
                submitHandler: function() {
                    alert("Form successful submitted!");
                }
            });
            $('#inputForm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                },
                messages: {
                    name: {
                        required: "Please enter your name"
                    },
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\tilmedia\resources\views/backend/user/create.blade.php ENDPATH**/ ?>