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
                  <li><a href="{{ route('pengumuman.index') }}">Pengumuman</a></li>
                  @if (auth()->check())
                      <li><a href="{{ route('logout') }}">logout</a></li>
                      @if (auth()->user()->role_id == 3)
                          <li><a href="{{ route('rekrutmen.index') }}">Dashboard</a></li>
                      @else
                          <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                      @endif
                  @else
                      <li><a href="{{ route('login') }}">login</a></li>
                  @endif
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

      </div>
  </header><!-- End Header -->
