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

{{-- Scripts Idk were to place --}}
<script>
    function confirmDelete(studentId) {
        if (confirm('Are you sure you want to delete this student?')) {
            deleteStudent(studentId);
        }
    }

    function deleteStudent(studentId) {
        // Assuming you have a route named 'students.destroy' for the delete action
        var deleteUrl = "{{ url('students') }}" + '/' + studentId;

        $.ajax({
            url: deleteUrl,
            type: 'DELETE',
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function (data) {
                // Reload the page after successful deletion
                location.reload();
            },
            error: function (data) {
                console.error('Error:', data);
            }
        });
    }
</script>
