<script>
    $(document).ready(function() {
        $('.select2').select2({
            dropdownParent: $('#customer_settopbox_form')
        });
    });
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
                url: "{{ url('admin/search_user') }}",
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
                    data: 'contact_no',
                    name: 'contact_no',
                    orderable: false
                },
                {
                    data: 'email',
                    name: 'email',
                    orderable: false
                },
                {
                    data: 'address',
                    name: 'address',
                    orderable: false
                }, {
                    data: 'package',
                    name: 'package',
                    orderable: false
                }, {
                    data: 'set_top_box',
                    name: 'set_top_box',
                    orderable: false
                },
                {
                    data: 'status',
                    name: 'status',
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
                    url: "{{url('admin/customer_delete')}}/" + id,
                    success: function(response) {
                        if (response.status) {
                            toastr.success('Deleted Successful', 'Deleted');
                            $('.yajra-datatable').DataTable().ajax.reload(null, false);
                        } else {
                            toastr.error(response.message);
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
            url: "{{url('admin/customer_create')}}",
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
                $('#error_email').text(response.responseJSON.errors.email);
                $('#error_contact_no').text(response.responseJSON.errors.contact_no);
                $('#error_password').text(response.responseJSON.errors.password);
                $('#error_address').text(response.responseJSON.errors.address);
                $('#error_status').text(response.responseJSON.errors.status);
            }
        });
    })

    //edit info
    function edit(id) {
        event.preventDefault();
        $('#edit_model').modal('show');
        $.ajax({
            url: "{{url('admin/customer_edit')}}/" + id,
            type: "GET",
            success: function(response) {
                if (response) {
                    $('#edit_status[value="' + response.data.status + '"]').prop('selected', true);
                    $('#edit_name').val(response.data.name);
                    $('#edit_contact_no').val(response.data.contact_no);
                    $('#edit_email').val(response.data.email);
                    $('#edit_address').val(response.data.address);
                    $('#edit_id').val(response.data.id);
                }
            }
        });
    }

    function package(id) {
        event.preventDefault();
        $('#package_model').modal('show');
        $.ajax({
            url: "{{url('admin/customer_package_assign')}}/" + id,
            type: "GET",
            success: function(response) {
                if (response) {
                    console.log(response);
                    $('#customer_pac_name').val(response.customer.name);
                    $('#customer_id').val(id);
                    if (response.customer_package) {
                        var html = '<option value="' + response.customer_package.id + '" selected disable>' + response.customer_package.name + ' </option>';
                    } else {
                        var html = '<option> Please Select</option> ';
                    }


                    $.each(response.packages, function(idx, package) {
                        html += '<option value="' + package.id + '">' + package.name + '</option>'
                    });

                    $('#package_id').html(html);
                }
            }
        });
    }


    function SetTopBox(id) {
        event.preventDefault();
        $('#settop_assign_modal').modal('show');
        $.ajax({
            url: "{{url('admin/customer_setTopBox_assign')}}/" + id,
            type: "GET",
            success: function(response) {
                if (response) {
                    console.log(response);
                    $('#settop_customer_name').val(response.customer.name);
                    $('#settop_customer_id').val(id);


                    var html = '';
                    $.each(response.settopboxes, function(idx, settopbox) {
<<<<<<< HEAD
                        html += '<option value="' + settopbox.id + '">' + settopbox.box_name + '</option>'
=======
                        if (settopbox.customer_id == null) {
                            html += '<option value="' + settopbox.id + '">' + settopbox.box_name + ' - Unassigned </option>'
                        } else if (settopbox.customer_id == id) {
                            html += '<option value="' + settopbox.id + '">' + settopbox.box_name + ' - Assigned </option>'
                        }

>>>>>>> bf146c8 (settopbox update)
                    });

                    $('#set_top_box_id').html(html);
                }
            }
        });
    }

    $('#customer_settopbox_form').off().on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "{{url('admin/customer_settopbox_assign_perform')}}",
            type: "POST",
            data: $(this).serializeArray(),
            success: function(response) {
                if (response.status) {
                    toastr.success('Information Saved', 'Saved');
                    $('#settop_assign_modal').modal('hide');
                    $('.yajra-datatable').DataTable().ajax.reload(null, false);
                } else {
                    toastr.error(response.message, '');
                }
            },
            error: function(response) {

            }
        });
    })


    $('#customer_package_form').off().on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "{{url('admin/customer_package_assign_perform')}}",
            type: "POST",
            data: $(this).serializeArray(),
            success: function(response) {
                if (response.status) {
                    toastr.success(response.message);
                    $('#package_model').modal('hide');
                    $('.yajra-datatable').DataTable().ajax.reload(null, false);
                } else {
                    toastr.error(response.message);
                }
            },
            error: function(response) {

            }
        });
    })


    // Update information
    $('#update_form').off().on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "{{url('admin/customer_update')}}",
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
                $('#error_edit_contact_no').text(response.responseJSON.errors.contact_no);
                $('#error_edit_address').text(response.responseJSON.errors.address);
                $('#error_edit_email').text(response.responseJSON.errors.email);
                $('#error_edit_status').text(response.responseJSON.errors.status);
            }
        });
    });
</script>