@extends('layout.dashboard.main')
@section('container')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <form action="{{ route('ujian.store') }}" method="post">
                            @csrf
                            <div class="card mb-4">
                                {{-- <h5 class="card-header">Basic</h5> --}}
                                <div class="card-body demo-vertical-spacing demo-only-element">
                                    <div class="form-group">
                                        <label for="question">Question:</label>
                                        <input type="text" class="form-control" id="question" name="question">
                                    </div>
                                    <div class="form-group">
                                        <label for="option_a">Option A:</label>
                                        <input type="text" class="form-control" id="option_a" name="options[]">
                                    </div>
                                    <div class="form-group">
                                        <label for="option_b">Option B:</label>
                                        <input type="text" class="form-control" id="option_b" name="options[]">
                                    </div>
                                    <div class="form-group">
                                        <label for="option_c">Option C:</label>
                                        <input type="text" class="form-control" id="option_c" name="options[]">
                                    </div>
                                    <div class="form-group">
                                        <label for="option_d">Option D:</label>
                                        <input type="text" class="form-control" id="option_d" name="options[]">
                                    </div>
                                    <div class="form-group">
                                        <label for="correct_option">Correct Option:</label>
                                        <select class="form-control" id="correct_option" name="correct_option">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-alert></x-alert>
@endsection
