  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
      <div class="container d-flex justify-content-between align-items-center">

          <div class="logo">
              <img src="{{ asset('assets\images\logos\cropped-logo-dark.png.png') }}" style="width: 350px; height: 90px;"
                  alt="Logo">
          </div>

          <nav id="navbar" class="navbar">
              <ul>
                  <li><a href="{{ route('beranda') }}">Beranda</a></li>
                  {{-- <li><a href="{{ route('info.index') }}">Info</a></li> --}}
                  {{-- <li><a href="#">Download</a></li> --}}
                  <li><a href="{{ route('pengumuman.index') }}">Pengumuman</a></li>
                  <li><a href="{{ route('login') }}">login</a></li>
                  <li><a href="{{ route('registrasi') }}">Daftar</a></li>
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

      </div>
  </header><!-- End Header -->
