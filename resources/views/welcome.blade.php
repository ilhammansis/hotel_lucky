    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Lucky Hotel | Resort and Hotel</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="{{ asset('homepage') }}/https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
        <link href="{{ asset('homepage') }}/https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('homepage') }}/css/open-iconic-bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('homepage') }}/css/animate.css">
        <link rel="shortcut icon" href="{{ asset('img/favicon.jpg') }}" />


        <link rel="stylesheet" href="{{ asset('homepage') }}/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ asset('homepage') }}/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="{{ asset('homepage') }}/css/magnific-popup.css">

        <link rel="stylesheet" href="{{ asset('homepage') }}/css/aos.css">

        <link rel="stylesheet" href="{{ asset('homepage') }}/css/ionicons.min.css">

        <link rel="stylesheet" href="{{ asset('homepage') }}/css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="{{ asset('homepage') }}/css/jquery.timepicker.css">


        <link rel="stylesheet" href="{{ asset('homepage') }}/css/flaticon.css">
        <link rel="stylesheet" href="{{ asset('homepage') }}/css/icomoon.css">
        <link rel="stylesheet" href="{{ asset('homepage') }}/css/style.css">
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
            <a class="navbar-brand" href="{{ url('/',[]) }}">Lucky Hotel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{ url('/',[]) }}" class="nav-link">Beranda</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Kamar</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Fasilitas</a></li>
                <li class="nav-item"><a href="#" class="nav-link">About</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
                </ul>
            </div>
            </div>
        </nav>
        <!-- END nav -->

        <section class="home-slider owl-carousel">
        <div class="slider-item" style="background-image:url(/img/login.jpg);">
            <div class="overlay"></div>
            <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-12 ftco-animate text-center">
                <div class="text mb-5 pb-3">
                    <h1 class="mb-3">Selamat Datang di Lucky Hotel</h1>
                    <h2>Hotel &amp; Resor</h2>
                </div>
            </div>
            </div>
            </div>
        </div>

        <div class="slider-item" style="background-image:url(/img/navbar-bg.jpg);">
            <div class="overlay"></div>
            <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-12 ftco-animate text-center">
                <div class="text mb-5 pb-3">
                    <h1 class="mb-3">Nikmati Pengalaman Mewah</h1>
                    <h2>Bergabung Bersama Kami</h2>
                </div>
            </div>
            </div>
            </div>
        </div>
        </section>

        <section class="ftco-booking">
            <div class="container">
                <form action="{{ route('booking.store') }}" method="POST" class="booking-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 d-flex">
                            <div class="form-group p-4 align-self-stretch d-flex align-items-end">
                                <div class="wrap">
                                    <label for="checkin_date">Tanggal Check-in</label>
                                    <input type="date" id="checkin_date" name="tanggal_check_in" class="form-control" placeholder="Check-in date" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex">
                            <div class="form-group p-4 align-self-stretch d-flex align-items-end">
                                <div class="wrap">
                                    <label for="checkout_date">Tanggal Check-out</label>
                                    <input type="date" id="checkout_date" name="tanggal_check_out" class="form-control" placeholder="Check-out date" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex">
                            <div class="form-group p-4 align-self-stretch d-flex align-items-end">
                                <div class="wrap">
                                    <label for="room">Kamar</label>
                                    <select id="room" name="kamar_id" class="form-control" required>
                                        @foreach($kamars as $kamar)
                                            <option value="{{ $kamar->id }}">{{ $kamar->nama_kamar }} ({{ $kamar->harga_permalam }})</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex">
                            <div class="form-group p-4 align-self-stretch d-flex align-items-end">
                                <div class="wrap">
                                    <label for="customer">Tamu</label>
                                    <select id="customer" name="jumlah_tamu" class="form-control" required>
                                        <option value="1">1 Orang</option>
                                        <option value="2">2 Orang</option>
                                        <option value="3">3 Orang</option>
                                        <option value="4">4 Orang</option>
                                        <option value="5">5 Orang</option>
                                        <option value="6">6 Orang</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md d-flex">
                            <div class="form-group d-flex align-self-stretch">
                                <input type="submit" value="Check Availability" class="btn btn-primary py-3 px-4 align-self-stretch">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </section>


        <section class="ftco-section ftc-no-pb ftc-no-pt">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/bg_2.jpg);">
                            <a href="https://cdn.pixabay.com/video/2023/02/17/151055-800680791_large.mp4" class="icon popup-vimeo d-flex justify-content-center align-items-center">
                                <span class="icon-play"></span>
                            </a>
                        </div>
                        <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
                <div class="heading-section heading-section-wo-line pt-md-5 pl-md-5 mb-5">
                    <div class="ml-md-0">
                        <span class="subheading">Selamat Datang di Lucky Hotel</span>
                        <h2 class="mb-4">Selamat Datang di Hotel dan Resor Kami</h2>
                    </div>
                </div>
                <div class="pb-md-5">
                                <p>Hotel Lucky adalah pilihan sempurna bagi Anda yang mencari kenyamanan dan kemewahan dengan harga terjangkau. Terletak strategis di pusat kota, hotel ini menawarkan kamar modern dengan fasilitas lengkap, pelayanan ramah, dan suasana yang tenang untuk menjamin kenyamanan Anda. Nikmati sarapan lezat setiap pagi, akses Wi-Fi gratis, serta beragam fasilitas seperti kolam renang dan ruang kebugaran yang membuat pengalaman menginap Anda semakin istimewa. Baik untuk perjalanan bisnis maupun liburan, Hotel Lucky siap memberikan pengalaman tak terlupakan.</p>
                                <p>Rasakan kemewahan di Hotel & Resor kami dengan layanan terbaik dan fasilitas lengkap. Nikmati kenyamanan kamar elegan, suasana tenang, dan cita rasa istimewa dari restoran kami. Lokasi strategis menjadikannya tempat ideal untuk bersantai atau berpetualang. Ciptakan momen tak terlupakan bersama kami dengan pengalaman yang dirancang khusus untuk Anda. Segera rencanakan kunjungan Anda dan temukan pengalaman menginap yang luar biasa.</p>
                                <ul class="ftco-social d-flex">
                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="ftco-section">
        <div class="container">
            <div class="row d-flex">
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services py-4 d-block text-center">
                <div class="d-flex justify-content-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-reception-bell"></span>
                    </div>
                </div>
                <div class="media-body p-2 mt-2">
                    <h3 class="heading mb-3">24/7 Resepsionis</h3>
                    <p>Nikmati layanan resepsionis yang siap membantu Anda kapan saja untuk memastikan kenyamanan dan kebutuhan Anda terpenuhi selama menginap.</p>
                </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services py-4 d-block text-center">
                <div class="d-flex justify-content-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-serving-dish"></span>
                    </div>
                </div>
                <div class="media-body p-2 mt-2">
                    <h3 class="heading mb-3">Bar Restoran</h3>
                    <p>Nikmati hidangan lezat dan minuman segar di bar restoran kami yang menyajikan pengalaman kuliner tak terlupakan di setiap momen Anda.</p>
                </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-sel Searchf-stretch ftco-animate">
                <div class="media block-6 services py-4 d-block text-center">
                <div class="d-flex justify-content-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-car"></span>
                    </div>
                </div>
                <div class="media-body p-2 mt-2">
                    <h3 class="heading mb-3">Antar-Jemput</h3>
                    <p>Kami menyediakan layanan antar-jemput yang nyaman dan aman untuk memastikan perjalanan Anda selalu lancar dan bebas stres, kapan pun Anda membutuhkannya.</p>
                </div>
                </div>
            </div>
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services py-4 d-block text-center">
                <div class="d-flex justify-content-center">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="flaticon-spa"></span>
                    </div>
                </div>
                <div class="media-body p-2 mt-2">
                    <h3 class="heading mb-3">Kamar Spa</h3>
                    <p>Nikmati pengalaman relaksasi total di Spa Suites kami, tempat di mana kenyamanan dan ketenangan berpadu untuk memberikan pengalaman yang menyegarkan dan memanjakan tubuh serta pikiran Anda.</p>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>

        <section class="ftco-section bg-light">
            <div class="container">
                    <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2 class="mb-4">Kamar Kami</h2>
            </div>
            </div>
                <div class="row">
                    <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                        <div class="room">
                            <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(/homepage/images/room-1.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3 text-center">
                                <h3 class="mb-3"><a href="#">{{ $kamar->nama_kamar }}</a></h3>
                                <p><span class="price mr-2">{{ 'Rp. ' . number_format($kamar->harga_permalam, 0, ',', '.') }}</span> <span>per night</span></p>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                        <div class="room">
                            <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(/homepage/images/room-2.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3 text-center">
                                <h3 class="mb-3"><a href="#">{{ $kamar->nama_kamar }}</a></h3>
                                <p><span class="price mr-2">{{ 'Rp. ' . number_format($kamar->harga_permalam, 0, ',', '.') }}</span> <span class="per">per night</span></p>
                                <hr>
                                <p class="pt-1"><a href="room-single.html" class="btn-custom">View Room Details <span class="icon-long-arrow-right"></span></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                        <div class="room">
                            <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(/homepage/images/room-3.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3 text-center">
                                <h3 class="mb-3"><a href="#">{{ $kamar->nama_kamar }}</a></h3>
                                <p><span class="price mr-2">{{ 'Rp. ' . number_format($kamar->harga_permalam, 0, ',', '.') }}</span> <span class="per">per night</span></p>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                        <div class="room">
                            <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(/homepage/images/room-4.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3 text-center">
                                <h3 class="mb-3"><a href="#">{{ $kamar->nama_kamar }}</a></h3>
                                <p><span class="price mr-2">{{ 'Rp. ' . number_format($kamar->harga_permalam, 0, ',', '.') }}</span> <span class="per">per night</span></p>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                        <div class="room">
                            <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(/homepage/images/room-5.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3 text-center">
                                <h3 class="mb-3"><a href="rooms.html">{{ $kamar->nama_kamar }}</a></h3>
                                <p><span class="price mr-2">{{ 'Rp. ' . number_format($kamar->harga_permalam, 0, ',', '.') }}</span> <span class="per">per night</span></p>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                        <div class="room">
                            <a href="#" class="img d-flex justify-content-center align-items-center" style="background-image: url(/homepage/images/room-6.jpg);">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3 text-center">
                                <h3 class="mb-3"><a href="#">{{ $kamar->nama_kamar }}</a></h3>
                                <p><span class="price mr-2">{{ 'Rp. ' . number_format($kamar->harga_permalam, 0, ',', '.') }}</span> <span class="per">per night</span></p>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_1.jpg);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="row">
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number" data-number="50000">0</strong>
                            <span>Happy Guests</span>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number" data-number="3000">0</strong>
                            <span>Rooms</span>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number" data-number="1000">0</strong>
                            <span>Staffs</span>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 text-center">
                        <div class="text">
                            <strong class="number" data-number="100">0</strong>
                            <span>Destination</span>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </section>


        <section class="ftco-section testimony-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-md-8 ftco-animate">
                <div class="row ftco-animate">
                    <div class="col-md-12">
                        <div class="carousel-testimony owl-carousel ftco-owl">
                        <div class="item">
                            <div class="testimony-wrap py-4 pb-5">
                            <div class="user-img mb-4" style="background-image: url(/homepage/images/person_1.jpg)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                <p class="name">Nathan Smith</p>
                                <span class="position">Guests</span>
                            </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4 pb-5">
                            <div class="user-img mb-4" style="background-image: url(/homepage/images/person_2.jpg)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                <p class="name">Nathan Smith</p>
                                <span class="position">Guests</span>
                            </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4 pb-5">
                            <div class="user-img mb-4" style="background-image: url(/homepage/images/person_3.jpg)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                <p class="name">Nathan Smith</p>
                                <span class="position">Guests</span>
                            </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4 pb-5">
                            <div class="user-img mb-4" style="background-image: url(/homepage/images/person_1.jpg)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                <p class="name">Nathan Smith</p>
                                <span class="position">Guests</span>
                            </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap py-4 pb-5">
                            <div class="user-img mb-4" style="background-image: url(/homepage/images/person_1.jpg)">
                                <span class="quote d-flex align-items-center justify-content-center">
                                <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                <p class="name">Nathan Smith</p>
                                <span class="position">Guests</span>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
            </div>
            </div>
        </div>
        </section>


        <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <h2>Blog Terbaru</h2>
            </div>
            </div>
            <div class="row d-flex">
            <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                <a href="blog-single.html" class="block-20" style="background-image: url('/homepage/images/image_1.jpg');">
                </a>
                <div class="text mt-3 d-block">
                    <h3 class="heading mt-3"><a href="#">Hidangan istimewa dengan cita rasa lokal dan internasional.</a></h3>
                    <div class="meta mb-3">
                    <div><a href="#">Dec 6, 2018</a></div>
                    <div><a href="#">Admin</a></div>
                    <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                <a href="blog-single.html" class="block-20" style="background-image: url('/homepage/images/image_2.jpg');">
                </a>
                <div class="text mt-3">
                    <h3 class="heading mt-3"><a href="#">Nikmati suasana tenang dengan panorama alam yang menakjubkan</a></h3>
                    <div class="meta mb-3">
                    <div><a href="#">Dec 6, 2018</a></div>
                    <div><a href="#">Admin</a></div>
                    <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                <a href="blog-single.html" class="block-20" style="background-image: url('/homepage/images/image_3.jpg');">
                </a>
                <div class="text mt-3">
                    <h3 class="heading mt-3"><a href="#">Pulau cantik ini menawarkan pengalaman berenang yang tak terlupakan</a></h3>
                    <div class="meta mb-3">
                    <div><a href="#">Dec 6, 2018</a></div>
                    <div><a href="#">Admin</a></div>
                    <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-3 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch">
                <a href="blog-single.html" class="block-20" style="background-image: url('/homepage/images/image_4.jpg');">
                </a>
                <div class="text mt-3">
                    <h3 class="heading mt-3"><a href="#">Suasana tenang dengan pemandangan memukau untuk waktu bersantai Anda</a></h3>
                    <div class="meta mb-3">
                    <div><a href="#">Dec 6, 2018</a></div>
                    <div><a href="#">Admin</a></div>
                    <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </section>

        <section class="instagram">
        <div class="container-fluid">
            <div class="row no-gutters justify-content-center pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2><span>Instagram</span></h2>
            </div>
            </div>
            <div class="row no-gutters">
            <div class="col-sm-12 col-md ftco-animate">
                <a href="images/insta-1.jpg" class="insta-img image-popup" style="background-image: url(/homepage/images/insta-1.jpg);">
                <div class="icon d-flex justify-content-center">
                    <span class="icon-instagram align-self-center"></span>
                </div>
                </a>
            </div>
            <div class="col-sm-12 col-md ftco-animate">
                <a href="images/insta-2.jpg" class="insta-img image-popup" style="background-image: url(/homepage/images/insta-2.jpg);">
                <div class="icon d-flex justify-content-center">
                    <span class="icon-instagram align-self-center"></span>
                </div>
                </a>
            </div>
            <div class="col-sm-12 col-md ftco-animate">
                <a href="images/insta-3.jpg" class="insta-img image-popup" style="background-image: url(/homepage/images/insta-3.jpg);">
                <div class="icon d-flex justify-content-center">
                    <span class="icon-instagram align-self-center"></span>
                </div>
                </a>
            </div>
            <div class="col-sm-12 col-md ftco-animate">
                <a href="images/insta-4.jpg" class="insta-img image-popup" style="background-image: url(/homepage/images/insta-4.jpg);">
                <div class="icon d-flex justify-content-center">
                    <span class="icon-instagram align-self-center"></span>
                </div>
                </a>
            </div>
            <div class="col-sm-12 col-md ftco-animate">
                <a href="images/insta-5.jpg" class="insta-img image-popup" style="background-image: url(/homepage/images/insta-5.jpg);">
                <div class="icon d-flex justify-content-center">
                    <span class="icon-instagram align-self-center"></span>
                </div>
                </a>
            </div>
            </div>
        </div>
        </section>

        <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Lucky Hotel</h2>
                <p>Jauh di tengah keramaian kota, Hotel Lucky berdiri megah sebagai tempat peristirahatan nyaman dengan suasana tenang dan pelayanan istimewa.</p>
                <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                <h2 class="ftco-heading-2">Useful Links</h2>
                <ul class="list-unstyled">
                    <li><a href="#" class="py-2 d-block">Blog</a></li>
                    <li><a href="#" class="py-2 d-block">Rooms</a></li>
                    <li><a href="#" class="py-2 d-block">Amenities</a></li>
                    <li><a href="#" class="py-2 d-block">Gift Card</a></li>
                </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Privacy</h2>
                <ul class="list-unstyled">
                    <li><a href="#" class="py-2 d-block">Career</a></li>
                    <li><a href="#" class="py-2 d-block">About Us</a></li>
                    <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                    <li><a href="#" class="py-2 d-block">Services</a></li>
                </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                    <ul>
                        <li><span class="icon icon-map-marker"></span><span class="text">Jl. Kol. M. Kukuh, Paal Lima, Kec. Kota Baru, Kota Jambi, Jambi 36125</span></li>
                        <li><a href="#"><span class="icon icon-phone"></span><span class="text">+62 8000001</span></a></li>
                        <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@luckyhote.com</span></a></li>
                    </ul>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | The Lucky Hotel <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Lucky People</a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
            </div>
        </div>
        </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


    <script src="{{ asset('homepage') }}/js/jquery.min.js"></script>
    <script src="{{ asset('homepage') }}/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="{{ asset('homepage') }}/js/popper.min.js"></script>
    <script src="{{ asset('homepage') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('homepage') }}/js/jquery.easing.1.3.js"></script>
    <script src="{{ asset('homepage') }}/js/jquery.waypoints.min.js"></script>
    <script src="{{ asset('homepage') }}/js/jquery.stellar.min.js"></script>
    <script src="{{ asset('homepage') }}/js/owl.carousel.min.js"></script>
    <script src="{{ asset('homepage') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('homepage') }}/js/aos.js"></script>
    <script src="{{ asset('homepage') }}/js/jquery.animateNumber.min.js"></script>
    <script src="{{ asset('homepage') }}/js/bootstrap-datepicker.js"></script>
    <script src="{{ asset('homepage') }}/js/jquery.timepicker.min.js"></script>
    <script src="{{ asset('homepage') }}/js/scrollax.min.js"></script>
    <script src="{{ asset('homepage') }}/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('homepage') }}/js/google-map.js"></script>
    <script src="{{ asset('homepage') }}/js/main.js"></script>

    </body>
    </html>
