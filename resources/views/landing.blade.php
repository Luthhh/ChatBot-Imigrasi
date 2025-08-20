<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImmiBot - Asisten Imigrasi Cerdas Anda</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .hero-section {
            background: linear-gradient(to right, rgba(30, 144, 255, 0.1), rgba(40, 58, 82, 0.1));
            padding: 6rem 0;
        }

        .features-section {
            padding: 5rem 0;
        }

        .feature-icon {
            font-size: 3rem;
            color: #283a52;
        }

        .cta-section {
            background-color: #f4f5f7;
            padding: 4rem 0;
        }

        .footer {
            background-color: #283a52;
            color: white;
        }

        .footer h6 {
            color: #ffc107;
            /* Bootstrap's warning/yellow color for titles */
        }

        .footer a {
            color: white;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .footer .social-icons a {
            transition: transform 0.2s;
        }

        .footer .social-icons a:hover {
            transform: scale(1.1);
        }

        .testimonials-section {
            background-color: #f8f9fa;
            /* A slightly different background */
            padding: 5rem 0 2rem;
            /* Mengurangi padding bawah */
        }

        .testimonial-card {
            border: 1px solid #e9ecef;
            border-radius: .75rem;
            transition: transform .2s, box-shadow .2s;
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, .1);
        }

        .testimonial-avatar {
            width: 80px;
            height: 80px;
            object-fit: cover;
            margin-top: -40px;
            border: 4px solid white;
        }

        .stars {
            color: #ffc107;
            /* Bootstrap's warning/yellow color */
        }

        .accordion-button:not(.collapsed) {
            color: #283a52;
            background-color: #e7f1ff;
        }

        .accordion-button:focus {
            box-shadow: 0 0 0 0.25rem rgba(40, 58, 82, 0.25);
        }

        .accordion-item {
            margin-bottom: 1rem;
            border-radius: .5rem !important;
            border: 1px solid #dee2e6;
            overflow: hidden;
        }

        /* Mengurangi jarak di atas seksi FAQ */
        #faq.features-section {
            padding-top: 2rem;
        }

        /* Animasi untuk maskot */
        @keyframes floatAnimation {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .animated-mascot {
            animation: floatAnimation 4s ease-in-out infinite;
        }
    </style>

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('landing') }}">
                <img src="{{ asset('images/logo.png') }}" alt="ImmiBot Logo" height="40">
                ImmiBot
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#about-immibot">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#faq">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Kontak</a>
                    </li>
                </ul>
                <div class="d-flex ms-lg-3">
                    <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold">Solusi Cerdas untuk Semua Kebutuhan Imigrasi Anda</h1>
                    <p class="lead my-4">Dapatkan jawaban instan dan akurat untuk pertanyaan seputar paspor, visa,
                        KITAS, dan layanan keimigrasian lainnya dengan ImmiBot, asisten virtual Anda yang siap 24/7.</p>
                    <a href="{{ route('chat.index') }}" class="btn btn-primary btn-lg">Mulai Sekarang</a>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('images/maskot.png') }}" alt="ImmiBot Mascot"
                        class="img-fluid w-75 animated-mascot">
                </div>
            </div>
        </div>
    </header>

    <!-- About ImmiBot Section -->
    <section id="about-immibot" class="features-section bg-light">
        <div class="container">
            <div class="row align-items-center gx-lg-5">
                <div class="col-lg-6 text-center mb-5 mb-lg-0">
                    <img src="{{ asset('images/mokup.png') }}" alt="ImmiBot App Mockup" class="img-fluid w-50 rounded-4 shadow">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold display-6 lh-1 mb-3">Apa itu ImmiBot?
                        
                    </h2>
                    <p class="lead">
                        ImmiBot adalah asisten virtual cerdas yang dirancang untuk menjadi jembatan antara Anda dan
                        informasi keimigrasian yang kompleks. 
                    </p>
                    <p class="text-muted">
                        Dibangun dengan teknologi AI terdepan, misi kami adalah
                        menyederhanakan proses pencarian informasi seputar paspor, visa, dan izin tinggal, sehingga
                        Anda dapat menghemat waktu dan menghindari kebingungan. Kami berkomitmen untuk menyediakan
                        platform yang mudah diakses, selalu tersedia, dan dapat diandalkan untuk semua kebutuhan
                        informasi keimigrasian Anda.
                    </p>
                    <div class="mt-4 pt-3 border-top">
                        <h6 class="fw-bold mb-3">Topik yang dapat kami bantu:</h6>
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="me-3 text-primary" style="font-size: 1.75rem; width: 30px; text-align: center;"><i class="fas fa-passport"></i></div>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">Paspor</h6>
                                        <small class="text-muted d-block">Pembuatan baru & perpanjangan.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="me-3 text-primary" style="font-size: 1.75rem; width: 30px; text-align: center;"><i class="fas fa-plane-departure"></i></div>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">Visa</h6>
                                        <small class="text-muted d-block">Kunjungan, kerja, dan lainnya.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="me-3 text-primary" style="font-size: 1.75rem; width: 30px; text-align: center;"><i class="far fa-id-card"></i></div>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">KITAS/KITAP</h6>
                                        <small class="text-muted d-block">Izin tinggal terbatas & tetap.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="me-3 text-primary" style="font-size: 1.75rem; width: 30px; text-align: center;"><i class="fas fa-info-circle"></i></div>
                                    <div>
                                        <h6 class="mb-0 fw-semibold">Informasi Umum</h6>
                                        <small class="text-muted d-block">Biaya, lokasi, dan lainnya.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Kenapa Memilih ImmiBot?</h2>
                <p class="lead text-muted">Kami menyediakan kemudahan dan kecepatan dalam mengakses informasi.</p>
            </div>
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="feature-icon mb-3"><i class="fas fa-bolt"></i></div>
                    <h4 class="fw-bold">Informasi Cepat & Akurat</h4>
                    <p class="text-muted">Didukung oleh AI terkini untuk memberikan jawaban yang relevan dan terpercaya
                        dari sumber resmi keimigrasian.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-icon mb-3"><i class="fas fa-clock"></i></div>
                    <h4 class="fw-bold">Tersedia 24/7</h4>
                    <p class="text-muted">Butuh informasi di tengah malam? ImmiBot selalu online untuk membantu Anda
                        kapan saja, di mana saja.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-icon mb-3"><i class="fas fa-comments"></i></div>
                    <h4 class="fw-bold">Bahasa yang Mudah Dipahami</h4>
                    <p class="text-muted">Tidak perlu bingung dengan istilah hukum yang rumit. ImmiBot menjelaskan
                        semuanya dengan bahasa yang sederhana.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Apa Kata Mereka?</h2>
                <p class="lead text-muted">Lihat bagaimana ImmiBot telah membantu pengguna lain.</p>
            </div>
            <div class="row">
                <!-- Testimonial 1 -->
                <div class="col-lg-4 mb-5 d-flex align-items-stretch">
                    <div class="card testimonial-card w-100">
                        <div class="card-body text-center p-4 d-flex flex-column">
                            <img src="https://i.pravatar.cc/150?img=12" alt="User Avatar"
                                class="testimonial-avatar rounded-circle mb-3 align-self-center">
                            <div class="stars mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="card-text fst-italic flex-grow-1">"Sangat membantu! Saya bisa mendapatkan
                                informasi tentang perpanjangan KITAS dengan cepat tanpa harus datang ke kantor imigrasi.
                                Jawabannya jelas dan mudah dimengerti."</p>
                            <footer class="mt-4">
                                <h5 class="fw-bold mb-0">Andi Wijaya</h5>
                                <p class="text-muted">Mahasiswa Internasional</p>
                            </footer>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 2 -->
                <div class="col-lg-4 mb-5 d-flex align-items-stretch">
                    <div class="card testimonial-card w-100">
                        <div class="card-body text-center p-4 d-flex flex-column">
                            <img src="https://i.pravatar.cc/150?img=45" alt="User Avatar"
                                class="testimonial-avatar rounded-circle mb-3 align-self-center">
                            <div class="stars mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <p class="card-text fst-italic flex-grow-1">"Aplikasi ini adalah penyelamat. Saya bingung
                                dengan prosedur pembuatan paspor untuk anak saya, dan ImmiBot memberikan panduan langkah
                                demi langkah yang sangat akurat."</p>
                            <footer class="mt-4">
                                <h5 class="fw-bold mb-0">Sarah Putri</h5>
                                <p class="text-muted">Ibu Rumah Tangga</p>
                            </footer>
                        </div>
                    </div>
                </div>
                <!-- Testimonial 3 -->
                <div class="col-lg-4 mb-5 d-flex align-items-stretch">
                    <div class="card testimonial-card w-100">
                        <div class="card-body text-center p-4 d-flex flex-column">
                            <img src="https://i.pravatar.cc/150?img=32" alt="User Avatar"
                                class="testimonial-avatar rounded-circle mb-3 align-self-center">
                            <div class="stars mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="card-text fst-italic flex-grow-1">"Sebagai ekspatriat, mengurus dokumen bisa
                                sangat membingungkan. ImmiBot menjawab semua pertanyaan saya tentang visa kerja. Highly
                                recommended!"</p>
                            <footer class="mt-4">
                                <h5 class="fw-bold mb-0">John Smith</h5>
                                <p class="text-muted">Pekerja Asing</p>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="features-section"> <!-- ID ini digunakan untuk styling khusus -->
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">FAQ</h2>
                <p class="lead text-muted">Temukan jawaban cepat untuk pertanyaan umum tentang ImmiBot.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <!-- FAQ Item 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Apa itu ImmiBot?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    ImmiBot adalah asisten virtual berbasis kecerdasan buatan (AI) yang dirancang khusus
                                    untuk memberikan informasi seputar layanan keimigrasian di Indonesia. Tujuannya
                                    adalah untuk mempermudah masyarakat mendapatkan informasi yang akurat dan cepat,
                                    kapan saja dan di mana saja.
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Informasi apa saja yang bisa saya dapatkan?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Anda bisa bertanya tentang berbagai hal, seperti prosedur pembuatan dan perpanjangan
                                    paspor, jenis-jenis visa dan izin tinggal (KITAS/KITAP), syarat dokumen, biaya
                                    layanan, hingga lokasi kantor imigrasi.
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item 3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Apakah informasi dari ImmiBot akurat?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Ya, ImmiBot dilatih menggunakan data dan informasi dari sumber-sumber resmi
                                    Direktorat Jenderal Imigrasi. Namun, untuk kasus yang sangat spesifik, kami tetap
                                    menyarankan untuk melakukan verifikasi ke kantor imigrasi terdekat atau menghubungi
                                    CS kami.
                                </div>
                            </div>
                        </div>
                        <!-- FAQ Item 4 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Bagaimana jika ImmiBot tidak bisa menjawab pertanyaan saya?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Jika ImmiBot tidak dapat memberikan jawaban yang memuaskan, Anda akan diberikan opsi
                                    untuk terhubung langsung dengan Customer Service (CS) kami yang siap membantu Anda
                                    pada jam kerja.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section id="cta" class="cta-section text-center">
        <div class="container">
            <h2 class="fw-bold">Siap untuk Memulai?</h2>
            <p class="lead my-3">Daftar sekarang dan rasakan kemudahan mendapatkan informasi keimigrasian di ujung jari
                Anda.</p>
            <a href="{{ route('register') }}" class="btn btn-success btn-lg">Buat Akun Gratis</a>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="footer pt-5 pb-4">
        <div class="container text-center text-md-start">
            <div class="row ">

                <!-- Alamat Kantor -->
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4">
                    <!-- Logo -->
                    <img src="images/image.png" alt="Logo Kantor"
                        style="width: 400px; height: auto; margin-bottom: 20px;">

                    <h6 class="text-uppercase fw-bold mb-3">Alamat Kantor</h6>
                    <p>
                        <a href="https://maps.app.goo.gl/D6S7NEXDbh1368YP8" target="_blank" rel="noopener noreferrer">
                            <i class="fas fa-map-marker-alt me-2"></i>Jl. A. Yani No.19, Tanah Sareal, Kec. Tanah Sareal, Kota Bogor, Jawa Barat 16161
                        </a>
                    </p>
                </div>

                <!-- Kontak & Jam Pelayanan -->
                <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-3">Kontak & Jam Pelayanan</h6>
                    <p>
                        <a href="tel:+622518383275"><i class="fas fa-phone me-2"></i>(0251) 8383275</a>
                    </p>
                    <p>
                        <a href="https://wa.me/628111195959" target="_blank" rel="noopener noreferrer"><i class="fab fa-whatsapp me-2"></i>+62 811-1195-959</a>
                    </p>
                    <p>
                        <a href="mailto:kanim.bogor@kemenkumham.go.id"><i class="fas fa-envelope me-2"></i>kanim.bogor@kemenkumham.go.id</a>
                    </p>
                    <hr class="my-2">
                    <p><i class="fas fa-clock me-2"></i>Senin-Jumat: 08.00 - 15.00 WIB</p>
                </div>

                <!-- Media Sosial -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <h6 class="text-uppercase fw-bold mb-3">Media Sosial</h6>
                    <p>Ikuti kami untuk informasi terbaru.</p>
                    <div class="social-icons">
                        <a href="https://web.facebook.com/imigrasibogor/" class="text-white me-3 fs-4"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/ImigrasiBogor" class="text-white me-3 fs-4"><i
                                class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/imigrasibogor/" class="text-white me-3 fs-4"><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://www.youtube.com/@KanimBogor" class="text-white fs-4"><i
                                class="fab fa-youtube"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <!-- Copyright -->
        <div class="text-center p-3 mt-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2025 ImmiBot. All rights reserved.
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>