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
                url: "{{ url('admin/search_admin') }}",
                type: 'POST',
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
                    data: 'role',
                    name: 'role',
                    orderable: true
                },
                {
                    data: 'mobile',
                    name: 'mobile',
                    orderable: true
                },
                {
                    data: 'email',
                    name: 'email',
                    orderable: true
                },
                {
                    data: 'action',
                    name: 'action',
                    searchable: true,
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
                    url: "{{url('admin/delete_admin')}}/" + id,
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
            url: "{{url('admin/admin_create')}}",
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
                $('#error_mobile').text(response.responseJSON.errors.mobile);
                $('#error_password').text(response.responseJSON.errors.password);
                $('#error_status').text(response.responseJSON.errors.status);
                $('#error_role_id').text(response.responseJSON.errors.role_id);
            }
        });
    })

    // //edit info
    function edit(id) {
        event.preventDefault();
        $('#edit_model').modal('show');
        $.ajax({
            url: "{{url('admin/edit_admin')}}/" + id,
            type: "GET",
            success: function(response) {
                if (response) {
                    console.log(response);
                 
                    $('#edit_name').val(response.admin.name);
                    $('#edit_email').val(response.admin.email);
                    $('#edit_mobile').val(response.admin.mobile);
                    $('#edit_password').val(response.admin.password);
                    $('#edit_status[value="' + response.admin.status + '"]').prop('selected', true);
                    // $('#edit_status').val(response.admin.status);
                    if(response.admin.role){
var editroles = '<option value="' + response.admin.role.id +'" selected >' + response.admin.role.name + '</option>';
                    }else{
                        var html = '<option> Please Select</option>';
                    }
   $.each(response.roles, function(key, roleList) {
                            editroles += '<option value="' + roleList.id + '" >' +
                                roleList.name + '</option>';

                    });
                    $('#edit_role_id').html(editroles);
                    $('#edit_id').val(response.admin.id);
                }
            }
        });
    }

    // // Update information
    $('#update_form').off().on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "{{url('admin/update_admin')}}",
            type: "POST",
            data: $(this).serializeArray(),
            success: function(response) {
                if (response) {
                    toastr.success('Information Updated', 'Saved');
                    $('#edit_model').modal('hide');
                    $('.yajra-datatable').DataTable().ajax.reload(null, false);
                    
                }
            },
            error: function(response) {
                // $('#error_edit_name').text(response.responseJSON.errors.name);
                // $('#error_edit_slug').text(response.responseJSON.errors.slug);
            }
        });
    })
</script>