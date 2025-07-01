<header class="header d-flex flex-wrap align-items-center" data-page="home2" data-overlay="true">
    <div class="container d-flex flex-wrap flex-xl-nowrap align-items-center justify-content-between">
        <a class="brand header_logo d-flex align-items-center" href="{{ route('/') }}">
            <span class="logo">
                <img src="{{ asset('assets_fe/img/logo dapur halwa 2.png') }}" alt="Logo Dapur Halwa"
                    class="logo-img img-fluid" />
            </span>

        </a>
        <nav class="header_nav">
            <ul class="header_nav-list">
                <li class="header_nav-list_item dropdown">
                    <a class="nav-link d-inline-flex align-items-center {{ request()->routeIs('/') ? 'active' : '' }}"
                        href="{{ route('/') }}">
                        {{ __('messages.beranda') }}
                    </a>
                </li>

                <li class="header_nav-list_item dropdown">
                    <a class="nav-link d-inline-flex align-items-center {{ request()->routeIs('products') ? 'active' : '' }}"
                        href="{{ route('products') }}">
                        {{ __('messages.produk') }}

                    </a>

                </li>
                <li class="header_nav-list_item dropdown">
                    <a class="nav-link d-inline-flex align-items-center {{ request()->routeIs('articles') ? 'active' : '' }}"
                        href="{{ route('articles') }}">
                        {{ __('messages.artikel') }}

                    </a>

                </li>
                <li class="header_nav-list_item dropdown">
                    <a class="nav-link d-inline-flex align-items-center {{ request()->routeIs('about') ? 'active' : '' }}"
                        href="{{ route('about') }}">
                        {{ __('messages.tentang kami') }}

                    </a>
                </li>
                <li class="header_nav-list_item dropdown">
                    <a class="nav-link d-inline-flex align-items-center{{ request()->routeIs('gallery') ? 'active' : '' }}"
                        href="{{ route('gallery') }}">
                        {{ __('messages.galeri') }}

                    </a>
                </li>
                <ul class="footer_secondary-list d-flex justify-content-center align-items-center d-block d-md-none">
                    <li class="list-item">
                        <a class="link d-flex align-items-center gap-2" href="{{ url('/lang/id') }}" target="_self"
                            rel="noopener">
                            <img src="{{ asset('assets/images/flags/indonesia-flag.png') }}" alt="ID"
                                width="30" height="30" class="rounded-circle" style="object-fit: cover;">
                            <span class="fw-medium">ID</span>
                        </a>
                    </li>
                    <li class="list-item">
                        <a class="link d-flex align-items-center gap-2" href="{{ url('/lang/en') }}" target="_self"
                            rel="noopener">
                            <img src="{{ asset('assets/images/flags/united-kingdom.png') }}" alt="EN"
                                width="30" height="30" class="rounded-circle" style="object-fit: cover;">
                            <span class="fw-medium">EN</span>
                        </a>
                    </li>
                </ul>


            </ul>
        </nav>
        <span class="header_trigger d-inline-flex d-xl-none flex-column justify-content-between">
            <span class="line line--short"></span>
            <span class="line line"></span>
            <span class="line line--short"></span>
            <span class="line line"></span>
        </span>
        <div class="header_user d-flex justify-content-end align-items-center">
            <form class="header_user-search" action="#" method="get" data-type="searchForm">
                <input class="header_user-search_field field required" type="text"
                    placeholder="{{ __('messages.Search placeholder') }}" />
                <button
                    class="header_user-search_btn header_user-action d-inline-flex align-items-center justify-content-center"
                    type="submit" data-trigger="search">
                    <i class="icon-search"></i>
                </button>
            </form>

            <nav class="header_nav">
                <ul class="header_nav-list d-flex align-items-center justify-content-end pe-3">
                    @php
                        $locale = session('locale', app()->getLocale());
                    @endphp

                    <li class="header_nav-list_item dropdown me-2"> <!-- Geser ke kiri -->
                        <a class="nav-link dropdown-toggle d-inline-flex align-items-center" href="#"
                            data-bs-toggle="collapse" data-bs-target="#languageMenu" aria-expanded="false"
                            aria-controls="languageMenu">
                            <img src="{{ asset('assets/images/flags/' . ($locale === 'id' ? 'indonesia-flag.png' : 'united-kingdom.png')) }}"
                                alt="{{ $locale }}" width="40" height="34" class="me-2">
                            {{ strtoupper($locale) }}
                            <i class="icon-caret_down icon ms-1"></i>
                        </a>

                        <div class="dropdown-menu collapse" id="languageMenu">
                            <ul class="dropdown-list">
                                <li class="list-item nav-item">
                                    <a class="dropdown-item d-flex align-items-center" href="{{ url('/lang/id') }}">
                                        <img src="{{ asset('assets/images/flags/indonesia-flag.png') }}" alt="ID"
                                            width="20" height="14" class="me-2">
                                        ID
                                    </a>
                                </li>
                                <li class="list-item nav-item">
                                    <a class="dropdown-item d-flex align-items-center" href="{{ url('/lang/en') }}">
                                        <img src="{{ asset('assets/images/flags/united-kingdom.png') }}" alt="EN"
                                            width="20" height="14" class="me-2">
                                        EN
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
</header>
