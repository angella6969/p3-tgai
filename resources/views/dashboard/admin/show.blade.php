@extends('layout.dashboard.main')
@section('container')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Data Pelamar</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic with Icons -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card">
                        <h5 class="card-header">Detail Profil Pelamar</h5>
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <tbody class="table-border-bottom-0">
                                    <tr>
                                        <td colspan="1"><i
                                                class="fab fa-angular fa-lg text-danger me-3"></i><strong>Nama</strong></td>
                                        <td colspan="1">:</td>
                                        <td colspan="10">{{ $rekrutmen->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1"><i
                                                class="fab fa-angular fa-lg text-danger me-3"></i><strong>NIK</strong></td>
                                        <td colspan="1">:</td>
                                        <td colspan="10">{{ $rekrutmen->nik }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1"><i class="fab fa-angular fa-lg text-danger me-3"></i><strong>No
                                                Hp</strong></td>
                                        <td colspan="1">:</td>
                                        <td colspan="10">{{ $rekrutmen->nohp }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1"><i
                                                class="fab fa-angular fa-lg text-danger me-3"></i><strong>Email</strong>
                                        </td>
                                        <td colspan="1">:</td>
                                        <td colspan="10">{{ $rekrutmen->email }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1"><i
                                                class="fab fa-angular fa-lg text-danger me-3"></i><strong>Alamat
                                                Domisili</strong></td>
                                        <td colspan="1">:</td>
                                        <td colspan="10">{{ $rekrutmen->alamatdomisili }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1"><i
                                                class="fab fa-angular fa-lg text-danger me-3"></i><strong>Alamat
                                                KTP</strong></td>
                                        <td colspan="1">:</td>
                                        <td colspan="10">{{ $rekrutmen->alamatktp }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <iframe
                        src="https://drive.google.com/viewerng/viewer?embedded=true&url={{ asset('/storage/berkas/' . $rekrutmen->nik . '/' . $rekrutmen->lamaran) }}"
                        width="100%" height="600"></iframe>
                    <iframe
                        src="https://drive.google.com/viewerng/viewer?embedded=true&url={{ asset('/storage/berkas/' . $rekrutmen->nik . '/' . $rekrutmen->ijasa) }}"
                        width="100%" height="600"></iframe>
                    <iframe
                        src="https://drive.google.com/viewerng/viewer?embedded=true&url={{ asset('/storage/berkas/' . $rekrutmen->nik . '/' . $rekrutmen->pernyataan) }}"
                        width="100%" height="600"></iframe>
                    <iframe
                        src="https://drive.google.com/viewerng/viewer?embedded=true&url={{ asset('/storage/berkas/' . $rekrutmen->nik . '/' . $rekrutmen->cv) }}"
                        width="100%" height="600"></iframe>
                    <iframe
                        src="https://drive.google.com/viewerng/viewer?embedded=true&url={{ asset('/storage/berkas/' . $rekrutmen->nik . '/' . $rekrutmen->ktp) }}"
                        width="100%" height="600"></iframe>
                    <iframe
                        src="https://drive.google.com/viewerng/viewer?embedded=true&url={{ asset('/storage/berkas/' . $rekrutmen->nik . '/' . $rekrutmen->npwp) }}"
                        width="100%" height="600"></iframe>
                    <iframe
                        src="https://drive.google.com/viewerng/viewer?embedded=true&url={{ asset('/storage/berkas/' . $rekrutmen->nik . '/' . $rekrutmen->sim) }}"
                        width="100%" height="600"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
