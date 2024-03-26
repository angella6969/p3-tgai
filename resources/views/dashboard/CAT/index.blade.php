@extends('layout.dashboard.main')
@section('container')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Data</h4> --}}

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-body d-flex justify-content-lg-end">
                <div class="demo-inline-spacing">
                    <a href="{{ route('ujian.create') }}" class="btn btn-primary">Tambah</a>
                </div>
            </div>
            <h5 class="card-header">Daftar Pertanyaan</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Pertanyaan</th>
                            <th>Kunci Jawaban</th>
                            <th>Aksi</th>

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($test as $tes)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $tes->question }}</strong>
                                </td>
                                <td>{{ $tes->nik }}</td>
                                <td class="">
                                    <a href="{{ route('ujian.edit', ['ujian' => $tes->id]) }}"><i
                                            class="box-icon bx bx-low-vision bx-md"></i></a>
                                    <a href="#" class="btn "
                                        data-url="{{ route('ujian.destroy', ['ujian' => $tes->id]) }}"><i
                                            class="box-icon bx bx-trash bx-md"></i></a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->

        <hr class="my-5" />
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Script to handle delete confirmation with SweetAlert
        document.addEventListener('DOMContentLoaded', function() {
            var deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(function(button) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    var url = this.getAttribute('data-url');

                    Swal.fire({
                        title: 'Yakin?',
                        text: 'Setalah Dihapus Tidak Bisa Dikembalikan',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        cancelButtonText: 'Batal',
                        confirmButtonText: 'Ya, Hapus!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If confirmed, submit the form
                            var form = document.createElement('form');
                            form.action = url;
                            form.method = 'POST';
                            form.style.display = 'none';
                            var csrfToken = document.querySelector(
                                'meta[name="csrf-token"]').getAttribute('content');
                            form.innerHTML =
                                '<input type="hidden" name="_method" value="DELETE">' +
                                '<input type="hidden" name="_token" value="' + csrfToken +
                                '">';
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
    <x-alert></x-alert>
@endsection
