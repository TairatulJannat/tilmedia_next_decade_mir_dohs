@extends('backend.layout.app')
@section('title', 'SetTopBox')
@push('css')
<link href="{{ asset('public/assets/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/assets/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ asset('public/assets/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@section('main_menu', 'SetTopBox Management')
@section('active_menu', 'SetTopBox')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row justify-content-between align-items-center">
            <div class="col-6">
                <h6 class="card-title">Total: <span class="badge badge-secondary" id="total_data"></span></h6>
            </div>
            <div class="col-md-6" style="text-align: right">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_modal">
                    Add SetTopBox
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Sc_id</th>
                    <th>Stb_id</th>
                    <th>Status</th>
                    <th width="100px">Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@include('backend.setTopBox.setTopBox_edit')
@include('backend.setTopBox.setTopBox_create')

@endsection
@push('js')
<script src="{{ asset('public/assets/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/assets/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('public/assets/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/assets/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('public/assets/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/assets/backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('public/assets/backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('public/assets/backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@include('backend.setTopBox.setTopBox_js')
@endpush