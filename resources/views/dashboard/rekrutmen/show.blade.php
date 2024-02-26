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
                        <form>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Nama</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                                class="bx bx-user"></i></span>
                                        <input type="text" class="form-control" id="basic-icon-default-fullname"
                                            value="{{ $rekrutmen->nama }}"
                                            aria-describedby="basic-icon-default-fullname2" />
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
                                <label class="col-sm-2 form-label" for="basic-icon-default-phone">Phone No</label>
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
                                <label class="col-sm-2 form-label" for="basic-icon-default-message">Message</label>
                                <div class="col-sm-10">
                                    {{-- <iframe src="{{ asset('pdf\acara.pdf') }}" width="800px" height="600px"></iframe> --}}
                                    {{-- <iframe src="{{ url('pdf\acara.pdf') }}" align="top" height="620" width="100%" frameborder="0" scrolling="auto"></iframe> --}}
                                    {{-- <a href="{{ url('pdf\acara.pdf') }}">awd</a> --}}
                                    {{-- <object data="{{ asset('pdf\acara.pdf') }}" type="application/pdf" width="100%"
                                        height="500px"></object> --}}
                                    {{-- <embed src="{{ url('pdf\acara.pdf') }}" width="800px" height="600px" /> --}}
                                    {{-- <iframe src="https://docs.google.com/gview?url={{ asset('pdf/acara.pdf') }}&embedded=true" style="width:600px; height:500px;" frameborder="0"></iframe> --}}
                                    {{-- <embed src="{{ asset('pdf/acara.pdf') }}" type="application/pdf" width="100%" height="100%">
                                         --}}
                                         <embed src="{{ asset('pdf/acara.pdf') }}" type="application/pdf" width="100%" height="100%" />


                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
