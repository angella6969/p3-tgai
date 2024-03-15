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
                                {{-- <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">Cv</label>
                                    <div class="col-sm-10">
                                        <iframe
                                            src="https://docs.google.com/viewer?url={{ asset('/storage/berkas/' . $rekrutmens->nik . '/' . $rekrutmens->cv) }}&embedded=true"
                                            style="width:100%; height:500px;" frameborder="0"></iframe>
                                        <p>Maaf, Jika browser Anda tidak mendukung penampilan file PDF. Anda dapat <a
                                                href="{{ asset('/storage/berkas/' . $rekrutmens->nik . '/' . $rekrutmens->cv) }}">mengunduh
                                                file</a> untuk melihatnya.</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">Surat Lamaran</label>
                                    <div class="col-sm-10">
                                        <iframe
                                            src="https://docs.google.com/viewer?url={{ asset('/storage/berkas/' . $rekrutmens->nik . '/' . $rekrutmens->lamaran) }}&embedded=true"
                                            style="width:100%; height:500px;" frameborder="0"></iframe>
                                        <p>Maaf, Jika browser Anda tidak mendukung penampilan file PDF. Anda dapat <a
                                                href="{{ asset('/storage/berkas/' . $rekrutmens->nik . '/' . $rekrutmens->lamaran) }}">mengunduh
                                                file</a> untuk melihatnya.</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">Surat Pernyataan</label>
                                    <div class="col-sm-10">
                                        <iframe
                                            src="https://docs.google.com/viewer?url={{ asset('/storage/berkas/' . $rekrutmens->nik . '/' . $rekrutmens->pernyataan) }}&embedded=true"
                                            style="width:100%; height:500px;" frameborder="0"></iframe>
                                        <p>Maaf, Jika browser Anda tidak mendukung penampilan file PDF. Anda dapat <a
                                                href="{{ asset('/storage/berkas/' . $rekrutmens->nik . '/' . $rekrutmens->pernyataan) }}">mengunduh
                                                file</a> untuk melihatnya.</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">Surat Ijasa</label>
                                    <div class="col-sm-10">
                                        <iframe
                                            src="https://docs.google.com/viewer?url={{ asset('/storage/berkas/' . $rekrutmens->nik . '/' . $rekrutmens->ijasa) }}&embedded=true"
                                            style="width:100%; height:500px;" frameborder="0"></iframe>
                                        <p>Maaf, Jika browser Anda tidak mendukung penampilan file PDF. Anda dapat <a
                                                href="{{ asset('/storage/berkas/' . $rekrutmens->nik . '/' . $rekrutmens->ijasa) }}">mengunduh
                                                file</a> untuk melihatnya.</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">Kartu NPWP</label>
                                    <div class="col-sm-10">
                                        <iframe
                                            src="https://docs.google.com/viewer?url={{ asset('/storage/berkas/' . $rekrutmens->nik . '/' . $rekrutmens->npwp) }}&embedded=true"
                                            style="width:100%; height:500px;" frameborder="0"></iframe>
                                        <p>Maaf, Jika browser Anda tidak mendukung penampilan file PDF. Anda dapat <a
                                                href="{{ asset('/storage/berkas/' . $rekrutmens->nik . '/' . $rekrutmens->npwp) }}">mengunduh
                                                file</a> untuk melihatnya.</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">Kartu KTP</label>
                                    <div class="col-sm-10">
                                        <iframe
                                            src="https://docs.google.com/viewer?url={{ asset('/storage/berkas/' . $rekrutmens->nik . '/' . $rekrutmens->ktp) }}&embedded=true"
                                            style="width:100%; height:500px;" frameborder="0"></iframe>
                                        <p>Maaf, Jika browser Anda tidak mendukung penampilan file PDF. Anda dapat <a
                                                href="{{ asset('/storage/berkas/' . $rekrutmens->nik . '/' . $rekrutmens->ktp) }}">mengunduh
                                                file</a> untuk melihatnya.</p>
                                    </div>
                                </div> --}}

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
                                                                {{-- <a class="dropdown-item edit-button"
                                                                    href="javascript:void(0);" data-file-target="lamaran">
                                                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                                                </a> --}}
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
                                                                {{-- <a class="dropdown-item edit-button"
                                                                    href="javascript:void(0);" data-file-target="ijasa">
                                                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                                                </a> --}}
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
                                                                {{-- <a class="dropdown-item edit-button"
                                                                    href="javascript:void(0);"
                                                                    data-file-target="pernyataan">
                                                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                                                </a> --}}
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
                                                                {{-- <a class="dropdown-item edit-button"
                                                                    href="javascript:void(0);" data-file-target="cv">
                                                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                                                </a> --}}
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
                                                                {{-- <a class="dropdown-item edit-button"
                                                                    href="javascript:void(0);" data-file-target="ktp">
                                                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                                                </a> --}}
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
                                                                {{-- <a class="dropdown-item edit-button"
                                                                    href="javascript:void(0);" data-file-target="npwp">
                                                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                                                </a> --}}
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
                                                                {{-- <a class="dropdown-item edit-button"
                                                                    href="javascript:void(0);" data-file-target="sim">
                                                                    <i class="bx bx-edit-alt me-1"></i> Edit
                                                                </a> --}}
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

                                {{-- @foreach ($base64Images as $base64Image)
                                <img class="img-fluid" src="{{ $base64Image }}" alt="PDF Image">
                            @endforeach --}}

                                <div class="mt-3">
                                    <a
                                        href="{{ route('rekrutmen.edit', ['rekrutman' => $rekrutmens->id]) }}"class="btn btn-primary">Edit</a>
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
