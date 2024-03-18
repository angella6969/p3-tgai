@extends('layout.dashboard.main')

@section('container')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            {{-- <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4> --}}

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <form id="formAccountSettings" method="POST" action="{{ route('saveprofile') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <h5 class="card-header">Detail Profil</h5>


                            <hr class="my-0" />
                            <div class="card-body">
                                {{-- <form id="formAccountSettings" method="POST" action="{{ route('saveprofile') }}"
                                enctype="multipart/form-data">
                                @csrf --}}
                                <div class="row">
                                    <input type="text" hidden value="{{ auth()->user()->id }}" name="user_id">
                                    <x-input label="Nama" icon=""
                                        value1="{{ old('nama', $rekrutmens->nama ?? null) }}" nama="nama" />

                                    <x-input label="E-mail" icon=""
                                        value1="{{ old('email', $rekrutmens->email ?? null) }}" nama="email" />

                                    <x-input label="NIK" icon=""
                                        value1="{{ old('nik', $rekrutmens->nik ?? null) }}" nama="nik" />

                                    <x-input label="Nomor HP" icon=""
                                        value1="{{ old('nohp', $rekrutmens->nohp ?? null) }}" nama="nohp" />

                                    <x-t_area judul="Alamat KTP" nama="alamatktp"
                                        nilai="{{ old('alamatktp', $rekrutmens->alamatktp ?? null) }}"
                                        placeholder="Alamat Sesuai KTP Asli"></x-t_area>

                                    <x-t_area judul="Alamat Domisili" nama="alamatdomisili"
                                        nilai="{{ old('alamatdomisili', $rekrutmens->alamatdomisili ?? null) }}"
                                        placeholder="Alamat Sesuai Tempat Domisili"></x-t_area>

                                    {{-- <div class="">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <div class="button-wrapper"> --}}
                                    <x-u_img nama="profile" judul="Photo Profil" nilai="" />
                                    {{-- </div>
                                        </div>
                                    </div> --}}

                                    <x-upload judul="Surat Lamaran" nama="lamaran"
                                        nilai="{{ old('lamaran', $rekrutmens->lamaran ?? null) }}"
                                        detail="Scan File PNG, Max 5-MB"></x-upload>

                                    <x-upload judul="Ijasah" nama="ijasa"
                                        nilai="{{ old('ijasa', $rekrutmens->ijasa ?? null) }}"
                                        detail="Scan File PNG, Max 5-MB"></x-upload>

                                    <x-upload judul="Surat Pernyataan" nama="pernyataan"
                                        nilai="{{ old('pernyataan', $rekrutmens->pernyataan ?? null) }}"
                                        detail="Scan File PNG, Max 5-MB"></x-upload>

                                    <x-upload judul="Daftar Riwayat Hidup dan Refrensi Kerja ( CV )" nama="cv"
                                        nilai="{{ old('cv', $rekrutmens->cv ?? null) }}"
                                        detail="Scan File PNG, Max 5-MB"></x-upload>

                                    <x-upload judul="KTP" nama="ktp"
                                        nilai="{{ old('ktp', $rekrutmens->ktp ?? null) }}"
                                        detail="Scan File PNG, Max 5-MB"></x-upload>

                                    <x-upload judul="SIM A/C" nama="sim"
                                        nilai="{{ old('sim', $rekrutmens->sim ?? null) }}"
                                        detail="Scan File PNG, Max 5-MB"></x-upload>

                                    <x-upload judul="NPWP" nama="npwp"
                                        nilai="{{ old('npwp', $rekrutmens->npwp ?? null) }}"
                                        detail="Scan File PNG, Max 5-MB"></x-upload>

                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                        <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    </div>
                                </div>
                                {{-- </form> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
    </div>
    <x-alert></x-alert>
    <script>
        function previewImage(id) {
            const image = document.querySelector(`#${id}`);
            const imgPreview = document.querySelector(`#img-preview-${id}`);

            if (image.files.length > 0) {
                imgPreview.style.display = 'inline';

                const oFReader = new FileReader();

                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            } else {
                imgPreview.style.display = 'none';
                imgPreview.src = '';
            }
        }
    </script>
@endsection
