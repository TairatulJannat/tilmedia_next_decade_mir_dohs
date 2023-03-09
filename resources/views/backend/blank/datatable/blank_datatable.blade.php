@extends('backend.layout.app')
@section('title', 'User Management')
@push('css')
    <link href="{{ asset('public/assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@section('main_menu', 'User Management')
@section('active_menu', 'User')
@section('content')
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
@endsection
@push('js')
    <script src="{{ asset('public/assets/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}">
    <script src="{{ asset('public/assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('public/assets/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('public/assets/backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('public/assets/backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('public/assets/backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    @include('backend.blank.datatable.blank_datatable_js')
@endpush
