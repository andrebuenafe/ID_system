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

    function confirmDeleteStudent(id) {
        event.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            showCancelButton: true,
            imageUrl: "{{ asset('img/a.jpg') }}",
            imageHeight: 200,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#005',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Send an AJAX request to delete the diary
                axios.delete(`/students/${id}`)
                    .then(response => {
                        // Handle the success response from the server
                        Swal.fire(
                            'Deleted!',
                            'The student has been deleted.',
                            'success'
                        );
                        // Optionally, you can update the DataTable or reload the page
                        $('#students-table').DataTable().ajax.reload();
                    })
                    .catch(error => {
                        // Handle the error response from the server
                        Swal.fire(
                            'Error!',
                            'An error occurred while deleting the student.',
                            'error'
                        );
                    });
            }
        });
    }
</script>


