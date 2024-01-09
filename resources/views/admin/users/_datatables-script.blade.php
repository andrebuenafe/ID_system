<script>
    $(document).ready(function () {
        $('#users-table').DataTable({
            responsive: true,
            initComplete: function () {
                $('.dataTables_filter ').append('<a href="{{ route("users.create") }}" class="btn btn-sm btn-primary ml-3">New User</a>');
            },
            processing: true,
            serverSide: true,
            ajax: '{{ route('users.index') }}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'role', name: 'role' },
                { data: 'action', name: 'action', orderable: false },
            ],
            order: [[2, 'asc']], // Assuming 'email' is the third column (index 2)
        });
    });
</script>

