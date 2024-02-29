@extends('layout.dashboard.main')

@section('container')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="/template/assets/img/avatars/1.png" alt="user-avatar" class="d-block rounded"
                                height="100" width="100" id="uploadedAvatar" />
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

                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" action="{{ route('saveprofile') }}">
                            @csrf
                            <div class="row">
                            <x-input label="Nama" icon="" value1="" nama="nama"/>
                            <x-input label="E-mail" icon="" value1="" nama="email"/>
                            <x-input label="NIK" icon="" value1="" nama="nik"/>
                            <x-input label="Nomor HP" icon="" value1="" nama="nohp"/>
                            <x-input label="Alamat" icon="" value1="" nama="alamat"/>
                            
                                <div class="mb-3 col-md-6">
                                    <label for="Nama" class="form-label">Nama</label>
                                    <input class="form-control" type="text" id="Nama" name="nama" value="John"
                                        autofocus />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input class="form-control" type="text" id="email" name="email"
                                        value="john.doe@example.com" placeholder="john.doe@example.com" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="NIK" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="NIK" name="NIK" value="123456" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="nohp">No Hp</label>
                                    <div class="input-group input-group-merge">
                                        {{-- <span class="input-group-text">US (+1)</span> --}}
                                        <input type="text" id="nohp" name="nohp" class="form-control" placeholder="" />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea type="text" class="form-control" id="address" name="address"
                                        placeholder="Address" cols="15" rows="3"></textarea>
                                </div>

                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
<x-alert></x-alert>
@endsection