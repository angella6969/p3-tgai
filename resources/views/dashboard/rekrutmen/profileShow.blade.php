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
                            <div
                                class="d-flex align-items-start align-items-sm-center gap-4 d-lg-flex justify-content-center">
                                <img src="{{ !empty($rekrutmens->profile) ? asset($rekrutmens->profile) : '/template/assets/img/avatars/1.png' }}"
                                    alt="user-avatar" class="d-block rounded" height="300" width="300"
                                    id="uploadedAvatar" />
                            </div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                            <div class="row">
                                <x-show nama="Nama" nilai="{{ $rekrutmens->nama }}"></x-show>
                                <x-show nama="Email" nilai="{{ $rekrutmens->email }}"></x-show>
                                <x-show nama="NIK" nilai="{{ $rekrutmens->nik }}"></x-show>
                                <x-show nama="Nomor Hp" nilai="{{ $rekrutmens->nohp }}"></x-show>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">Alamat KTP</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <textarea cols="20" rows="3" style="width: 100%;" disabled>{{ $rekrutmens->alamatktp }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">Alamat Domisili</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                                            <textarea cols="50" rows="3" style="width: 100%;" disabled>{{ $rekrutmens->alamatdomisili }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a href="/pro"class="btn btn-primary">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
    </div>
    <x-alert></x-alert>
@endsection
