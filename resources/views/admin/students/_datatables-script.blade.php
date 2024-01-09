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
                { data: 'DT_RowIndex', name: 'index'},
                { data: 'fname', name: 'fname' },
                { data: 'lname', name: 'lname' },
                { data: 'address', name: 'address' },
                { data: 'qr', name: 'qr' },
                { data: 'signature', name: 'signature' },
                { data: 'school_id', name: 'school_id' },
                { data: 'course', name: 'course' },
                { data: 'img', name: 'img' },
                { data: 'parents_name', name: 'parents_name' },
                { data: 'em_contact', name: 'em_contact' },
                { data: 'action', name: 'action', orderable: false },
            ],
            order: [[2, 'asc']], // Assuming 'email' is the third column (index 2)
        });
    });
</script>

