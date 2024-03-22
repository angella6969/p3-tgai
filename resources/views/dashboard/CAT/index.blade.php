@extends('layout.dashboard.main')
@section('container')
    <div class="content-wrapper">
        <form action="{{ route('ujian.store') }}" method="post">
            @csrf
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title"><br>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description"></textarea><br>
            <button type="submit">Create Test</button>
        </form>
    </div>
    <x-alert></x-alert>
@endsection
