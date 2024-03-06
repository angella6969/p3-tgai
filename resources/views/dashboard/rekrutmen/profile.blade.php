@extends('layout.dashboard.main')

@section('container')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4> --}}

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <h5 class="card-header">Detail Profil</h5>
                        <div class="card-body">
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="{{ !empty($rekrutmens->profile) ? asset($rekrutmens->profile) : '/template/assets/img/avatars/1.png' }}"
                                    alt="user-avatar" class="d-block rounded" height="100" width="100"
                                    id="uploadedAvatar" />

                                <div class="button-wrapper">
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" id="upload" class="account-file-input" hidden
                                            accept="image/png, image/jpeg" />
                                    </label>
                                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Reset</span>
                                    </button>
                                    <p class="text-muted mb-0">JPG, PNG. Max size of 2 MB</p>
                                </div>
                            </div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                            <form id="formAccountSettings" method="POST" action="{{ route('saveprofile') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <input type="text" hidden value="{{ auth()->user()->id }}" name="user_id">
                                    <x-input label="Nama" icon="" value1="{{ $rekrutmens->nama }}"
                                        nama="nama" />
                                    <x-input label="E-mail" icon="" value1="{{ $rekrutmens->email }}"
                                        nama="email" />
                                    <x-input label="NIK" icon="" value1="{{ $rekrutmens->nik }}" nama="nik" />
                                    <x-input label="Nomor HP" icon="" value1="{{ $rekrutmens->nohp }}"
                                        nama="nohp" />
                                    <x-t_area judul="Alamat KTP" nama="alamatktp" nilai="{{ $rekrutmens->alamatktp }}"
                                        placeholder="Alamat Sesuai KTP Asli"></x-t_area>
                                    <x-t_area judul="Alamat Domisili" nama="alamatdomisili"
                                        nilai="{{ $rekrutmens->alamatdomisili }}"
                                        placeholder="Alamat Sesuai Tempat Domisili"></x-t_area>
                                    <x-upload judul="Surat Lamaran" nama="lamaran" nilai="{{ $rekrutmens->lamaran }}"
                                        detail="Scan File PNG, Max 5-MB"></x-upload>

                                    <x-upload judul="Ijasah" nama="ijasa" nilai="{{ $rekrutmens->ijasa }}"
                                        detail="Scan File PNG, Max 5-MB"></x-upload>

                                    <x-upload judul="Surat Pernyataan" nama="pernyataan"
                                        nilai="{{ $rekrutmens->pernyataan }}" detail="Scan File PNG, Max 5-MB"></x-upload>

                                    <x-upload judul="Daftar Riwayat Hidup dan Refrensi Kerja ( CV )" nama="cv"
                                        nilai="{{ $rekrutmens->vc }}" detail="Scan File PNG, Max 5-MB"></x-upload>

                                    <x-upload judul="KTP" nama="ktp" nilai="{{ $rekrutmens->ktp }}"
                                        detail="Scan File PNG, Max 5-MB"></x-upload>

                                    <x-upload judul="SIM A/C" nama="sim" nilai="{{ $rekrutmens->sim }}"
                                        detail="Scan File PNG, Max 5-MB"></x-upload>

                                    <x-upload judul="NPWP" nama="npwp" nilai="{{ $rekrutmens->npwp }}"
                                        detail="Scan File PNG, Max 5-MB"></x-upload>
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
    </div>
    <x-alert></x-alert>
@endsection
