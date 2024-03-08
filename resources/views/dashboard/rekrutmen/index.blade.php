@extends('layout.dashboard.main')
@section('container')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h1 class="h3 text-center">Selamat Datang {{ auth()->user()->nama }} Anda Berhasil Membuat Akun Pendaftaran TPM P3-TGAI :

            </h1>
            <h6>
                Mohon Segera Melengkapi Data Berikut <a href="/rekrutmen/profile">Link</a>
            </h6>
        </div>

    </div>
    <x-alert></x-alert>
@endsection
