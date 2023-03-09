<script>
    $(function () {
        var table = $('.yajra-datatable').DataTable({
            "order": [[1, 'desc']],
            "bFilter": false,
            "columnDefs": [
                {"className": "dt-center", "targets": "_all"}
            ], "bDestroy": true,
            processing: true,
            serverSide: true,
            "language": {
                processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span>'
            },
            ajax: {
                url: "{{ url('admin/search_user') }}",
                type: 'POSt',
                data: function (d) {
                    d.name = $('#name').val();
                    d._token = '{{csrf_token()}}'
                }
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false},
                {data: 'name', name: 'name', orderable: true},
                {data: 'contact_no', name: 'contact_no', orderable: false},
                {data: 'email', name: 'email', orderable: false},
                {data: 'address', name: 'address', orderable: false},
                {data: 'status', name: 'status', orderable: false},
                {data: 'action', name: 'action', searchable: false,},
            ],
        });
        $('#search_form').on('submit', function (event) {
            event.preventDefault();
            table.draw(true);
        });
    });
</script>