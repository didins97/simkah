<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Simkah</title>

    <!-- Favicons -->
    <link href="{{ asset('FE/assets') }}/img/logokemenag.png" rel="icon">
    <link href="{{ asset('FE/assets') }}/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->

    @yield('css')
</head>

<body class="{{Auth::user()->level == 'user' &&  Request::segment(2) === 'layanan' ? 'sidebar-mini' : ''}}">
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                            data-width="250">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        <div class="search-backdrop"></div>
                        <div class="search-result">
                            <div class="search-header">
                                Histories
                            </div>
                            <div class="search-item">
                                <a href="#">How to hack NASA using CSS</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-item">
                                <a href="#">Kodinger.com</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-item">
                                <a href="#">#Stisla</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-header">
                                Result
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30"
                                        src="{{ asset('assets') }}/img/products/product-3-50.png" alt="product">
                                    oPhone S9 Limited Edition
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30"
                                        src="{{ asset('assets') }}/img/products/product-2-50.png" alt="product">
                                    Drone X2 New Gen-7
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30"
                                        src="{{ asset('assets') }}/img/products/product-1-50.png" alt="product">
                                    Headphone Blitz
                                </a>
                            </div>
                            <div class="search-header">
                                Projects
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <div class="search-icon bg-danger text-white mr-3">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    Stisla Admin Template
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <div class="search-icon bg-primary text-white mr-3">
                                        <i class="fas fa-laptop"></i>
                                    </div>
                                    Create a new Homepage Design
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('assets') }}/img/avatar/avatar-1.png"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->nama_depan }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">Logged in 5 min ago</div>
                            <a href="#" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html">SIMKAH</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">St</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                       <li class="dropdown {{ Request::segment(2) === 'dashboard' ? 'active' : '' }}">
                            <a href="
                            @switch(Auth::user()->level)
                                @case('admin')
                                    {{ route('admin.dashboard') }}
                                    @break
                                @case('vendor')
                                    {{ route('vendor.dashboard') }}
                                    @break
                                @case('user')
                                    {{ route('user.dashboard') }}
                                    @break
                                @default
                            @endswitch
                            " class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                        </li>
                        @if (Auth::user()->level == 'admin')
                            <li class="menu-header">Master Data</li>
                            <li class="dropdown {{ Request::segment(2) === 'kecamatan' ? 'active' : '' }}">
                                <a href="{{ route('kecamatan.index') }}" class="nav-link"><i class="fas fa-map-marker-alt"></i><span>Daftar
                                        Kecamatan</span></a>
                            </li>
                            {{-- <li class="dropdown {{ Request::segment(2) === 'kantor-urusan-agama' ? 'active' : '' }}">
                                <a href="{{ route('kantor-urusan-agama.index') }}" class="nav-link"><i class="fas fa-landmark"></i><span>Daftar
                                        KUA</span></a>
                            </li> --}}
                            <li class="dropdown {{ Request::segment(2) === 'users' ? 'active' : '' }}">
                                <a href="{{ route('users.index') }}" class="nav-link"><i
                                        class="fas fa-users"></i><span>Pengguna</span></a>
                            </li>
                            <li class="dropdown {{ Request::segment(2) === 'admin' ? 'active' : '' }}">
                                <a href="{{ route('admin.index') }}" class="nav-link"><i
                                        class="fas fa-users"></i><span>Admin</span></a>
                            </li>
                        @endif
                        <li class="menu-header">Sistem</li>
                        <li class="dropdown {{ Request::segment(2) === 'vendor' || Request::segment(2) === 'layanan'  ? 'active' : '' }}">
                            <a href="
                            @switch(Auth::user()->level)
                                @case('admin')
                                    {{ route('vendor.index') }}
                                    @break
                                @case('vendor')
                                    {{ route('layanan.index') }}
                                    @break
                                @case('user')
                                    {{ route('user.layanan.index') }}
                                    @break
                                @default
                            @endswitch
                            " class="nav-link"><i class="fas fa-landmark"></i><span>Daftar {{Auth::user()->level !== 'admin' ? 'Layanan' : 'Vendor'}}</span></a>
                        </li>
                        @if (Auth::user()->level == 'admin' || Auth::user()->level == 'user')
                        <li class="dropdown {{ Request::segment(2) === 'registrasi-nikah' || Request::segment(2) === 'pendaftaran' ? 'active' : '' }}">
                            <a href="
                            @switch(Auth::user()->level)
                                @case('admin')
                                    {{ route('registrasi-nikah.index') }}
                                    @break
                                @case('vendor')
                                    {{-- {{ route('layanan.index') }} --}}
                                    @break
                                @case('user')
                                    {{ route('user.pernikahan.step-one') }}
                                    @break
                                @default
                            @endswitch
                            " class="nav-link"><i class="fas fa-address-card"></i><span>Pendaftaran
                                    Nikah</span></a>
                        </li>
                        @endif
                        <li class="dropdown {{ Request::segment(2) === 'transaksi' ? 'active' : '' }}">
                            <a href="
                            @switch(Auth::user()->level)
                                @case('admin')
                                    {{ route('transaksi.index') }}
                                    @break
                                @case('vendor')
                                    {{ route('vendor.transaksi.index') }}
                                    @break
                                @case('user')
                                    {{ route('user.transaksi.index') }}
                                    @break
                                @default
                            @endswitch
                            " class="nav-link"><i
                                    class="fas fa-money-check-alt"></i><span>Transaksi</span></a>
                        </li>
                    </ul>

                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="{{ route('landing_page') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
                            <i class="fas fa-rocket"></i> Halaman Utama
                        </a>
                    </div>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('header')</h1>
                        @if (Auth::user()->level === 'vendor' && Request::segment(2) === 'layanan')
                        <div class="section-header-button">
                            <a href="{{ route('layanan.create') }}" class="btn btn-primary">Tambah</a>
                        </div>
                        @endif
                        {{-- @if (Auth::user()->level === 'user' && Request::segment(2) === 'pendaftaran-nikah')
                        <div class="section-header-button">
                            <a href="{{ route('registrasi-nikah.index') }}" class="btn btn-primary">List Pendaftaran</a>
                        </div>
                        @endif --}}
                    </div>
                    <div class="section-body">
                        @yield('content')
                    </div>
                </section>
                @yield('modal')
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad
                        Nauval Azhar</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets') }}/modules/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/modules/popper.js"></script>
    <script src="{{ asset('assets') }}/modules/tooltip.js"></script>
    <script src="{{ asset('assets') }}/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets') }}/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="{{ asset('assets') }}/modules/moment.min.js"></script>
    <script src="{{ asset('assets') }}/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('assets') }}/js/scripts.js"></script>
    <script src="{{ asset('assets') }}/js/custom.js"></script>

    @stack('scripts')
</body>

</html>
