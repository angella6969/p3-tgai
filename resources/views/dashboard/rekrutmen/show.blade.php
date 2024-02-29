@extends('layout.dashboard.main')
@section('container')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Data Pelamar</h4>

        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic with Icons -->
            <div class="col-xxl">
                <div class="card mb-4">
                    {{-- <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Basic with Icons</h5>
                        <small class="text-muted float-end">Merged input group</small>
                    </div> --}}
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">NIK</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        value="{{ $rekrutmen->nik }}" aria-describedby="basic-icon-default-fullname2" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="basic-icon-default-fullname"
                                        value="{{ $rekrutmen->nama }}" aria-describedby="basic-icon-default-fullname2" />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                    <input type="text" id="basic-icon-default-email" class="form-control"
                                        value="{{ $rekrutmen->email }}" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="basic-icon-default-phone">Nomor Hp</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-phone2" class="input-group-text"><i
                                            class="bx bx-phone"></i></span>
                                    <input type="text" id="basic-icon-default-phone" class="form-control phone-mask"
                                        value="{{ $rekrutmen->nohp }}" />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="basic-icon-default-message">Surat Lamaran</label>
                            <div class="col-sm-10"> {{-- {{ asset('storage/' . substr($berita->url_foto, 6, 6)) }} --}}
                                <img src="{{ $rekrutmen->pdf_lamaran }}" alt="">
                                <a href="{{ asset('storage/' . substr($rekrutmen->pdf_lamaran, 6)) }}" target="_blank">show
                                    pdf</a>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="basic-icon-default-message">Ijaza</label>
                            <div class="col-sm-10">
                                <a href="{{ asset('storage/' . substr($rekrutmen->pdf_ijazah, 6)) }}" target="_blank">show
                                    pdf</a>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="basic-icon-default-message">KTP</label>
                            <div class="col-sm-10">
                                <a href="{{ asset('storage/' . substr($rekrutmen->pdf_ktp, 6)) }}" target="_blank">show
                                    pdf</a>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="basic-icon-default-message">SIM A/C</label>
                            <div class="col-sm-10">
                                <a href="{{ asset('storage/' . substr($rekrutmen->pdf_simAC, 6)) }}" target="_blank">show
                                    pdf</a>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="basic-icon-default-message">NPWP</label>
                            <div class="col-sm-10">
                                <a href="{{ asset('storage/' . substr($rekrutmen->pdf_npwp, 6)) }}" target="_blank">show
                                    pdf</a>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 form-label" for="basic-icon-default-message">Surat
                                Pernyataan</label>
                            <div class="col-sm-10">
                                <a href="{{ asset('storage/' . substr($rekrutmen->pdf_pernyataan, 6)) }}"
                                    target="_blank">show
                                    pdf</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
