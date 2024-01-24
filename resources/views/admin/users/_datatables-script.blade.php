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

    function confirmDeleteUser(id) {
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
                axios.delete(`/user/${id}`)
                    .then(response => {
                        // Handle the success response from the server
                        Swal.fire(
                            'Deleted!',
                            'The student has been deleted.',
                            'success'
                        );
                        // Optionally, you can update the DataTable or reload the page
                        $('#users-table').DataTable().ajax.reload();
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

