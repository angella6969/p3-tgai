<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard.index') }}" class="app-brand-link">

            <span class="app-brand-text demo menu-text fw-bolder ms-2">BBWS SO</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item active">
            <a href="{{ route('dashboard.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <!-- Layouts -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Admin</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('rekrutmen.index') }}" class="menu-link">
                        <div data-i18n="Without menu">Data Rekrutmen</div>
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Rekrutmen</div>
            </a>

            <ul class="menu-sub">

                <li class="menu-item">
                    <a href="{{ route('profile') }}" class="menu-link">
                        <div data-i18n="Without menu">Profile</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="#" class="menu-link">
                        <div data-i18n="Without menu">Dokumen</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
