@extends('layout.dashboard.main')
@section('container')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Data</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
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
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $rekrutmen->nama }}</strong>
                                </td>
                                <td>{{ $rekrutmen->nik }}</td>
                                <td> {{ $rekrutmen->nohp }}
                                </td>
                                <td><span class="badge bg-label-primary me-1">{{ $rekrutmen->status }}</span></td>
                                <td>
                                    <a href="{{ route('rekrutmen.show', ['rekrutman' => $rekrutmen->id]) }}"><i
                                            class="bx bx-low-vision"></i></a>
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
@endsection
