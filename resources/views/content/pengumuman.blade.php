@extends('layout.content.main')
@section('container')
    <!-- ======= Blog Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Pengumuman</h2>

                <ol>
                    <li><a href="index.html">Beranda</a></li>
                    <li>Pengumuman</li>
                </ol>
            </div>

        </div>
    </section><!-- End Blog Section -->

    <!-- ======= Blog Section ======= -->
    <section id="" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-12 entries">
                    {{-- {{ $pengumumans }} --}}
                    @foreach ($pengumumans as $pengumuman)
                        <article class="entry">
                            <h2 class="entry-title">
                                {{ $pengumuman->nama }}
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                            href="blog-single.html"><time datetime="2020-01-01">
                                                {{ $pengumuman->created_at }}
                                            </time></a></li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p>{{ $pengumuman->judul }}</p>
                                <div class="">
                                    <table class="table table-bordered">
                                        <td>{{ $pengumuman->body }}</td>
                                        <td class="d-flex justify-content-center"><a
                                                href="{{ $pengumuman->link_pengumuman }}">Unduh</a></td>
                                    </table>
                                </div>
                            </div>
                        </article>
                    @endforeach

                </div><!-- End blog entries list -->
            </div>
        </div>
    </section><!-- End Blog Section -->
@endsection
