<script>
    $(document).ready(function () {
        $('#students-table').DataTable({
            responsive: true,
            initComplete: function () {
                $('.dataTables_filter ').append('<a href="{{ route("students.create") }}" class="btn btn-sm btn-primary ml-3">New Student</a>');
            },
            processing: true,
            serverSide: true,
            ajax: '{{ route('students.index') }}',
            columns: [
                { data: 'action', name: 'action', orderable: false },
                // { data: 'DT_RowIndex', name: 'index'},
                { data: 'school_id', name: 'school_id' },
                { data: 'fname', name: 'fname' },
                { data: 'lname', name: 'lname' },
                { data: 'course', name: 'course' },
            ],
            order: [[2, 'asc']], // Assuming 'email' is the third column (index 2)
        });
    });
</script>

