@extends('layout.dashboard.main')
@section('container')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <form action="{{ route('ujian.store') }}" method="post">
                            <div class="card mb-4">
                                <h5 class="card-header">Basic</h5>
                                <div class="card-body demo-vertical-spacing demo-only-element">
                                    <x-input label="Pertanyaan" icon="" nama="pertanyaan" value1=""></x-input>
                                    <div class="form-check mt-3">
                                        <input name="default-radio-1" class="form-check-input" type="radio" value=""
                                            id="defaultRadio1">
                                        <label class="form-check-label" for="defaultRadio1"> Unchecked </label>
                                    </div>
                                    <div class="form-check mt-3">
                                        <input name="default-radio-1" class="form-check-input" type="radio" value=""
                                            id="defaultRadio1">
                                        <label class="form-check-label" for="defaultRadio1"> Unchecked </label>
                                    </div>
                                    <div class="form-check mt-3">
                                        <input name="default-radio-1" class="form-check-input" type="radio" value=""
                                            id="defaultRadio1">
                                        <label class="form-check-label" for="defaultRadio1"> Unchecked </label>
                                    </div>
                                    <div class="form-check mt-3">
                                        <input name="default-radio-1" class="form-check-input" type="radio" value=""
                                            id="defaultRadio1">
                                        <label class="form-check-label" for="defaultRadio1"> Unchecked </label>
                                    </div>
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
