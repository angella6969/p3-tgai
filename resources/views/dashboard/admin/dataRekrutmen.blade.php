@extends('layout.dashboard.main')
@section('container')
    <style>
        .bg-lolos {
            background-color: #28a745;
            color: #000000;

            /* Hijau untuk status 'Lolos' */
        }

        .bg-tidak-lolos {
            background-color: #6c757d;
            color: #ffffff;
            /* Abu-abu untuk status 'Tidak Lolos' */
        }

        .bg-tidak-ada {
            background-color: #ffffff;
            color: #000000;

            /* Putih untuk status 'Tidak Ada' */
        }

        .box-icon {
            color: #000000;
            /* Ganti dengan warna yang Anda inginkan */
        }
    </style>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Data</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="card-body d-flex justify-content-lg-end">
                <div class="demo-inline-spacing">
                    <a href="{{ route('dashboard.PrintPdf') }}" class="btn btn-primary">Print PDF</a>
                </div>
            </div>
            <h5 class="card-header">Daftar Rekrutmen</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>No Hp</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($rekrutmens as $rekrutmen)
                            <tr
                                class="{{ $rekrutmen->status == 'Lolos' ? 'bg-lolos' : ($rekrutmen->status == 'Tidak Lolos' ? 'bg-tidak-lolos' : 'bg-white') }}">
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $rekrutmen->nama }}</strong>
                                </td>
                                <td>{{ $rekrutmen->nik }}</td>
                                <td> {{ $rekrutmen->nohp }}
                                </td>
                                <td><span class="badge bg-label-primary me-1">{{ $rekrutmen->status }}</span></td>
                                <td>
                                    <a
                                        href="{{ route('dashboard.dataRekrutmen.show', ['data_rekrutman' => $rekrutmen->id]) }}"><i
                                            class="box-icon bx bx-low-vision bx-md"></i></a>
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
    <x-alert></x-alert>
@endsection
