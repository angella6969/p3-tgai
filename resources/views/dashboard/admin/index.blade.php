@extends('layout.dashboard.main')
@section('container')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h1 class="h3 text-center">Selamat Datang {{ auth()->user()->nama }}

            </h1>
        </div>
    </div>
    <x-alert></x-alert>
@endsection
