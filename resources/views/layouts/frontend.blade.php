<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>PPID BSN</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('adminlte/dist/img/favicon.ico') }}" rel="icon">
    {{-- <link href="{{ asset('arsha/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('arsha/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon"> --}}

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('arsha/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('arsha/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('arsha/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('arsha/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('arsha/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('arsha/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('arsha/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('arsha/assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Arsha
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index.html"><img src="{{ asset('bsn/bsn-logo.png') }}" width="200px"
                        alt="logo-ppid" /></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
                    <li class="dropdown"><a href="#"><span>PPID</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="nav-link scrollto" href="#profile">Profil PPID</a></li>
                            <li><a class="nav-link scrollto" href="#contact">Kontak Kami</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Regulasi</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="nav-link scrollto" href="#regulation">Regulasi Keterbukaan Informasi
                                    Publik</a></li>
                            <li><a class="nav-link scrollto" href="https://jdih.bsn.go.id" target="_blank">Regulasi
                                    Lainnya</a></li>
                            <li><a class="nav-link scrollto" href="https://tinyurl.com/RegulasiKIP"
                                    target="_blank">Rancangan
                                    Regulasi</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Informasi Publik</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li>
                                <a class="nav-link scrollto" href="#anytime-information-list">
                                    Informasi Setiap Saat
                                </a>
                            </li>
                            <li>
                                <a class="nav-link scrollto" href="#periodic-information-list">
                                    Informasi Berkala
                                </a>
                            </li>
                            <li>
                                <a class="nav-link scrollto" href="#immediately-information-list">
                                    Informasi Serta-merta
                                </a>
                            </li>
                            <li>
                                <a class="nav-link scrollto" href="#other-information-list">
                                    Informasi Lainnya
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="#pi-services">Layanan Informasi Publik</a></li>
                    <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
                    <li class="dropdown"><a href="#"><span>Tautan</span> <i class="bi bi-chevron-down"></i></a>
                        <ul class="dropdown-menu" style="right: 0; left: auto;">
                            <li><a href="https://bsn.lapor.go.id/" target="_blank">Pengaduan Masyarakat</a></li>
                            <li><a href="https://bsn.go.id/" target="_blank">Website BSN</a></li>
                            <li><a href="https://perpustakaan.bsn.go.id/" target="_blank">Perpustakaan</a></li>
                            <li><a href="https://kan.or.id/" target="_blank">Akreditasi</a></li>
                            <li><a href="https://sparta.bsn.go.id/" target="_blank">Metrologi (Kalibrasi)</a></li>
                            <li><a href="https://pesta.bsn.go.id/" target="_blank">Pemesanan Standar</a></li>
                            <li><a href="https://bangbeni.bsn.go.id/" target="_blank">Barang ber-SNI</a></li>
                            <li><a href="https://binaumk.bsn.go.id/" target="_blank">SNI Bina UMK</a></li>
                            <li><a href="https://diklat.bsn.go.id/" target="_blank">Diklat SPK</a></li>
                            <li><a href="https://elearning.bsn.go.id/" target="_blank">E-learning SPK</a></li>
                            {{-- <li><a href="https://iin.bsn.go.id/">Issuer Identification
                                    Number (IIN)</a></li> --}}
                        </ul>
                    </li>
                    {{-- <li class="dropdown"><a href="#"><span>Tautan</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li><a class="nav-link scrollto" href="#team">Pengaduan Masyarakat</a></li>
                    <li><a class="nav-link scrollto" href="#team">FAQ</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    <li><a class="getstarted scrollto" href="#about">Get Started</a></li> --}}
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>Portal Layanan Publik BSN</h1>
                    <h2>Sarana online layanan informasi publik <br /> Badan Standardisasi Nasional</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="https://youtu.be/zVBraZNBeHY" class="glightbox btn-get-started">
                            <i class="bi bi-youtube"></i> Keterbukaan Informasi Publik BSN
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('arsha/assets/img/hero-img.png') }}" class="img-fluid animated"
                        alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Clients Section ======= -->
        {{-- <section id="clients" class="clients section-bg">
            <div class="container">

                <div class="row" data-aos="zoom-in">

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('arsha/assets/img/clients/client-1.png') }}" class="img-fluid"
                            alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('arsha/assets/img/clients/client-2.png') }}" class="img-fluid"
                            alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('arsha/assets/img/clients/client-3.png') }}" class="img-fluid"
                            alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('arsha/assets/img/clients/client-4.png') }}" class="img-fluid"
                            alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('arsha/assets/img/clients/client-5.png') }}" class="img-fluid"
                            alt="">
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('arsha/assets/img/clients/client-6.png') }}" class="img-fluid"
                            alt="">
                    </div>

                </div>

            </div>
        </section><!-- End Cliens Section --> --}}

        <!-- ======= Cta Section ======= -->
        {{-- <section id="cta" class="cta">
            <div class="container" data-aos="zoom-in">

                <div class="row">
                    <div class="col-lg-9 text-center text-lg-start">
                        <h3>Call To Action</h3>
                        <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                            mollit anim id est laborum.</p>
                    </div>
                    <div class="col-lg-3 cta-btn-container text-center">
                        <a class="cta-btn align-middle" href="#">Call To Action</a>
                    </div>
                </div>

            </div>
        </section><!-- End Cta Section --> --}}

        <!-- ======= About Us Section ======= -->
        <section id="profile" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Profil PPID</h2>
                </div>

                <div class="row content">
                    @foreach ($profileContents as $profileContent)
                        <div class="col-lg-12 mb-2">
                            {{-- <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore
                            magna aliqua.
                        </p> --}}
                            <ul>
                                <li>
                                    <h3><i class="ri-check-double-line"></i> {{ $profileContent->title }}</h3>
                                    <p class="lh-base">{!! $profileContent->description !!}</p>
                                    @if (!empty($profileContent->img))
                                        <img src="{{ asset('uploaded-images/' . $profileContent->img) }}"
                                            class="img-fluid" width="650" />
                                    @endif
                                </li>
                                {{-- <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in
                                voluptate velit</li>
                            <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                consequat</li> --}}
                            </ul>
                        </div>
                        {{-- <div class="col-lg-6 pt-4 pt-lg-0">
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <a href="#" class="btn-learn-more">Learn More</a>
                    </div> --}}
                    @endforeach
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Kontak Kami</h2>
                    <p>PPID BADAN STANDARDISASI NASIONAL.</p>
                </div>

                <div class="row">

                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="info">
                            @foreach ($contactContents as $contactContent)
                                <div class="contact-details">
                                    @if ($contactContent->title == 'Alamat')
                                        <i class="bi bi-geo-alt"></i>
                                    @elseif ($contactContent->title == 'Email')
                                        <i class="bi bi-envelope"></i>
                                    @elseif ($contactContent->title == 'Telepon')
                                        <i class="bi bi-phone"></i>
                                    @elseif ($contactContent->title == 'Whatsapp')
                                        <i class="bi bi-whatsapp"></i>
                                    @endif
                                    <h4>{{ $contactContent->title }}:</h4>
                                    <p>{{ $contactContent->description }}</p>
                                </div>
                            @endforeach

                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.595208148395!2d106.82010237395151!3d-6.184892560597525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f428c48fffff%3A0x6482fd44854ce4f1!2sBADAN%20STANDARDISASI%20NASIONAL!5e0!3m2!1sid!2sid!4v1688880129924!5m2!1sid!2sid"
                                frameborder="0" style="border:0; width: 100%; height: 290px;" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
                        </div>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

        <!-- ======= Why Us Section ======= -->
        {{-- <section id="why-us" class="why-us section-bg">
            <div class="container-fluid" data-aos="fade-up">

                <div class="row">

                    <div
                        class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                        <div class="content">
                            <h3>Eum ipsam laborum deleniti <strong>velit pariatur architecto aut nihil</strong></h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                            </p>
                        </div>

                        <div class="accordion-list">
                            <ul>
                                <li>
                                    <a data-bs-toggle="collapse" class="collapse"
                                        data-bs-target="#accordion-list-1"><span>01</span> Non consectetur a erat nam
                                        at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-1" class="collapse show"
                                        data-bs-parent=".accordion-list">
                                        <p>
                                            Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus
                                            laoreet non curabitur gravida. Venenatis lectus magna fringilla urna
                                            porttitor rhoncus dolor purus non.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2"
                                        class="collapsed"><span>02</span> Feugiat scelerisque varius morbi enim nunc?
                                        <i class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                                        <p>
                                            Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id
                                            interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus
                                            scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper
                                            dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3"
                                        class="collapsed"><span>03</span> Dolor sit amet consectetur adipiscing elit?
                                        <i class="bx bx-chevron-down icon-show"></i><i
                                            class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                                        <p>
                                            Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci.
                                            Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet
                                            nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis
                                            convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio
                                            morbi quis
                                        </p>
                                    </div>
                                </li>

                            </ul>
                        </div>

                    </div>

                    <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
                        style='background-image: url("arsha/assets/img/why-us.png");' data-aos="zoom-in"
                        data-aos-delay="150">&nbsp;</div>
                </div>

            </div>
        </section><!-- End Why Us Section --> --}}

        <!-- ======= Skills Section ======= -->
        {{-- <section id="skills" class="skills">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-6 d-flex align-items-center" data-aos="fade-right" data-aos-delay="100">
                        <img src="{{ asset('arsha/assets/img/skills.png') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left" data-aos-delay="100">
                        <h3>Voluptatem dignissimos provident quasi corporis voluptates</h3>
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore
                            magna aliqua.
                        </p>

                        <div class="skills-content">

                            <div class="progress">
                                <span class="skill">HTML <i class="val">100%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="100"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="progress">
                                <span class="skill">CSS <i class="val">90%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="90"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="progress">
                                <span class="skill">JavaScript <i class="val">75%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="75"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="progress">
                                <span class="skill">Photoshop <i class="val">55%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="55"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </section><!-- End Skills Section --> --}}

        <!-- ======= Regulation Section ======= -->
        <section id="regulation" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Daftar Regulasi</h2>
                    <p>PERATURAN DAN RANCANGAN PERATURAN KETERBUKAAN INFORMASI PUBLIK BADAN STANDARDISASI NASIONAL.</p>
                </div>

                <div class="row">
                    @foreach ($regulationContents as $regulationContent)
                        <div class="col-md-6 mt-4" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box h-100 w-100 row">
                                <div class="col-sm-1">
                                    <span class="icon"><i class="bi bi-book"></i></span>
                                </div>
                                <div class="col-sm-11 mt-2">
                                    <h5>
                                        <a id="{{ $regulationContent->id }}" class="regulation-list"
                                            href="javascript:void(0)">{{ $regulationContent->category }}</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Regulation Section -->

        <!-- ======= Anytime Information List Section ======= -->
        <section id="anytime-information-list" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Daftar Informasi Setiap Saat</h2>
                    <p>INFORMASI PUBLIK BADAN STANDARDISASI NASIONAL YANG DISEDIAKAN DAN DIUMUMKAN SETIAP SAAT.</p>
                </div>

                <div class="row">
                    @foreach ($anytimeInformationContents as $anytimeInformationContent)
                        <div class="col-md-6 mt-4" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box h-100 w-100 row">
                                <div class="col-sm-1">
                                    <span class="icon"><i class="bi bi-book"></i></span>
                                </div>
                                <div class="col-sm-11 mt-2">
                                    <h5>
                                        <a id="{{ $anytimeInformationContent->id }}" class="anytime-information-list"
                                            href="javascript:void(0)">{{ $anytimeInformationContent->category }}</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Anytime Information Section -->

        <!-- ======= Periodic Information List Section ======= -->
        <section id="periodic-information-list" class="services  section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Daftar Informasi Berkala</h2>
                    <p>INFORMASI PUBLIK BADAN STANDARDISASI NASIONAL YANG DISEDIAKAN DAN DIUMUMKAN SECARA BERKALA.</p>
                </div>

                <div class="row">
                    @foreach ($periodicInformationContents as $periodicInformationContent)
                        <div class="col-md-6 mt-4" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box h-100 w-100 row">
                                <div class="col-sm-1">
                                    <span class="icon"><i class="bi bi-book"></i></span>
                                </div>
                                <div class="col-sm-11 mt-2">
                                    <h5>
                                        <a id="{{ $periodicInformationContent->id }}"
                                            class="periodic-information-list"
                                            href="javascript:void(0)">{{ $periodicInformationContent->category }}</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Periodic Information Section -->

        <!-- ======= Immediately Information List Section ======= -->
        <section id="immediately-information-list" class="services  section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Daftar Informasi Serta Merta</h2>
                    <p>INFORMASI PUBLIK BADAN STANDARDISASI NASIONAL YANG DISEDIAKAN DAN DIUMUMKAN SERTA MERTA.</p>
                </div>

                <div class="row">
                    @foreach ($immediatelyInformationContents as $immediatelyInformationContent)
                        <div class="col-md-6 mt-4" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box h-100 w-100 row">
                                <div class="col-sm-1">
                                    <span class="icon"><i class="bi bi-book"></i></span>
                                </div>
                                <div class="col-sm-11 mt-2">
                                    <h5>
                                        <a id="{{ $immediatelyInformationContent->id }}"
                                            class="immediately-information-list"
                                            href="javascript:void(0)">{{ $immediatelyInformationContent->category }}</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Immediately Information Section -->

        <!-- ======= Other Information List Section ======= -->
        <section id="other-information-list" class="services  section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Daftar Informasi Lainnya</h2>
                    <p>INFORMASI LAINNYA YANG DISEDIAKAN DAN DIUMUMKAN OLEH BADAN STANDARDISASI NASIONAL.</p>
                </div>

                <div class="row">
                    @foreach ($otherInformationContents as $otherInformationContent)
                        <div class="col-md-6 mt-4" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box h-100 w-100 row">
                                <div class="col-sm-1">
                                    <span class="icon"><i class="bi bi-book"></i></span>
                                </div>
                                <div class="col-sm-11 mt-2">
                                    <h5>
                                        <a id="{{ $otherInformationContent->id }}" class="other-information-list"
                                            href="javascript:void(0)">{{ $otherInformationContent->category }}</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- End Other Information Section -->

        <!-- ======= Public Information Services Section ======= -->
        <section id="pi-services" class="team">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Layanan Informasi Publik</h2>
                    <p>LAYANAN INFORMASI PUBLIK BADAN STANDARDISASI NASIONAL.</p>
                </div>

                <div class="row">

                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                        <div class="member d-flex align-items-start">
                            <img src="{{ asset('bsn/maklumat.png') }}" class="glightbox img-fluid" alt="">
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                        <div class="member d-flex align-items-start">
                            <img src="{{ asset('bsn/prosedur-permohonan-ppid.png') }}" class="glightbox img-fluid"
                                alt="">
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                        <div class="member d-flex align-items-start">
                            <img src="{{ asset('bsn/prosedur-keberatan-ppid.png') }}" class="glightbox img-fluid"
                                alt="">
                        </div>
                    </div>

                </div>
                <div class="row">
                    @foreach ($piServiceContents as $piServiceContent)
                        <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="100">
                            <div class="member d-flex align-items-start">
                                {{-- <div class="pic"><img src="{{ asset('arsha/assets/img/team/team-1.jpg') }}"
                                    class="img-fluid" alt=""></div> --}}
                                <div class="member-info">
                                    <h4>{{ $piServiceContent->title }}</h4>
                                    <span></span>
                                    <p>{{ $piServiceContent->description }}</p>
                                    <a href="{{ $piServiceContent->url }}" target="_blank">
                                        <i class="ri-download-cloud-2-fill"> unduh form</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section><!-- Public Information Services Section -->

        <!-- ======= Pricing Section ======= -->
        {{-- <section id="pricing" class="pricing">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Pricing</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                        ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="box">
                            <h3>Free Plan</h3>
                            <h4><sup>$</sup>0<span>per month</span></h4>
                            <ul>
                                <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
                                <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
                                <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
                                <li class="na"><i class="bx bx-x"></i> <span>Pharetra massa massa ultricies</span>
                                </li>
                                <li class="na"><i class="bx bx-x"></i> <span>Massa ultricies mi quis
                                        hendrerit</span></li>
                            </ul>
                            <a href="#" class="buy-btn">Get Started</a>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="box featured">
                            <h3>Business Plan</h3>
                            <h4><sup>$</sup>29<span>per month</span></h4>
                            <ul>
                                <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
                                <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
                                <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
                                <li><i class="bx bx-check"></i> Pharetra massa massa ultricies</li>
                                <li><i class="bx bx-check"></i> Massa ultricies mi quis hendrerit</li>
                            </ul>
                            <a href="#" class="buy-btn">Get Started</a>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                        <div class="box">
                            <h3>Developer Plan</h3>
                            <h4><sup>$</sup>49<span>per month</span></h4>
                            <ul>
                                <li><i class="bx bx-check"></i> Quam adipiscing vitae proin</li>
                                <li><i class="bx bx-check"></i> Nec feugiat nisl pretium</li>
                                <li><i class="bx bx-check"></i> Nulla at volutpat diam uteera</li>
                                <li><i class="bx bx-check"></i> Pharetra massa massa ultricies</li>
                                <li><i class="bx bx-check"></i> Massa ultricies mi quis hendrerit</li>
                            </ul>
                            <a href="#" class="buy-btn">Get Started</a>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Pricing Section --> --}}

        <!-- ======= Frequently Asked Questions Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Frequently Asked Questions</h2>
                    <p>DOKUMENTASI PERTANYAAN DAN JAWABAN SEPUTAR INFORMASI STANDARDISASI DAN PENILAIAN KESESUAIAN.</p>
                </div>

                <div class="faq-list">
                    @foreach ($faqContents as $faqContent)
                        <ul>
                            <li data-aos="fade-up" data-aos-delay="100">
                                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                    class="collapsed"
                                    data-bs-target="#faq-list-{{ $faqContent->id }}">{{ $faqContent->question }} <i
                                        class="bx bx-chevron-down icon-show"></i><i
                                        class="bx bx-chevron-up icon-close"></i></a>
                                <div id="faq-list-{{ $faqContent->id }}" class="collapse"
                                    data-bs-parent=".faq-list">
                                    <p>{!! $faqContent->answer !!}</p>
                                </div>
                            </li>
                        </ul>
                    @endforeach
                </div>

            </div>
        </section><!-- End Frequently Asked Questions Section -->

    </main><!-- End #main -->

    @include('components.frontend.modal-frontend')

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- Histats.com  (div with counter) -->
                    <div id="histats_counter"></div>
                    <a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?4789001&101" alt="" border="0"></a>
                    <!-- Histats.com  START  (aync)-->
                    <script type="text/javascript">
                        var _Hasync= _Hasync|| [];
                        _Hasync.push(['Histats.start', '1,4789001,4,15,170,40,00011111']);
                        _Hasync.push(['Histats.fasi', '1']);
                        _Hasync.push(['Histats.track_hits', '']);
                        (function() {
                            var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
                            hs.src = ('//s10.histats.com/js15_as.js');
                            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
                        })();
                    </script>
                    <!-- Histats.com  END  -->
                </div>
            </div>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Badan Standardisasi Nasional</h3>
                        @foreach ($contactContents as $contactContent)
                            @if ($contactContent->title == 'Alamat')
                                <p>{{ $contactContent->description }}</p>
                            @endif
                            <p>
                                @if ($contactContent->title == 'Whatsapp')
                                    <strong>Whatsapp:</strong> {{ $contactContent->description }}<br>
                                @endif
                                @if ($contactContent->title == 'Email')
                                    <strong>Email:</strong> {{ $contactContent->description }}<br>
                                @endif
                            </p>
                        @endforeach
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Layanan Informasi Publik</h4>
                        <ul>
                            @foreach ($piServiceContents as $piServiceContent)
                                <li>
                                    <i class="bx bx-chevron-right"></i>
                                    <a href="{{ $piServiceContent->url }}" target="_blank">
                                        {{ $piServiceContent->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Tautan Layanan Publik BSN</h4>
                        <ul>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="https://bsn.lapor.go.id/" target="_blank">Pengaduan Masyarakat</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="https://bsn.go.id/" target="_blank">Website BSN</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="https://perpustakaan.bsn.go.id/" target="_blank">Perpustakaan</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="https://kan.or.id/" target="_blank">Akreditasi</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="https://sparta.bsn.go.id/" target="_blank">Metrologi (Kalibrasi)</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="https://pesta.bsn.go.id/" target="_blank">Pemesanan Standar</a>
                            </li>
                            <li><i class="bx bx-chevron-right"></i>
                                <a href="https://bangbeni.bsn.go.id/" target="_blank">Barang ber-SNI</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="https://binaumk.bsn.go.id/" target="_blank">SNI Bina UMK</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="https://diklat.bsn.go.id/" target="_blank">Diklat SPK</a>
                            </li>
                            <li>
                                <i class="bx bx-chevron-right"></i>
                                <a href="https://elearning.bsn.go.id/" target="_blank">E-learning SPK</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Jejaring Media Sosial</h4>
                        <p>Tautan akun Badan Standardisasi Nasional jejaring media sosial.</p>
                        <div class="social-links mt-3">
                            <a href="https://twitter.com/i/flow/login?redirect_after_login=%2Fbsn_sni" class="twitter"
                                target="_blank"><i class="bx bxl-twitter"></i></a>
                            <a href="https://www.facebook.com/BadanStandardisasiNasional" class="facebook"
                                target="_blank"><i class="bx bxl-facebook"></i></a>
                            <a href="https://www.instagram.com/bsn_sni/" class="instagram" target="_blank"><i
                                    class="bx bxl-instagram"></i></a>
                            <a href="https://www.youtube.com/@snibsn" class="google-plus" target="_blank"><i
                                    class="bx bxl-youtube"></i></a>
                            {{-- <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container footer-bottom clearfix d-flex align-items-center justify-content-center">
            
            <div class="copyright">
                &copy; Hak Cipta <strong><span><a href="https://bsn.go.id/">Badan Standardisasi
                            Nasional</a></span></strong> Tahun 2023.
            </div>
            {{-- <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
                Designed by <a href="https://bsn.go.id/">Badan Standardisasi Nasional</a>
            </div> --}}
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div class="preloader-modal" hidden>
        <div class="spinner-border spinner-border-lg text-white"></div>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('arsha/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('arsha/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('arsha/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('arsha/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('arsha/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('arsha/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('arsha/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Jquery JS File -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>


    <!-- Template Main JS File -->
    <script src="{{ asset('arsha/assets/js/main.js') }}"></script>

    <!-- Custom JS File -->
    <script src="{{ asset('js/frontend/frontend.js') }}"></script>

</body>

</html>
