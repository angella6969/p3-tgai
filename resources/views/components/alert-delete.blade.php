<a href="{{ route('ujian.peserta.destroy', $peserta->id) }}" class="btn btn-danger delete-btn">Delete</a>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Script to handle delete confirmation with SweetAlert
    document.addEventListener('DOMContentLoaded', function() {
        var deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                var url = this.getAttribute('href');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If confirmed, redirect to the delete URL
                        window.location.href = url;
                    }
                });
            });
        });
    });
</script>
