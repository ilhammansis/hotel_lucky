    <!DOCTYPE html>
    <html lang="en">

    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lucky Hotel Admin| Dashboard</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('spica') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('spica') }}/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    {{-- cdn tambahan --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('spica') }}/css/style.css">
    <!-- endinject -->
    {{-- <link rel="shortcut icon" href="{{ asset('spica') }}/images/favicon.png" /> --}}
    <link rel="shortcut icon" href="{{ asset('img/favicon.jpg') }}" />
    </head>
    <body>
    <div class="container-scroller d-flex">
        <!-- partial:./partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item sidebar-category">
            <p style="font-weight:bold; font-size:1rem">Lucky Hotel <sup>TM</sup></p>
            <span></span>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ url('home',[]) }}">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">Dashboard</span>
                {{-- <div class="badge badge-info badge-pill">2</div> --}}
            </a>
            </li>

            <li class="nav-item sidebar-category">
            <p style="font-size:1rem">Data Kamar</p>
            <span></span>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#kamar" aria-expanded="false" aria-controls="kamar">
                    <i class="mdi mdi-bank menu-icon"></i>
                    <span class="menu-title">Kamar</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="kamar">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('kamar',[]) }}"> Data Kamar </a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ url('kamar/create',[]) }}"> Tambah Data Kamar </a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#tipe-kamar" aria-expanded="false" aria-controls="tipe-kamar">
                    <i class="mdi mdi-city menu-icon"></i>
                    <span class="menu-title">Tipe Kamar</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="tipe-kamar">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('tipekamar',[]) }}"> Data Tipe Kamar </a></li>
                        <li class="nav-item"> <a class="nav-link" href="{{ url('tipekamar/create',[]) }}"> Tambah Tipe Kamar </a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item sidebar-category">
                <p style="font-size:1rem">Data Transaksi</p>
                <span></span>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#transaksi" aria-expanded="false" aria-controls="transaksi">
                    <i class="mdi mdi-cash-100 menu-icon"></i>
                    <span class="menu-title">Transaksi</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="transaksi">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('transaksi',[]) }}">Data Transaksi</a></li>
                        <li class="nav-item"> <a style="color:white" class="nav-link" href="{{ url('transaksi/create',[]) }}">Tambah Data Transaksi</a></li>
                    </ul>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#booking" aria-expanded="false" aria-controls="booking">
                    <i class="mdi mdi-calendar-multiple-check menu-icon"></i>
                    <span class="menu-title">Booking</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="booking">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('booking',[]) }}">Data Booking</a></li>
                        <li class="nav-item"> <a style="color:white" class="nav-link" href="{{ url('booking/create',[]) }}">Tambah Data Booking</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#pembayaran" aria-expanded="false" aria-controls="pembayaran">
                    <i class="mdi mdi-cash-multiple menu-icon"></i>
                    <i class="bi bi-house-gear-fill"></i>
                    <span class="menu-title">Pembayaran</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="pembayaran">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('pembayaran',[]) }}">Data Pembayaran</a></li>
                        <li class="nav-item"> <a style="color:white" class="nav-link" href="{{ url('pembayaran/create',[]) }}">Tambah Data Pembayaran</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item sidebar-category">
                <p style="font-size:1rem">Data Tamu</p>
                <span></span>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#tamu" aria-expanded="false" aria-controls="tamu">
                    <i class="mdi mdi-account-multiple menu-icon"></i>
                    <i class="bi bi-house-gear-fill"></i>
                    <span class="menu-title">Tamu</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="tamu">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('tamu',[]) }}">Data Tamu</a></li>
                        <li class="nav-item"> <a style="color:white" class="nav-link" href="{{ url('tamu/create',[]) }}">Tambah Tamu</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ulasan-tamu" aria-expanded="false" aria-controls="ulasan-tamu">
                    <i class="mdi mdi-certificate menu-icon"></i>
                    <i class="bi bi-house-gear-fill"></i>
                    <span class="menu-title">Ulasan</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ulasan-tamu">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('riview',[]) }}">Data Ulasan</a></li>
                        <li class="nav-item"> <a style="color:white" class="nav-link" href="{{ url('riview/create',[]) }}">Tambah Ulasan</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item sidebar-category">
                <p style="font-size:1rem">Data Pengguna</p>
                <span></span>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                    <i class="mdi mdi-account menu-icon"></i>
                    <span class="menu-title">Pengguna</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="auth">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link" href="{{ url('user',[]) }}"> Data User </a></li>
                    </ul>
                </div>
            </li>

        </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
        <!-- partial:./partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>
            <div class="navbar-brand-wrapper">
                <a class="navbar-brand brand-logo" href="{{ url('home',[]) }}"><img style="width: 30px;border-radius:10px" src="{{ asset('img/man.png') }}" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini" href="{{ url('home',[]) }}"><img src="{{ asset('img/man.png') }}" alt="icon profile"></a>
            </div>
            <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Selamat Datang, {{ Auth::user()->name }}</h4>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item">
                    <h4 class="mb-0 font-weight-bold d-none d-xl-block" id="current-time">
                        {{ \Carbon\Carbon::now()->format('M d, Y - h:i A') }}
                    </h4>
                </li>
                <li class="nav-item dropdown mr-1">
                <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                    <i class="mdi mdi-calendar mx-0"></i>
                    <span class="count bg-info">2</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                    <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                    <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content flex-grow">
                        <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                        </h6>
                        <p class="font-weight-light small-text text-muted mb-0">
                        The meeting is cancelled
                        </p>
                    </div>
                    </a>
                    <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content flex-grow">
                        <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                        </h6>
                        <p class="font-weight-light small-text text-muted mb-0">
                        New product launch
                        </p>
                    </div>
                    </a>
                    <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                    </div>
                    <div class="preview-item-content flex-grow">
                        <h6 class="preview-subject ellipsis font-weight-normal"> Johnson
                        </h6>
                        <p class="font-weight-light small-text text-muted mb-0">
                        Upcoming board meeting
                        </p>
                    </div>
                    </a>
                </div>
                </li>
                <li class="nav-item dropdown mr-2">
                <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                    <i class="mdi mdi-email-open mx-0"></i>
                    <span class="count bg-danger">1</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                    <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                    <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-success">
                        <i class="mdi mdi-information mx-0"></i>
                        </div>
                    </div>
                    <div class="preview-item-content">
                        <h6 class="preview-subject font-weight-normal">Application Error</h6>
                        <p class="font-weight-light small-text mb-0 text-muted">
                        Just now
                        </p>
                    </div>
                    </a>
                    <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-warning">
                        <i class="mdi mdi-settings mx-0"></i>
                        </div>
                    </div>
                    <div class="preview-item-content">
                        <h6 class="preview-subject font-weight-normal">Settings</h6>
                        <p class="font-weight-light small-text mb-0 text-muted">
                        Private message
                        </p>
                    </div>
                    </a>
                    <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                        <div class="preview-icon bg-info">
                        <i class="mdi mdi-account-box mx-0"></i>
                        </div>
                    </div>
                    <div class="preview-item-content">
                        <h6 class="preview-subject font-weight-normal">New user registration</h6>
                        <p class="font-weight-light small-text mb-0 text-muted">
                        2 days ago
                        </p>
                    </div>
                    </a>
                </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
            </div>
            <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
            <ul class="navbar-nav mr-lg-2">
                <li class="nav-item nav-search d-none d-lg-block">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search Here..." aria-label="search" aria-describedby="search">
                </div>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                    <img style="width: 30px;border-radius:60px" src="{{ asset('img/man.png') }}" alt="profile"/>
                    <span class="nav-profile-name">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item">
                    <i class="mdi mdi-settings text-primary"></i>
                    Settings
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout text-primary"></i>
                        {{ __('Logout') }}
                        </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                </li>
                <li class="nav-item">
                <a href="#" class="nav-link icon-link">
                    <i class="mdi mdi-plus-circle-outline"></i>
                </a>
                </li>
                <li class="nav-item">
                <a href="#" class="nav-link icon-link">
                    <i class="mdi mdi-web"></i>
                </a>
                </li>
                <li class="nav-item">
                <a href="#" class="nav-link icon-link">
                    <i class="mdi mdi-clock-outline"></i>
                </a>
                </li>
            </ul>
            </div>
        </nav>

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper" style="color: #404040">
                @if (Session::has('Pesan'))
                    <script>
                        Swal.fire({
                            title: 'Pesan',
                            text: '{{ Session::get('Pesan') }}',
                            icon: 'success',
                            confirmButtonText: 'Oke'
                        })
                    </script>
                @endif
                @yield('content-admin')
            </div>

            <!-- content-wrapper ends -->
            <!-- partial:./partials/_footer.html -->
            <footer class="footer">
            <div class="card">
                <div class="card-body">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Distributed By: <a href="https://www.themewagon.com/" target="_blank">ThemeWagon</a></span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
                </div>
                </div>
            </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- base:js -->
    <script src="{{ asset('spica') }}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{ asset('spica') }}/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('spica') }}/js/off-canvas.js"></script>
    <script src="{{ asset('spica') }}/js/hoverable-collapse.js"></script>
    <script src="{{ asset('spica') }}/js/template.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{ asset('spica') }}/js/dashboard.js"></script>
    <!-- End custom js for this page-->
    <script>
        function updateTime() {
            const now = new Date();
            const options = {
                month: 'long', day: '2-digit', year: 'numeric',
                hour: '2-digit', minute: '2-digit', second: '2-digit',
                hour12: false
            };
            const formattedTime = now.toLocaleString('id-ID', options);
            document.getElementById('current-time').textContent = formattedTime;
        }

        setInterval(updateTime, 1000);
        updateTime();
    </script>
    </body>

    </html>
