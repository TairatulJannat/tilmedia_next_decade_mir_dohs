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
                url: "<?php echo e(url('admin/search_setTopBox')); ?>",
                type: 'POST',
                data: function(d) {

                    d.name = $('#name').val();
                    d._token = '<?php echo e(csrf_token()); ?>'
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    searchable: false
                },
                {
                    data: 'box_name',
                    name: 'box_name',
                    searchable: false
                },
                {
                    data: 'sc_id',
                    name: 'sc_id',
                    orderable: true
                },
                {
                    data: 'stb_id',
                    name: 'stb_id',
                    orderable: true
                },
                {
                    data: 'status',
                    name: 'status',
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
                    url: "<?php echo e(url('admin/setTopBox_delete')); ?>/" + id,
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
            url: "<?php echo e(url('admin/setTopBox_create')); ?>",
            type: "POST",
            data: $(this).serializeArray(),
            success: function(response) {
                if (response) {
                    toastr.success('Information Saved', 'Saved');
                    $('#save_info')[0].reset();
                    $('#add_modal').modal('hide');
                    $('.yajra-datatable').DataTable().ajax.reload(null, false);

                }
            },
            error: function(response) {
                $('#error_box_name').text(response.responseJSON.errors.box_name);
                $('#error_sc_id').text(response.responseJSON.errors.sc_id);
                $('#error_stb_id').text(response.responseJSON.errors.stb_id);
                $('#error_status').text(response.responseJSON.errors.device_status);
            }
        });
    })

    // //edit info
    function edit(id) {
        event.preventDefault();
        $('#edit_model').modal('show');
        $.ajax({
            url: "<?php echo e(url('admin/setTopBox_edit')); ?>/" + id,
            type: "GET",
            success: function(response) {
                if (response) {
                    $('#edit_status[value="' + response.data.device_status + '"]').prop('selected', true);
                    $('#edit_box_name').val(response.data.box_name);
                    $('#edit_sc_id').val(response.data.sc_id);
                    $('#edit_stb_id').val(response.data.stb_id);
                    $('#edit_id').val(response.data.id);
                }
            }
        });
    }

    // // Update information
    $('#update_form').off().on('submit', function(event) {
        event.preventDefault();
        $.ajax({
            url: "<?php echo e(url('admin/setTopBox_update')); ?>",
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
</script><?php /**PATH C:\xampp\htdocs\tilmedia_next_decade_mir_dohs\resources\views/backend/setTopBox/setTopBox_js.blade.php ENDPATH**/ ?>