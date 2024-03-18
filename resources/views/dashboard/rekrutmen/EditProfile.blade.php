@extends('layout.dashboard.main')

@section('container')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <form id="" method="POST"
                            action="{{ route('rekrutmen.update', ['rekrutman' => $rekrutmens->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <h5 class="card-header">Update Detail Profil</h5>
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        <img src="{{ !empty($rekrutmens->profile) ? asset('storage/berkas/' . $rekrutmens->nik . '/' . $rekrutmens->profile) : asset('/template/assets/img/avatars/1.png') }}"
                                            alt="user-avatar" class="d-block rounded" height="500" width="500"
                                            id="uploadedAvatar" />
                                    </div>
                                </div>
                                <div class="button-wrapper ">
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" name="profile" id="upload" class="account-file-input"
                                            onchange="previewImage(this)" hidden accept="image/png, image/jpeg" />
                                    </label>
                                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4"
                                        onclick="resetImage()">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Reset</span>
                                    </button>
                                    <p class="text-muted mb-0">JPG, PNG. Max size of 1 MB</p>
                                </div>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body">

                                <div class="row">
                                    {{-- <input type="text" hidden value="{{ auth()->user()->id }}" name="user_id"> --}}
                                    <x-input label="Nama" icon=""
                                        value1="{{ old('nama', $rekrutmens->nama ?? null) }}" nama="nama" />

                                    <x-input label="E-mail" icon=""
                                        value1="{{ old('email', $rekrutmens->email ?? null) }}" nama="email" />

                                    {{-- <x-input label="NIK" icon=""
                                        value1="{{ old('nik', $rekrutmens->nik ?? null) }}" nama="nik" /> --}}

                                    <div class="mb-3">
                                        <label class="col-sm-2 form-label">Nomor Induk Kependudukan (NIK)</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <input type="text" class="form-control phone-mask" disabled
                                                    value="{{ $rekrutmens->nik }}" />
                                                <input type="text" hidden class="form-control phone-mask" name="nik"
                                                    value="{{ old('nik', $rekrutmens->nik ?? null) }}" />
                                            </div>
                                        </div>
                                    </div>


                                    <x-input label="Nomor HP" icon=""
                                        value1="{{ old('nohp', $rekrutmens->nohp ?? null) }}" nama="nohp" />

                                    <x-t_area judul="Alamat KTP" nama="alamatktp"
                                        nilai="{{ old('alamatktp', $rekrutmens->alamatktp ?? null) }}"
                                        placeholder="Alamat Sesuai KTP Asli"></x-t_area>

                                    <x-t_area judul="Alamat Domisili" nama="alamatdomisili"
                                        nilai="{{ old('alamatdomisili', $rekrutmens->alamatdomisili ?? null) }}"
                                        placeholder="Alamat Sesuai Tempat Domisili"></x-t_area>

                                    <div class="card">
                                        <h5 class="card-header"></h5>
                                        <div class="table-responsive text-nowrap">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Dokumen</th>
                                                        <th>Nama</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-border-bottom-0">
                                                    <tr>
                                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                            <strong>Surat Lamaran</strong>
                                                        </td>
                                                        <td data-file-input="lamaran">{{ $rekrutmens->lamaran }}</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn p-0 dropdown-toggle hide-arrow"
                                                                    data-bs-toggle="dropdown">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item edit-button"
                                                                        href="javascript:void(0);"
                                                                        data-file-target="lamaran">
                                                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                                                    </a>
                                                                    <a class="dropdown-item" target="_blank"
                                                                        href="{{ asset('/storage/berkas/' . $rekrutmens->nik . '/' . $rekrutmens->lamaran) }}">
                                                                        <i class="bx bx-trash me-1"></i> Show
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                            <strong>Ijasa</strong>
                                                        </td>
                                                        <td data-file-input="ijasa">{{ $rekrutmens->ijasa }}</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn p-0 dropdown-toggle hide-arrow"
                                                                    data-bs-toggle="dropdown">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item edit-button"
                                                                        href="javascript:void(0);"
                                                                        data-file-target="ijasa">
                                                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                                                    </a>
                                                                    <a class="dropdown-item" target="_blank"
                                                                        href="{{ asset('/storage/berkas/' . $rekrutmens->nik . '/' . $rekrutmens->ijasa) }}">
                                                                        <i class="bx bx-trash me-1"></i> Show
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                            <strong>Surat Penyataan</strong>
                                                        </td>
                                                        <td data-file-input="pernyataan">{{ $rekrutmens->pernyataan }}
                                                        </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn p-0 dropdown-toggle hide-arrow"
                                                                    data-bs-toggle="dropdown">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item edit-button"
                                                                        href="javascript:void(0);"
                                                                        data-file-target="pernyataan">
                                                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                                                    </a>
                                                                    <a class="dropdown-item" target="_blank"
                                                                        href="{{ asset('/storage/berkas/' . $rekrutmens->nik . '/' . $rekrutmens->pernyataan) }}">
                                                                        <i class="bx bx-trash me-1"></i> Show
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                            <strong>Daftar Riwayat Hidup dan Refrensi Kerja</strong>
                                                        </td>
                                                        <td data-file-input="cv">{{ $rekrutmens->cv }}</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn p-0 dropdown-toggle hide-arrow"
                                                                    data-bs-toggle="dropdown">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item edit-button"
                                                                        href="javascript:void(0);" data-file-target="cv">
                                                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                                                    </a>
                                                                    <a class="dropdown-item" target="_blank"
                                                                        href="{{ asset('/storage/berkas/' . $rekrutmens->nik . '/' . $rekrutmens->cv) }}">
                                                                        <i class="bx bx-trash me-1"></i> Show
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                            <strong>Kartu Tanda Penduduk (KTP)</strong>
                                                        </td>
                                                        <td data-file-input="ktp">{{ $rekrutmens->ktp }}</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn p-0 dropdown-toggle hide-arrow"
                                                                    data-bs-toggle="dropdown">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item edit-button"
                                                                        href="javascript:void(0);" data-file-target="ktp">
                                                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                                                    </a>
                                                                    <a class="dropdown-item" target="_blank"
                                                                        href="{{ asset('/storage/berkas/' . $rekrutmens->nik . '/' . $rekrutmens->ktp) }}">
                                                                        <i class="bx bx-trash me-1"></i> Show
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                            <strong>NPWP</strong>
                                                        </td>
                                                        <td data-file-input="npwp">{{ $rekrutmens->npwp }}</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn p-0 dropdown-toggle hide-arrow"
                                                                    data-bs-toggle="dropdown">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item edit-button"
                                                                        href="javascript:void(0);"
                                                                        data-file-target="npwp">
                                                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                                                    </a>
                                                                    <a class="dropdown-item" target="_blank"
                                                                        href="{{ asset('/storage/berkas/' . $rekrutmens->nik . '/' . $rekrutmens->npwp) }}">
                                                                        <i class="bx bx-trash me-1"></i> Show
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                                            <strong>Surat Ijin Mengemudi (SIM) A/C</strong>
                                                        </td>
                                                        <td data-file-input="sim">{{ $rekrutmens->sim }}</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button type="button"
                                                                    class="btn p-0 dropdown-toggle hide-arrow"
                                                                    data-bs-toggle="dropdown">
                                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item edit-button"
                                                                        href="javascript:void(0);" data-file-target="sim">
                                                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                                                    </a>
                                                                    <a class="dropdown-item" target="_blank"
                                                                        href="{{ asset('/storage/berkas/' . $rekrutmens->nik . '/' . $rekrutmens->sim) }}">
                                                                        <i class="bx bx-trash me-1"></i> Show
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!--/ Basic Bootstrap Table -->

                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                </div>
                            </div>
                            <!-- elemen input file yang disembunyikan -->
                            <input type="file" name="lamaran" id="lamaran" style="display: none;"
                                accept="application/pdf" data-file-target="lamaran">
                            <input type="file" name="ijasa" id="ijasa" style="display: none;"
                                accept="application/pdf" data-file-target="ijasa">
                            <input type="file" name="pernyataan" id="pernyataan" style="display: none;"
                                accept="application/pdf" data-file-target="pernyataan">
                            <input type="file" name="cv" id="cv" style="display: none;"
                                accept="application/pdf" data-file-target="cv">
                            <input type="file" name="ktp" id="ktp" style="display: none;"
                                accept="application/pdf" data-file-target="ktp">
                            <input type="file" name="npwp" id="npwp" style="display: none;"
                                accept="application/pdf" data-file-target="npwp">
                            <input type="file" name="sim" id="sim" style="display: none;"
                                accept="application/pdf" data-file-target="sim">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
    </div>
    <x-alert></x-alert>

    <script>
        function previewImage(input) {
            const file = input.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('uploadedAvatar').src = e.target.result;
            }
            reader.readAsDataURL(file);
        }

        function resetImage() {
            document.getElementById('uploadedAvatar').src =
                "{{ !empty($rekrutmens->profile) ? asset('storage/berkas/' . $rekrutmens->nik . '/' . $rekrutmens->profile) : asset('/template/assets/img/avatars/1.png') }}";
            document.getElementById('upload').value = ''; // Reset file input
        }
    </script>

    <script>
        // Ambil semua tombol "Edit" dengan class 'edit-button'
        const editButtons = document.querySelectorAll('.edit-button');

        // Loop melalui setiap tombol "Edit"
        editButtons.forEach(button => {
            // Tambahkan event listener untuk menanggapi klik pada setiap tombol "Edit"
            button.addEventListener('click', function() {
                // Ambil target file input dari atribut data-file-target
                const fileTarget = button.getAttribute('data-file-target');
                // Ambil elemen input file berdasarkan target
                const fileInput = document.getElementById(fileTarget);
                // Simulasikan klik pada elemen input file
                fileInput.click();
            });
        });

        // Mendengarkan perubahan untuk setiap input file
        document.querySelectorAll('input[type=file]').forEach(input => {
            input.addEventListener('change', function() {
                // Dapatkan nilai atribut data untuk mengidentifikasi baris tabel yang sesuai
                const namaInputFile = this.getAttribute('data-file-target');
                // Temukan baris tabel berdasarkan nilai atribut data
                const barisTabel = document.querySelector(`td[data-file-input=${namaInputFile}]`);
                // Dapatkan nama file
                const namaFile = this.files[0].name;
                // Perbarui nama file di kolom kedua baris tabel tersebut
                barisTabel.textContent = namaFile;
            });
        });
    </script>
@endsection
