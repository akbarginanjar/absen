@extends('layouts.member')

@section('js')
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>

    <script>
        axios.get('https://api.belajar.link/public/paket')
            .then(function(response) {
                var data = response;
                console.log('Data', data)
            })
            .catch(function(error) {
                console.log(error);
            });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".card_slider", {
            slidesPerView: 3,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
@endsection

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    @php
        use Illuminate\Support\Facades\Http;
        use App\Models\Tb_tentang;
        use App\Models\Tb_keuntungan;
        use App\Models\Tb_pertanyan;
        use App\Models\Produk;
        use App\Models\Tb_artikel;
        use Illuminate\Support\Carbon;
        
        $response = Http::get('https://api.belajar.link/public/paket');
        $data = json_decode($response);
        $paket = array_slice($data->data, 0, 4);
        
        $tentang = Tb_tentang::find(1);
        $keuntungan = Tb_keuntungan::find(1);
        $pertanyaan = Tb_pertanyan::all();
        $produk = Produk::all();
        $artikel = Tb_artikel::paginate(3);
    @endphp
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">

                    <h1 data-aos="fade-up"><strong>Tingkatkan efektivitas, efisiensi serta mimpi ANDA
                            dengan sentuhan
                            teknologi bersama kami.</strong>
                    </h1>
                    {{-- <h2 data-aos="fade-up" data-aos-delay="400">Belajar berkarya dan berprestasi bersama!</h2> --}}
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="https://drive.google.com/file/d/1JiW0GDVbgclvHbC1iyT6_j23C-u9Xl0B/view" target="_blank"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Cerita Kami</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('assets/frontend/assets/img/header.png') }}" class="" width="450"
                        alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->



    <div class="container py-5 mb-5">
        <section id="recent-blog-posts" class="recent-blog-posts">

            <div class="container" data-aos="fade-up">
                <header class="section-header">
                    <p>Artikel</p>
                </header>
                <div class="row">
                    @foreach ($artikel as $item)
                        <div class="col-lg-4 mt-3">
                            <div class="post-box">
                                <div class="post-img"><img src="{{ $item->gambar() }}" class=""
                                        style="width: 100%; height:200px; object-fit:cover;" alt="">
                                </div>
                                <h3 class="post-title">{{ $item->judul }}</h3>
                                <a href="/artikel/{{ $kategoriArtikel->slug }}/{{ $item->slug }}"
                                    class="readmore stretched-link"></a>
                                <span class="mt-auto" style="font-size: 13px; float:bottom;"><i
                                        class="bi bi-person me-1"></i>
                                    {{ $item->user->name }}
                                    <span class="" style="float: right">
                                        <i class="bi bi-clock me-1"></i><time
                                            datetime="2020-01-01">{{ Carbon::parse($item->created_at)->translatedFormat('d M Y') }}</time></span>
                                </span>
                                </span>
                            </div>
                            {{-- <div class="post-box">
                            <div class="post-img"><img src="{{ $item->cover() }}" style="width: 100%"
                                    alt="">
                            </div>
                            <h3 class="post-title">{{ $item->nama }}</h3>
                            <a href="artikel/{{ $item->slug }}"
                                class="readmore stretched-link mt-auto float-right"
                                style="float: right"><span>Lihat</span><i class="bi bi-arrow-right"></i></a>
                        </div> --}}
                        </div>
                    @endforeach
                </div>
            </div><br>
            <div class="container">
                <center>
                    {!! $artikel->links() !!}
                </center>
            </div>
        </section>
    </div>




    {{-- <main id="main">
        <!-- ======= About Section ======= -->
        <section id="about" class="about">

            <div class="container" data-aos="fade-up">
                <div class="row gx-0">

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="rounded shadow content" style="background: #205eee;">
                            <h1 class="text-white">{{ $tentang->judul }}</h1>
                            <h2 class="text-white"> {{ $tentang->teks }}</h2>
                            <h2> Belajar.Link sebuah platform untuk berbagi ilmu yang akan
                                memudahkan para penggunanya yang dapat diakses
                                oleh siapa saja, kapan saja, dimana saja.</h2>
                            <p>


                            </p>
                            <div class="text-center text-lg-start">
                                <a href="#"
                                    class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                                    <span>baca selengkapnya</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="{{ $tentang->gambar() }}" class="" style="margin-left: 20px;" width="450"
                            alt="">
                    </div>

                </div>
            </div>

        </section><!-- End About Section --> --}}






    <!-- ======= Counts Section ======= -->

    {{-- <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">
                <header class="section-header">

                    <p>List Materi Populer</p>
                </header>


                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext" style="color: #205eee;"></i>
                            <div>
                                <span>
                                    <h3>Matematika</h3>
                                </span>
                                <p></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
                            <div>
                                <span>
                                    <h3>UTBK</h3>
                                </span>
                                <p></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext" style="color: #f938a2;"></i>
                            <div>
                                <span>
                                    <h3>Bisnis</h3>
                                </span>
                                <p></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext" style="color: #06f077;"></i>
                            <div>
                                <span>
                                    <h3>Puisi</h3>
                                </span>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row gy-4" style="margin-top: 2%;">

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext" style="color: #b7f7f9;"></i>
                            <div>
                                <span>
                                    <h3>Bahasa Arab</h3>
                                </span>
                                <p></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext" style="color: #8e776a;"></i>
                            <div>
                                <span>
                                    <h3>Kimia</h3>
                                </span>
                                <p></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext" style="color: #df7676;"></i>
                            <div>
                                <span>
                                    <h3>IT</h3>
                                </span>
                                <p></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext" style="color: ##31d71b;"></i>
                            <div>
                                <span>
                                    <h3>Bahasa korea</h3>
                                </span>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section> --}}
    <!-- End Counts Section -->

    <!-- ======= Features Section ======= -->
    {{-- <section id="features" class="features">

            <div class="container" data-aos="fade-up">

                <header class="section-header">

                    <p>Keuntungan Berlangganan</p>
                </header>

                <div class="row">

                    <div class="col-lg-6">
                        <img src="{{ $keuntungan->gambar() }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
                        <div class="row align-self-center gy-4">

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>{{ $keuntungan->teks1 }}</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>{{ $keuntungan->teks2 }}</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>{{ $keuntungan->teks3 }}</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Game Pembelajaran</h3>
                                    <h3>{{ $keuntungan->teks4 }}</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>{{ $keuntungan->teks5 }}</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>{{ $keuntungan->teks6 }}</h3>
                                </div>
                            </div>

                        </div>
                    </div>

                </div> <!-- / row -->

            </div>

        </section> --}}
    <!-- End Features Section -->


    {{-- <section id="recent-blog-posts" class="recent-blog-posts">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Blog</h2>
                    <p>Produk Dan Layanan Kami</p>
                </header>

                <div class="row">
                    @foreach ($produk as $data_produk)
                        <div class="col-lg-4 mb-4">
                            <div class="post-box">
                                <div class=""><img src="{{ $data_produk->cover() }}"
                                        style="width: 100%; height: 150px; object-fit: cover;" class=""
                                        alt="">
                                </div>
                                <h3 class="post-title">{{ $data_produk->nama }}
                                </h3>
                                <div class="">{!! Str::limit($data_produk->deskripsi, 30) !!}</div>
                                <a href="/produk/{{ $data_produk->slug }}" class="readmore stretched-link mt-auto"
                                    style="margin-top: 50px;"><span>Lihat
                                        Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    @endforeach


                </div>

            </div>

        </section> --}}

    <!-- ======= Services Section ======= -->
    {{-- <section id="services" class="services">

            <div class="container" data-aos="fade-up">

                <header class="section-header">

                    <p>Pelayanan Belajar.Link</p>
                </header>

                <div class="row gy-4">

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Fleksibel</h3>
                            <p>memudahkanmu dalam mengakses pembelajaran</p>
                            <a href="#" class=""></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-box orange">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Sertifikat</h3>
                            <p>Mendapatkan sertifikat resmi untuk kamu</p>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-box #31d71b">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Interaktif</h3>
                            <p>Kamu akan mendapatkan pembelajaran melalui video Interaktif,game pembelajaran yang menarik
                                dan kuis yang dapat meningkatkan pembelajaranmu.</p>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-box red">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Tutor ahli</h3>
                            <p>Kamu akan mendapatkan tutor yang ahli dibidangnya sehingga dapat meningkatkan kemampuanmu.
                            </p>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-box purple">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Tanya pembelajaran</h3>
                            <p>Kamu dapat bertanya kepada tutormu materi-materi yang tidak kamu pahami</p>

                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="700">
                        <div class="service-box pink">
                            <i class="ri-discuss-line icon"></i>
                            <h3>Referensi ervariasi</h3>
                            <p>Kamu akan mendapatkan latihan soal,mendapatkan e-book, vidio pembelajaran,dan salindia
                                mengenai materi pembelajaran.</p>

                        </div>
                    </div>

                </div>

            </div>

        </section> --}}
    <!-- End Services Section -->

    <!-- ======= Pricing Section ======= -->
    {{-- <section id="pricing" class="pricing">

            <div class="container" data-aos="fade-up">

                <header class="section-header">

                    <p>Paket Pembelajaran</p>
                </header>

                <div class="row gy-4" data-aos="fade-left">

                    @foreach ($paket as $item)
                        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                            <div class="box">
                                <img src="{{ asset('images/belajar.jpeg') }}" class="img-fluid" alt="">
                                <div>
                                    <hr>
                                    <h4> <b> {{ $item->nama_paket }}</b></h3>
                                        <hr>
                                </div>
                                <h5>Keterangan:</h5>
                                <ul>
                                    <li>{!! html_entity_decode(Str::limit($item->deskripsi, 100)) !!}</li>
                                    <!-- <li>Nec feugiat nisl</li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <li>Nulla at volutpat dola</li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <li class="na">Pharetra massa</li>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <li class="na">Massa ultricies mi</li> -->
                                </ul>
                                <a href="https://app.belajar.link/paket/get-free/{{ $item->id }}" class="btn-buy">Coba
                                    Gratis</a>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

        </section> --}}
    <!-- End Pricing Section -->






    {{-- <section id="recent-blog-posts" class="recent-blog-posts">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Blog</h2>
                    <p>Recent posts form our Blog</p>
                </header>

                <div class="row">

                    <div class="col-lg-3">
                        <div class="post-box">
                            <div class="post-img"><img src="{{ asset('assets/frontend/assets/img/blog/blog-1.jpg') }}"
                                    class="img-fluid" alt=""></div>
                            <span class="post-date">Tue, September 15</span>
                            <h3 class="post-title">Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit
                            </h3>
                            <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="post-box">
                            <div class="post-img"><img src="{{ asset('assets/frontend/assets/img/blog/blog-2.jpg') }}"
                                    class="img-fluid" alt=""></div>
                            <span class="post-date">Fri, August 28</span>
                            <h3 class="post-title">Et repellendus molestiae qui est sed omnis voluptates magnam</h3>
                            <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="post-box">
                            <div class="post-img"><img src="{{ asset('assets/frontend/assets/img/blog/blog-3.jpg') }}"
                                    class="img-fluid" alt=""></div>
                            <span class="post-date">Mon, July 11</span>
                            <h3 class="post-title">Quia assumenda est et veritatis aut quae</h3>
                            <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="post-box">
                            <div class="post-img"><img src="{{ asset('assets/frontend/assets/img/blog/blog-3.jpg') }}"
                                    class="img-fluid" alt=""></div>
                            <span class="post-date">Mon, July 11</span>
                            <h3 class="post-title">Quia assumenda est et veritatis aut quae</h3>
                            <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i
                                    class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>

                </div>

            </div>

        </section> --}}
    <!-- End Recent Blog Posts Section -->










    <!-- ======= F.A.Q Section ======= -->
    {{-- <section id="faq" class="faq">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>F.A.Q</h2>
                    <p>Pertanyaan Yang Sering Ditanyakan</p>
                </header>

                <div class="row">
                    <div class="col-lg-6">
                        <!-- F.A.Q List 1-->
                        <div class="accordion accordion-flush" id="faqlist1">
                            @foreach ($pertanyaan as $item)
                                @if ($item->id <= 3)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#faq-content-{{ $item->id }}">
                                                {{ $item->pertanyaan }}
                                            </button>
                                        </h2>
                                        <div id="faq-content-{{ $item->id }}" class="accordion-collapse collapse"
                                            data-bs-parent="#faqlist1">
                                            <div class="accordion-body">
                                                {{ $item->jawaban }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-6">

                        <!-- F.A.Q List 2-->
                        <div class="accordion accordion-flush" id="faqlist2">
                            @foreach ($pertanyaan as $item)
                                @if ($item->id > 3)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#faq2-content-{{ $item->id }}">
                                                {{ $item->pertanyaan }}
                                            </button>
                                        </h2>
                                        <div id="faq2-content-{{ $item->id }}" class="accordion-collapse collapse"
                                            data-bs-parent="#faqlist2">
                                            <div class="accordion-body">
                                                {{ $item->jawaban }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>

                </div>

            </div>

        </section> --}}
    <!-- End F.A.Q Section -->







    <!-- ======= Portfolio Section ======= -->
    {{-- <section id="portfolio" class="portfolio">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Portfolio</h2>
                    <p>Check our latest work</p>
                </header>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-app">App</li>
                            <li data-filter=".filter-card">Card</li>
                            <li data-filter=".filter-web">Web</li>
                        </ul>
                    </div>
                </div>

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-1.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 1</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-1.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 1"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-2.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Web 3</h4>
                                <p>Web</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-2.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="Web 3"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-3.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 2</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-3.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 2"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-4.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Card 2</h4>
                                <p>Card</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-4.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="Card 2"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-5.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Web 2</h4>
                                <p>Web</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-5.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="Web 2"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-6.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>App 3</h4>
                                <p>App</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-6.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="App 3"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-7.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Card 1</h4>
                                <p>Card</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-7.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="Card 1"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-8.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Card 3</h4>
                                <p>Card</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-8.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="Card 3"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('assets/frontend/assets/img/portfolio/portfolio-9.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Web 3</h4>
                                <p>Web</p>
                                <div class="portfolio-links">
                                    <a href="{{ asset('assets/frontend/assets/img/portfolio/portfolio-9.jpg') }}"
                                        data-gallery="portfolioGallery" class="portfokio-lightbox" title="Web 3"><i
                                            class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section> --}}
    <!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
    {{-- <section id="testimonials" class="testimonials">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Testimonials</h2>
                    <p>What they are saying about us</p>
                </header>

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
                    <div class="swiper-wrapper">

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                    rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                    risus at semper.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="{{ asset('assets/frontend/assets/img/testimonials/testimonials-1.jpg') }}"
                                        class="testimonial-img" alt="">
                                    <h3>Saul Goodman</h3>
                                    <h4>Ceo &amp; Founder</h4>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                    cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                                    legam anim culpa.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="{{ asset('assets/frontend/assets/img/testimonials/testimonials-2.jpg') }}"
                                        class="testimonial-img" alt="">
                                    <h3>Sara Wilsson</h3>
                                    <h4>Designer</h4>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam
                                    duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="{{ asset('assets/frontend/assets/img/testimonials/testimonials-3.jpg') }}"
                                        class="testimonial-img" alt="">
                                    <h3>Jena Karlis</h3>
                                    <h4>Store Owner</h4>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat
                                    minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore
                                    labore illum veniam.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="{{ asset('assets/frontend/assets/img/testimonials/testimonials-4.jpg') }}"
                                        class="testimonial-img" alt="">
                                    <h3>Matt Brandon</h3>
                                    <h4>Freelancer</h4>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster
                                    veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam
                                    culpa fore nisi cillum quid.
                                </p>
                                <div class="profile mt-auto">
                                    <img src="{{ asset('assets/frontend/assets/img/testimonials/testimonials-5.jpg') }}"
                                        class="testimonial-img" alt="">
                                    <h3>John Larson</h3>
                                    <h4>Entrepreneur</h4>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section> --}}
    <!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    {{-- <section id="team" class="team">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Team</h2>
                    <p>Our hard working team</p>
                </header>

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('assets/frontend/assets/img/team/team-1.jpg') }}" class="img-fluid"
                                    alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Walter White</h4>
                                <span>Chief Executive Officer</span>
                                <p>Velit aut quia fugit et et. Dolorum ea voluptate vel tempore tenetur ipsa quae aut. Ipsum
                                    exercitationem iure minima enim corporis et voluptate.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('assets/frontend/assets/img/team/team-2.jpg') }}" class="img-fluid"
                                    alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Sarah Jhonson</h4>
                                <span>Product Manager</span>
                                <p>Quo esse repellendus quia id. Est eum et accusantium pariatur fugit nihil minima suscipit
                                    corporis. Voluptate sed quas reiciendis animi neque sapiente.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('assets/frontend/assets/img/team/team-3.jpg') }}" class="img-fluid"
                                    alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>William Anderson</h4>
                                <span>CTO</span>
                                <p>Vero omnis enim consequatur. Voluptas consectetur unde qui molestiae deserunt. Voluptates
                                    enim aut architecto porro aspernatur molestiae modi.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
                        <div class="member">
                            <div class="member-img">
                                <img src="{{ asset('assets/frontend/assets/img/team/team-4.jpg') }}" class="img-fluid"
                                    alt="">
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="member-info">
                                <h4>Amanda Jepson</h4>
                                <span>Accountant</span>
                                <p>Rerum voluptate non adipisci animi distinctio et deserunt amet voluptas. Quia aut aliquid
                                    doloremque ut possimus ipsum officia.</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section> --}}
    <!-- End Team Section -->

    <!-- ======= Clients Section ======= -->
    {{-- <section id="clients" class="clients">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Our Clients</h2>
                    <p>Temporibus omnis officia</p>
                </header>

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/frontend/assets/img/clients/client-1.png') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/frontend/assets/img/clients/client-2.png') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/frontend/assets/img/clients/client-3.png') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/frontend/assets/img/clients/client-4.png') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/frontend/assets/img/clients/client-5.png') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/frontend/assets/img/clients/client-6.png') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/frontend/assets/img/clients/client-7.png') }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/frontend/assets/img/clients/client-8.png') }}" class="img-fluid"
                                alt=""></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

        </section> --}}
    <!-- End Clients Section -->

    <!-- ======= Recent Blog Posts Section ======= -->

    <!-- ======= Contact Section ======= -->
    {{-- <section id="contact" class="contact">

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
                                    <h3>Address</h3>
                                    <p>Bahagia Permai Raya<br>Buah Batu</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Telepone</h3>
                                    <p>+62 **** **** **<br>+62 **** **** **</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email Us</h3>
                                    <p>Belajar.Link@gmail.com<br></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-clock"></i>
                                    <!-- <h3>Open Hours</h3>
                                                              <p>Monday - Friday<br>9:00AM - 05:00PM</p> -->
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6">
                        <form action="forms/contact.php" method="post" class="php-email-form">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name"
                                        required>
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit">Send Message</button>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>

            </div>

        </section> --}}
    <!-- End Contact Section -->

    </main><!-- End #main -->
@endsection
