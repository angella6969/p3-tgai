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
                        <x-input label="NIK" icon="bx bx-user" value1="{{ $rekrutmen->nik }}" nama="nik"/>
                        <x-input label="Nama" icon="bx bx-user" value1="{{ $rekrutmen->nama }}" nama="nama"/>
                        <x-input label="Email" icon="bx bx-envelope" value1="{{ $rekrutmen->email }}" nama="email"/>
                        <x-input label="No Hp" icon="bx bx-phone" value1="{{ $rekrutmen->nohp }}" nama="nohp"/>
                        <x-input label="No Hp" icon="bx bx-phone" value1="{{ $rekrutmen->nohp }}" nama="nohp"/>

                     
                     

                     
                      

                        <div class="mb-3">
                            <label class="col-sm-2 form-label" for="basic-icon-default-message">Surat Lamaran</label>
                            <div class="col-sm-10"> {{-- {{ asset('storage/' . substr($berita->url_foto, 6, 6)) }} --}}
                                <img class="img-fluid" src="\img\BingImageOfTheDay.jpg" alt="">
                                {{-- <a href="{{ asset('storage/' . substr($rekrutmen->pdf_lamaran, 6)) }}" target="_blank">show
                                    pdf</a> --}}
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="col-sm-2 form-label" for="basic-icon-default-message">Ijaza</label>
                            <div class="col-sm-10">
                                <img class="img-fluid" src="\img\Surat_Pernyataan_10_Poin-1.png" alt="">
                                {{-- <a href="{{ asset('storage/' . substr($rekrutmen->pdf_ijazah, 6)) }}" target="_blank">show
                                    pdf</a> --}}
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
