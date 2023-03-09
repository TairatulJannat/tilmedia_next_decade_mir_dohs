<script>
    $(function() {
        var table = $('.yajra-datatable').DataTable({
            "order": [
                [1, 'desc']
            ],
            "bFilter": false,
            "columnDefs": [{
                "className": "dt-center",
                "targets": "_all"
            }],
            "bDestroy": true,
            processing: true,
            serverSide: true,
            "language": {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
            },
            drawCallback: function(settings) {
                var api = this.api();
                $('#total_data').html(api.ajax.json().recordsTotal);
            },
            ajax: {
                url: "{{ url('admin/search_package') }}",
                type: 'POSt',
                data: function(d) {
                    d.name = $('#name').val();
                    d._token = '{{csrf_token()}}'
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name',
                    orderable: true
                },
                {
                    data: 'monthly_bill',
                    name: 'monthly_bill',
                    orderable: false
                },
                {
                    data: 'validity_days',
                    name: 'validity_days',
                    orderable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    searchable: false,
                },
            ],
        });
        $('#search_form').on('submit', function(event) {
            event.preventDefault();
            table.draw(true);
        });
    });

    // delete user
    function delete_data(id) {
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            buttonsStyling: false,
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                event.preventDefault();
                $.ajax({
                    type: 'get',
                    url: "{{url('admin/package_delete')}}/" + id,
                    success: function(response) {
                        if (response) {
                            if (response.permission == false) {
                                toastr.warning('you dont have that Permission', 'Permission Denied');
                            } else {
                                toastr.success('Deleted Successful', 'Deleted');
                                $('.yajra-datatable').DataTable().ajax.reload(null, false);
                            }
                        }
                    }
                });
            } else if (
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal(
                    'Cancelled',
                    'Your data is safe :)',
                    'error'
                )
            }
        })
    }


    // save information
    $('#save_info').off().on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "{{url('admin/package_create')}}",
            type: "POST",
            data: $(this).serializeArray(),
            success: function(response) {
                if (response) {
                    toastr.success('Information Saved', 'Saved');
                    $('#add_modal').modal('hide');
                    $('.yajra-datatable').DataTable().ajax.reload(null, false);


                }
            },
            error: function(response) {
                $('#error_name').text(response.responseJSON.errors.name);
                $('#error_monthly_bill').text(response.responseJSON.errors.monthly_bill);
                $('#error_validity_days').text(response.responseJSON.errors.validity_days);
            }
        });
    })

    // //edit info
    function edit(id) {
        event.preventDefault();
        $('#edit_model').modal('show');
        $.ajax({
            url: "{{url('admin/package_edit')}}/" + id,
            type: "GET",
            success: function(response) {
                if (response) {
                    $('#edit_name').val(response.data.name);
                    $('#edit_monthly_bill').val(response.data.monthly_bill);
                    $('#edit_validity_days').val(response.data.validity_days);
                    $('#edit_id').val(response.data.id);
                }
            }
        });
    }

    // // Update information
    $('#update_form').off().on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "{{url('admin/package_update')}}",
            type: "POST",
            data: $(this).serializeArray(),
            success: function(response) {
                if (response.success) {
                    toastr.success('Information Updated', 'Saved');
                    $('#edit_model').modal('hide');
                    $('.yajra-datatable').DataTable().ajax.reload(null, false);
                    
                
                }
            },
            error: function(response) {
                $('#error_edit_name').text(response.responseJSON.errors.name);
                $('#error_edit_monthly_bill').text(response.responseJSON.errors.monthly_bill);
                // $('#error_edit_start_date').text(response.responseJSON.errors.start_date);
                // $('#error_edit_end_date').text(response.responseJSON.errors.end_date);
            }
        });
    })
</script>