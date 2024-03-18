@extends('layout.content.main')
@section('container')
    <!-- Carousel container -->

    {{-- <section>
        <div class="container" data-aos="fade-up">
            <div class="d-flex justify-content-center">
                <h1 style="text-align: center"> Info P3-TGAI BBWS Serayu Opak</h1>
            </div>
            <div class="row">
                <div class="col-md-4" data-aos="fade-up">
                    <img class="img-fluid" src="{{ asset('assets\images\background\lapor-medsos-copy.jpg') }}" alt="">
                </div>
                <div class="col-md-4" data-aos="fade-up">
                    <img class="img-fluid" src="{{ asset('assets\images\background\lapor-medsos-copy.jpg') }}" alt="">
                </div>
                <div class="col-md-4" data-aos="fade-up">
                    <img class="img-fluid" src="{{ asset('assets\images\background\lapor-medsos-copy.jpg') }}"
                        alt="">
                </div>
            </div>
        </div>
    </section> --}}

    <style>
    </style>

    <!-- ======= Hero No Slider Section ======= -->
    <section id="hero-no-slider" class="d-flex justify-cntent-center align-items-center">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="col-xl-12" data-aos="fade-up">
                <img class=""
                    style="width: 100%; 
                height: 100%;
                object-fit: cover;
                top: 0; 
                left: 0; "
                    src="{{ asset('assets\images\background\lapor-medsos-copy.jpg') }}" alt="">
            </div>
        </div>
    </section><!-- End Hero No Slider Sectio -->
    <!-- ======= Services Section ======= -->
    <section class="services">
        <div class="container">

            <div class="row">
                <div class="d-flex justify-content-center " data-aos="fade-up">
                    <h1 style="text-align: center">Alur Penerimaan TPM P3-TGAI</h1>
                </div>
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
                    <div class="icon-box icon-box-pink">
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <h4 class="title"><a href="">Pendaftaran</a></h4>
                        <p class="description">Proses seleksi Administrasi</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
                    <div class="icon-box icon-box-pink">
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <h4 class="title"><a href="">Seleksi Administrasi</a></h4>
                        <p class="description">Proses seleksi Administrasi</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon-box icon-box-cyan">
                        <div class="icon"><i class="bx bx-file"></i></div>
                        <h4 class="title"><a href="">Pengisian Data Diri</a></h4>
                        <p class="description">Proses pengisian data diri</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box icon-box-green">
                        <div class="icon"><i class="bx bx-tachometer"></i></div>
                        <h4 class="title"><a href="">Tes Wawancara</a></h4>
                        <p class="description">Proses seleksi wawancara</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box icon-box-blue">
                        <div class="icon"><i class="bx bx-world"></i></div>
                        <h4 class="title"><a href="">Hasil Akhir</a></h4>
                        <p class="description">Pengumuman hasil akhir</p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Services Section -->
    <x-alert></x-alert>
@endsection
