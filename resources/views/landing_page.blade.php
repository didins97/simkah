<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Simkah</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('FE/assets') }}/img/logokemenag.png" rel="icon">
    <link href="{{ asset('FE/assets') }}/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('FE/assets') }}/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('FE/assets') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('FE/assets') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('FE/assets') }}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('FE/assets') }}/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('FE/assets') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('FE/assets') }}/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                {{-- <img src="{{ asset('FE/assets') }}/img/logo.png" alt=""> --}}
                <span>SIMKAH</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    {{-- <li><a class="nav-link scrollto active" href="#hero">Home</a></li> --}}
                    <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
                    <li><a class="nav-link scrollto" href="#fitur">Fitur</a></li>
                    <li><a class="nav-link scrollto" href="#alur">Alur Pendaftaran Online</a></li>
                    <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
                    <li><a class="nav-link scrollto" href="#layanan">Layanan</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
                    {{-- <li><a class="getstarted scrollto" href="#about">Get Started</a></li> --}}
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Sistem Informasi Manajemen Pernikahan</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Kami Menawarkan Solusi Modern untuk Membantu Pernikahan
                        Anda</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="{{ route('register') }}"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Mulai</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('FE/assets') }}/img/bg1.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">

            <div class="container" data-aos="fade-up">
                <div class="row gx-0">

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="content">
                            <h3>Siapa Kami?</h3>
                            <h2>Komitmen Kami untuk Mewujudkan Pernikahan Impian Anda</h2>
                            <p>
                                Kami adalah tim yang berdedikasi untuk membantu Anda merencanakan pernikahan impian
                                Anda. Kami memahami pentingnya momen ini dan siap membantu Anda membuatnya tak
                                terlupakan.
                            </p>
                            <div class="text-center text-lg-start">
                                <a href="#"
                                    class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                    <span>Baca Selengkapnya</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="{{ asset('FE/assets') }}/img/about.jpg" class="img-fluid" alt="">
                    </div>

                </div>
            </div>

        </section><!-- End About Section -->

        <!-- ======= Bagian Fitur Sistem Informasi Nikah ======= -->
        <section id="fitur" class="fitur">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>Fitur Kami</h2>
                    <p>Temukan Layanan yang Kami Tawarkan</p>
                </header>
                <div class="row">
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="box">
                            <img src="{{ asset('FE/assets') }}/img/fitur1.jpeg" class="img-fluid" alt="">
                            <h3>Pendaftaran Pernikahan Online</h3>
                            <p>Daftarkan pernikahan Anda secara online dengan mudah dan efisien. Hemat waktu dan kertas
                                dengan layanan pendaftaran pernikahan digital kami.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                        <div class="box">
                            <img src="{{ asset('FE/assets') }}/img/fitur2.jpeg" class="img-fluid" alt="">
                            <h3>Layanan Vendor Pernikahan</h3>
                            <p>Temukan berbagai macam vendor dan layanan pernikahan untuk membuat hari istimewa Anda tak
                                terlupakan. Terhubung dengan profesional terpercaya dan rencanakan pernikahan Anda
                                dengan mudah.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
                        <div class="box">
                            <img src="{{ asset('FE/assets') }}/img/fitur3.jpeg" class="img-fluid" alt="">
                            <h3>Integrasi GIS</h3>
                            <p>Temukan kekuatan Sistem Informasi Geografis (GIS) dalam merencanakan pernikahan Anda.
                                Jelajahi lokasi pernikahan, venue, dan masih banyak lagi dengan peta interaktif dan
                                layanan berbasis lokasi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Bagian Fitur Sistem Informasi Nikah -->

        <!-- ======= alur Section ======= -->
        <section id="alur" class="alur">

            <div class="container" data-aos="fade-up">
                <!-- Feature Tabs -->
                <div class="row feture-tabs" data-aos="fade-up">
                    <div class="col-lg-6">
                        <h3>Alur Pendaftaran Pernikahan Online</h3>

                        <!-- Tabs -->
                        <ul class="nav nav-pills mb-3">
                            <li>
                                <a class="nav-link active" data-bs-toggle="pill" href="#tab1">Langkah Pertama</a>
                            </li>
                            <li>
                                <a class="nav-link" data-bs-toggle="pill" href="#tab2">Langkah Kedua</a>
                            </li>
                            <li>
                                <a class="nav-link" data-bs-toggle="pill" href="#tab3">Langkah Ketiga</a>
                            </li>
                        </ul><!-- End Tabs -->

                        <!-- Tab Content -->
                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="tab1">
                                <p>Pilih formulir pendaftaran pernikahan online dan isi informasi dasar Anda. Pastikan untuk melengkapi semua detail yang diperlukan.</p>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check2"></i>
                                    <h4>Verifikasi Data</h4>
                                </div>
                                <p>Setelah mengisi formulir, verifikasi kembali data Anda untuk memastikan keakuratannya sebelum melanjutkan ke langkah berikutnya.</p>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check2"></i>
                                    <h4>Pembayaran Biaya Pendaftaran</h4>
                                </div>
                                <p>Melakukan pembayaran biaya pendaftaran pernikahan secara online melalui sistem pembayaran yang telah disediakan.</p>
                            </div><!-- End Tab 1 Content -->

                            <div class="tab-pane fade show" id="tab2">
                                <p>Upload dokumen-dokumen yang diperlukan, seperti KTP, akta kelahiran, dan dokumen lainnya sesuai petunjuk yang diberikan.</p>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check2"></i>
                                    <h4>Proses Verifikasi Dokumen</h4>
                                </div>
                                <p>Dokumen yang diunggah akan diverifikasi oleh petugas untuk memastikan keabsahan dan kevalidan informasi yang diberikan.</p>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check2"></i>
                                    <h4>Jadwal Wawancara</h4>
                                </div>
                                <p>Jika diperlukan, atur jadwal wawancara dengan pihak berwenang untuk memastikan semua persyaratan terpenuhi.</p>
                            </div><!-- End Tab 2 Content -->

                            <div class="tab-pane fade show" id="tab3">
                                <p>Tunggu konfirmasi dari pihak berwenang mengenai kelengkapan dokumen dan persetujuan pendaftaran pernikahan Anda.</p>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check2"></i>
                                    <h4>Proses Selesai</h4>
                                </div>
                                <p>Setelah mendapatkan persetujuan, pendaftaran pernikahan online Anda telah selesai. Anda akan menerima bukti pendaftaran melalui email atau pesan.</p>
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check2"></i>
                                    <h4>Cetak Bukti Pendaftaran</h4>
                                </div>
                                <p>Cetak atau simpan bukti pendaftaran pernikahan sebagai referensi dan untuk keperluan selanjutnya.</p>
                            </div><!-- End Tab 3 Content -->

                        </div>

                    </div>

                    <div class="col-lg-6">
                        <img src="{{ asset('FE/assets') }}/img/features-2.png" class="img-fluid" alt="">
                    </div>

                </div><!-- End Feature Tabs -->
            </div>


        </section><!-- End Features Section -->

        <!-- ======= Bagian Pertanyaan Umum (FAQ) ======= -->
        <section id="faq" class="faq">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>Pertanyaan Umum (FAQ)</h2>
                    <p>Pertanyaan yang Sering Diajukan</p>
                </header>
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Daftar FAQ 1-->
                        <div class="accordion accordion-flush" id="faqlist1">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                                        Bagaimana cara mendaftar pernikahan secara online?
                                    </button>
                                </h2>
                                <div id="faq-content-1" class="accordion-collapse collapse"
                                    data-bs-parent="#faqlist1">
                                    <div class="accordion-body">
                                        Anda dapat mendaftar pernikahan Anda secara online dengan mengikuti
                                        langkah-langkah yang telah kami sediakan. Prosesnya mudah dan efisien.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class "accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                                        Apa saja layanan vendor pernikahan yang tersedia?
                                    </button>
                                </h2>
                                <div id="faq-content-2" class="accordion-collapse collapse"
                                    data-bs-parent="#faqlist1">
                                    <div class="accordion-body">
                                        Anda dapat menemukan berbagai macam vendor dan layanan pernikahan untuk membuat
                                        hari istimewa Anda tak terlupakan. Kami terhubung dengan profesional terpercaya
                                        dan membantu Anda merencanakan pernikahan dengan mudah.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class "accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                                        Apa itu Integrasi GIS?
                                    </button>
                                </h2>
                                <div id="faq-content-3" class="accordion-collapse collapse"
                                    data-bs-parent="#faqlist1">
                                    <div class="accordion-body">
                                        Integrasi Sistem Informasi Geografis (GIS) memungkinkan Anda untuk menjelajahi
                                        lokasi pernikahan, venue, dan fasilitas lainnya dengan peta interaktif. Temukan
                                        kekuatan GIS dalam merencanakan pernikahan Anda dengan baik.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <!-- Daftar FAQ 2-->
                        <div class="accordion accordion-flush" id="faqlist2">
                            <div class="accordion-item">
                                <h2 class "accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq2-content-1">
                                        Bagaimana cara mengakses layanan pendaftaran pernikahan online?
                                    </button>
                                </h2>
                                <div id="faq2-content-1" class="accordion-collapse collapse"
                                    data-bs-parent="#faqlist2">
                                    <div class="accordion-body">
                                        Anda dapat mengakses layanan pendaftaran pernikahan online kami dengan mudah.
                                        Ikuti petunjuk yang telah kami sediakan di platform kami.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class "accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq2-content-2">
                                        Apakah ada panduan untuk memilih vendor pernikahan?
                                    </button>
                                </h2>
                                <div id="faq2-content-2" class="accordion-collapse collapse"
                                    data-bs-parent="#faqlist2">
                                    <div class="accordion-body">
                                        Tentu saja! Kami menyediakan panduan dan rekomendasi untuk membantu Anda memilih
                                        vendor pernikahan yang sesuai dengan kebutuhan Anda.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class "accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq2-content-3">
                                        Bagaimana Sistem Informasi Geografis (GIS) dapat membantu dalam perencanaan
                                        pernikahan?
                                    </button>
                                </h2>
                                <div id="faq2-content-3" class="accordion-collapse collapse"
                                    data-bs-parent="#faqlist2">
                                    <div class="accordion-body">
                                        GIS dapat membantu Anda merencanakan pernikahan dengan menunjukkan lokasi-lokasi
                                        penting, venue pernikahan, dan tempat lainnya dalam peta interaktif. Temukan
                                        keindahan pernikahan Anda dengan GIS.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Bagian Pertanyaan Umum (FAQ) -->

        <!-- ======= Recent Blog Posts Section ======= -->
        <section id="layanan" class="layanan">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Vendor</h2>
                    <p>Layanan Terbaru Vendor Pernikahan</p>
                </header>

                <div class="row">

                    @foreach ($vendor as $item)
                        <div class="col-lg-4">
                            <div class="post-box">
                                <div class="post-img"><img src="{{ asset('storage/images/vendor/thumbnail/' . $item->gambar) }}"
                                        class="img-fluid" alt=""></div>
                                <span class="post-date">
                                    @php
                                        $status = $item->jenis_layanan;
                                        switch ($status) {
                                            case 'foto_video':
                                                $nama = 'Fotografi & Videografi';
                                                break;
                                            case 'katering':
                                                $nama = 'Katering';
                                                break;
                                            case 'dekorasi':
                                                $nama = 'Dekorasi';
                                                break;
                                            case 'rias':
                                                $nama = 'Rias Pengantin dan Tatanan Rambut';
                                                break;
                                            case 'busana':
                                                $nama = 'Busana Pengantin';
                                                break;
                                            case 'undangan':
                                                $nama = 'Undangan dan Desain Grafis';
                                                break;
                                            case 'kord_pernikahan':
                                                $nama = 'Koordinator Pernikahan';
                                                break;
                                        }
                                    @endphp
                                    {{ $nama }}
                                </span>
                                <h3 class="post-title">{{ $item->nama }}</h3>
                                <a href="{{ route('user.layanan.index') }}" class="readmore stretched-link mt-auto"><span>Lihat
                                        Lebih</span><i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

        </section><!-- End Recent Blog Posts Section -->

        <!-- ======= Bagian Kontak ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <h2>Kontak</h2>
                    <p>Hubungi Kami</p>
                </header>
                <div class="row gy-4">
                    <div class="col-lg-6">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Alamat</h3>
                                    <p>Jalan Contoh No. 123,<br>Kota Contoh, 12345</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Hubungi Kami</h3>
                                    <p>+1 2345 6789 10<br>+1 9876 5432 10</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email Kami</h3>
                                    <p>info@contohnikah.com<br>hubungi@contohnikah.com</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-clock"></i>
                                    <h3>Jam Operasional</h3>
                                    <p>Senin - Jumat<br>09:00 - 17:00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="forms/contact.php" method="post" class="php-email-form">
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Nama Anda" required>
                                </div>
                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Email Anda" required>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subjek"
                                        required>
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Pesan Anda" required></textarea>
                                </div>
                                <div class="col-md-12 text-center">
                                    <div class="loading">Sedang Memuat</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Pesan Anda telah terkirim. Terima kasih!</div>
                                    <button type="submit">Kirim Pesan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Bagian Kontak -->


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <img src="{{ asset('FE/assets') }}/img/logo.png" alt="">
                            <span>Sistem Nikah</span>
                        </a>
                        <p>Selamat datang di Sistem Informasi Manajemen Nikah. Kami menyediakan layanan terbaik untuk
                            perencanaan pernikahan Anda. Hubungi kami untuk informasi lebih lanjut.</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Link Berguna</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Beranda</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Tentang Kami</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Layanan</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Ketentuan Layanan</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Kebijakan Privasi</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Layanan Kami</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Desain Web</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Pengembangan Web</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Manajemen Produk</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Pemasaran</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Desain Grafis</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                        <h4>Kontak Kami</h4>
                        <p>
                            Jalan Contoh No. 123 <br>
                            Kota Contoh, 12345<br>
                            Indonesia <br><br>
                            <strong>Telepon:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@contohnikah.com<br>
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>FlexStart</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('FE/assets') }}/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ asset('FE/assets') }}/vendor/aos/aos.js"></script>
    <script src="{{ asset('FE/assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('FE/assets') }}/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('FE/assets') }}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('FE/assets') }}/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('FE/assets') }}/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('FE/assets') }}/js/main.js"></script>

</body>

</html>
