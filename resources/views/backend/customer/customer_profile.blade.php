@extends('backend.layout.customer_app')
@section('title', 'Profile Management')
@push('css')
<link rel="stylesheet" href="{{ asset('assets/backend/plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush
@section('main_menu', 'Profile Management')
@section('active_menu', 'Profile')
{{-- @section('link', route('admin.adminDashboard')) --}}
@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset('assets/backend/img/avatar5.png') }}" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{$customer->name}}</h3>

                        <!-- <p class="text-muted text-center">Sgt</p> -->

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Mobile</b> <a class="float-right">{{$customer->contact_no}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Full name</b> <a class="float-right">{{$customer->name}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>User Status</b>
                                @if($customer->status == "1")
                                <span class="right badge badge-success float-right">Active</span>
                                @else
                                <span class="right badge badge-danger float-right">Inactive</span>
                                @endif
                            </li>
                            <li class="list-group-item">
                                <b>Address</b> <a class="float-right">{{$customer->address}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Payment Balance</b>
                                <b class="float-right">0 Tk</b>
                            </li>


                            <li class="list-group-item">
                                <b>Package Name</b> <a class="float-right">8 Mbps</a>
                            </li>

                            <li class="list-group-item bg-secondary p-2">
                                <b>Created By</b><a class="float-right">Admin</a>
                            </li>
                        </ul>

                        <a href="" class="btn btn-info btn-block">Export to Pdf</a>
                        <a href="" class="btn btn-success btn-block"><b>Edit Details</b></a>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card" id="payment">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#details" data-toggle="tab">Details</a></li>
                            {{-- <li class="nav-item"><a class="nav-link" href="#activity_log" data-toggle="tab">Activity
                                    History</a></li> --}}
                            <li class="nav-item"><a class="nav-link" href="#payment_history" data-toggle="tab">Payment
                                    History</a></li>
                            <li class="nav-item"><a class="nav-link" href="#card_payment" data-toggle="tab">Pay bill</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#change_password" data-toggle="tab">Change
                                    Password</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="details">
                                <div class="card" id="printMe">
                                    <div class="card-header">
                                        <h3 class="card-title">Subscriber Full Details</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="box">
                                            <div class="box-body no-padding">
                                                <table class="table table-condensed">
                                                    <tbody>
                                                        <tr>
                                                            <td>#.</td>
                                                            <td>Username:</td>
                                                            <td><b>{{$customer->name}}</b></td>

                                                            <td>#.</td>
                                                            <td>Email:</td>
                                                            <td><b>{{$customer->email}}</b></td>
                                                        </tr>

                                                        <tr>
                                                            <td>#.</td>
                                                            <td>Status:</td>
                                                            <td><b> @if($customer->status == "1")
                                                                <span class="badge badge-success float-right">Active</span>
                                                                @else
                                                                <span class="badge badge-danger float-right">Inactive</span>
                                                                @endif</b>
                                                            </td>

                                                            <td>#.</td>
                                                            <td>Mobile:</td>
                                                            <td><b>{{$customer->contact_no}}</b>
                                                            </td>
                                                        </tr>

                                                        <tr>

                                                            <td class="bg-gradient-fuchsia">#.</td>
                                                            <td class="bg-gradient-fuchsia">Connection From:</td>
                                                            <td class="bg-gradient-fuchsia"><b>{{$customer->connection_from}}</b>
                                                            </td>

                                                            <td class="bg-success">#.</td>
                                                            <td class="bg-success">Connection To:</td>
                                                            <td class="bg-success"><b>{{$customer->connection_to}}</b>
                                                            </td>

                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="change_password">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">Change Subscriber Password</div>
                                        <div class="card-body">
                                            <form method="POST" action="{{route ('password_reset') }}">
                                                <!-- <input type="hidden" name="_token" value="nAK6GGK4ANc64YNEZiaWUedZn9TDm6qMOQHuFss8"> -->
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="password" class="col-md-6 col-form-label">Old password</label>

                                                    <div class="col-md-12">
                                                        <input id="password" type="password" class="form-control" name="old_password" autocomplete="current-password">
                                                    </div>
                                                    @error('old_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group row">
                                                    <label for="password" class="col-md-6 col-form-label">New
                                                        Password</label>

                                                    <div class="col-md-12">
                                                        <input id="password" type="password" class="form-control" name="password" autocomplete="current-password">
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="password_confirmation" class="col-md-4 col-form-label ">New Confirm
                                                        Password</label>
                                                    <div class="col-md-12">
                                                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" autocomplete="password_confirmation">

                                                    </div>
                                                    <span class="text-warning" id="confirm_password-error"></span>
                                                </div>

                                                <div class="form-group row mb-0">
                                                    <div class="col-md-8 offset-md-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            Update Password
                                                        </button>
                                                    </div>

                                                </div>

                                            </form>

                                        </div>

                                    </div>

                                </div>
                            </div>

                            {{-- <div class="tab-pane" id="activity_log">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">Activity History</div>
                                        <div class="card-body">
                                            <div id="accordion">


                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div> --}}

                            <div class="tab-pane" id="payment_history">
                                <div class="col-md-12">
                                    <div class="card">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Card number</th>
                                                    <th>Amount</th>
                                                    <th>Type</th>
                                                    <th>Time</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Card number</th>
                                                    <th>Amount</th>
                                                    <th>Type</th>
                                                    <th>Time</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane" id="card_payment">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">Manual Card Recharge</div>
                                        <div class="card-body">
                                            <form method="POST" action="https://resnet.tilbd.net/super_admin/subscriber/manual_card_payment/1033" id="pay_with_scratchcard">
                                                <input type="hidden" name="_token" value="nAK6GGK4ANc64YNEZiaWUedZn9TDm6qMOQHuFss8">
                                                <div class="typewriter" id="output" style="display: block">
                                                    <h1 id="check_cratchcard_output"></h1>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="card_number" class="col-md-12 col-form-label">Enter
                                                        Subscriber Card
                                                        Number</label>
                                                    <div class="col-md-12">
                                                        <input id="card_number" type="text" class="form-control" name="card_number">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-0">
                                                    <div class="col-md-8 offset-md-2">
                                                        <button type="submit" class="btn btn-primary btn-block" id="pay_card_button" disabled="">Pay Now
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="manual_payent" tabindex="-1" role="dialog" aria-labelledby="manual_payentLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="manual_payentLabel">Make a Manual Payment for this User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="https://resnet.tilbd.net/super_admin/subscriber/subscriber_manual_payment" method="post">
                        <input type="hidden" name="_token" value="nAK6GGK4ANc64YNEZiaWUedZn9TDm6qMOQHuFss8">
                        <div class="modal-body">
                            <input type="hidden" value="1033" name="subscriber_id">
                            <div class="form-group">
                                <label for="payment_date">Payment Date</label>
                                <input type="date" class="form-control" name="payment_date" required>
                            </div>
                            <div class="form-group">
                                <label for="amount">Payment Amount</label>
                                <input type="number" class="form-control" name="amount" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save payment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@push('js')
<script src="{{ asset('assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
    $(function() {
        $("#test").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#test_wrapper .col-md-6:eq(0)');

    });
    @endpush