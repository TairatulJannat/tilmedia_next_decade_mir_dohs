@extends('backend.layout.app')
@section('title', 'Package Management')
@push('css')
@endpush
@section('main_menu', 'Package Management')
@section('active_menu', 'Add Package')
{{-- @section('link', route('admin.adminDashboard')) --}}
@section('content')
    <!-- left column -->
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Package</h3>
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
@endsection
@push('js')
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
@endpush
