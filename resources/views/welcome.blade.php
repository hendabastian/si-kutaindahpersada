<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{$title}}</title>
    <link rel="icon" type="image/x-icon" href="/landingpage/assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet"
          type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('landingpage/css/styles.css')}}" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Kuta Indah Persada</a><button
                    class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">Menu<i class="fas fa-bars ml-1"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Info & Brosur</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Tentang Kami</a></li>
                    @guest
                    <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Login</a>
                        @else
                    <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Home |
                            {{Auth::user()->getRole->deskripsi}}</a>
                        @endguest
                    </li>
                    {{-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li> --}}
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Selamat Datang</div>
            <div class="masthead-heading text-uppercase">PT. KUTA INDAH PERSADA</div>
            <a class="btn btn-primary text-uppercase js-scroll-trigger" href="#services">Selengkapnya</a>
        </div>
    </header>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Layanan</h2>
                <h3 class="section-subheading text-muted">Kami merupakan perusahaan swasta yang bergerak dibidang
                    General
                    Kontraktor, khususnya dalam proyek pembangunan dari Rumah Tinggal, Pabrik, Jembatan, Apartemen,
                    Gedung Bertingkat serta Infrastruktur lainnya.</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-6">
                    <span class="fa-stack fa-4x"><i class="fas fa-circle fa-stack-2x text-primary"></i><i
                           class="fas fa-pencil-ruler fa-stack-1x fa-inverse"></i></span>
                    <h4 class="my-3">Pembangunan</h4>
                    <p class="text-muted">Bidang arsitektur (interior, desain rumah, siteplan perumahan, ruko, semi
                        apartemen,dll), analisa & engineering (hitung
                        RAB dan managemen proyek).</p>
                </div>
                <div class="col-md-6">
                    <span class="fa-stack fa-4x"><i class="fas fa-circle fa-stack-2x text-primary"></i><i
                           class="fas fa-wrench fa-stack-1x fa-inverse"></i></span>
                    <h4 class="my-3">Perbaikan</h4>
                    <p class="text-muted">Perawatan berkala & rutin (perbaikan dan pengecatan dinding, perbaikan atap,
                        perbaikan saluran/plumbing)</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Brosur</h2>
                <h3 class="section-subheading text-muted">Berikut adalah hasil kerja kami.</h3>
            </div>
            <div class="row">
                @foreach ($brosur as $index => $itemBrosur)
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-toggle="modal" href="#portfolioModal{{$index}}">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            @if (isset($itemBrosur->detailBrosur->first()->file))
                            <img src="{{asset('uploads/' . $itemBrosur->detailBrosur->first()->file)}}"
                                 style="width: 100%;">
                            @else
                            <h4>TIdak ada Gambar</h4>
                            @endif

                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">{{$itemBrosur->judul}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Informasi Pembangunan Rumah</h2>
                <h3 class="section-subheading text-muted">Berikut adalah informasi pembangunan rumah di perusahaan kami.
                </h3>
            </div>
            <div class="row">
                @foreach ($infoPembangunan as $index => $itemInfo)
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-toggle="modal" href="#infoModal{{$index}}">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img src="{{asset('uploads/' . $itemInfo->file)}}"
                                 style="width: 100%;">
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">{{$itemInfo->judul}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-left">
                <h2 class="section-heading text-uppercase">Tentang Kami</h2>
                <h3 class="section-subheading text-muted">
                    <p>
                        PT. Kuta Indah Persada telah didirikan sejak tahun 2009 oleh
                        Heber Sembiring, ST selaku direktur dalam perusahaan ini. PT. Kuta Indah Persada berlokasi
                        dijalan
                        Ciawi Tali No.23A Citereup, Cimahi Jawa Barat.
                    </p>
                    <p>
                        Sebagai perusahan yang beregerak dibidang General Kontraktor, perusahaan ini telah menyelesaikan
                        ratusan proyek pembangunan Rumah Tinggal, Pabrik, Jembatan, Apartemen, Gedung Bertingkat, dan
                        Infrastruktur lainnya.
                    </p>
                    <p>
                        PT. Kuta Indah Persada lahir di Tanah Padjajaran bukan karena pangsa pasar yang besar ataupun
                        kebutuhan masyarakat terus bertumbuh akan tetapi berawal dari SEMANGAT PELAYANAN KEPADA KONSUMEN
                        khususnya masyarakat ataupun pemerintah yang membutuhkan Keterjaminan Mutu, dan Kualitas dalam
                        pembangunan.
                    </p>
                    <p>
                        Kejujuran dan kerja sama adalah modal perusahaan untuk memenuhi keinginan partner
                        dengan mengutamakan kenginginan pelanggan tentunya untuk setiap bagiannya.
                        Perusahaan berusaha untuk menciptakan loyalitas konsumennya melalui pelayanan terbaik yang
                        diberikan.
                    </p>
                    <p>
                        Terciptanya loyalitas memberikan beberapa manfaat, diantaranya hubungan antara perusahaan
                        dengan pelanggannya menjadi harmonis, memberikan dasar yang baik bagi pembelian ulang, dan
                        membentuk
                        suatu rekomendasi dari mulut ke mulut ( word of mouth ) yang dapat menguntungkan bagi
                        perusahaan.
                    </p>
                </h3>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-left">Copyright © PT. Kuta Indah Persada - 2020</div>
            </div>
        </div>
    </footer>
    <!-- Portfolio Modals-->
    @foreach ($brosur as $index => $itemBrosur)
    <div class="portfolio-modal modal fade" id="portfolioModal{{$index}}" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal"><img
                         src="{{asset('/landingpage/assets/img/close-icon.svg')}}"
                         alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project Details Go Here-->
                                <h2 class="text-uppercase">{{$itemBrosur->judul}}</h2>
                                @if (isset($itemBrosur->detailBrosur->first()->file))
                                    @foreach ($itemBrosur->detailBrosur as $detailBrosur)
                                    <img src="{{asset('uploads/' . $detailBrosur->file)}}"
                                        style="width: 100%;">
                                    @endforeach
                                @else
                                <h4>TIdak ada Gambar</h4>
                                @endif
                                <table class="table">
                                    <tr>
                                        <th>Model</th>
                                        <td>{{$itemBrosur->model}}</td>
                                    </tr>
                                    <tr>
                                        <th>Tipe</th>
                                        <td>{{$itemBrosur->tipe}}</td>
                                    </tr>
                                    <tr>
                                        <th>Harga</th>
                                        <td>Rp. {{number_format($itemBrosur->harga)}}</td>
                                    </tr>
                                    <tr>
                                        <th>Lama Pembangunan</th>
                                        <td>{{$itemBrosur->lama_pembangunan}} Bulan</td>
                                    </tr>
                                    <tr>
                                        <th>Luas Tanah</th>
                                        <td>{{$itemBrosur->luas_tanah}} m&#178;</td>
                                    </tr>
                                    <tr>
                                        <th>Luas Bangunan</th>
                                        <td>{{$itemBrosur->luas_bangunan}} m&#178;</td>
                                    </tr>
                                </table>
                                <h4>Deskripsi: </h4>
                                <p>{!! $itemBrosur->deskripsi !!}</p>

                                <h4>Jangkauan: </h4>
                                <p>{!!$itemBrosur->jangkauan!!}</p>
                                <ul class="list-inline">
                                    <li>Date: {{$itemBrosur->created_at}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($infoPembangunan as $index => $itemInfo)
    <div class="portfolio-modal modal fade" id="infoModal{{$index}}" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal"><img
                         src="{{asset('/landingpage/assets/img/close-icon.svg')}}"
                         alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project Details Go Here-->
                                <h2 class="text-uppercase">{{$itemInfo->judul}}</h2>
                                <img src="{{asset('uploads/' . $itemInfo->file)}}"
                                     style="width: 100%;">
                                <p>{!! $itemInfo->deskripsi !!}</p>
                                <ul class="list-inline">
                                    <li>Date: {{$itemInfo->created_at}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- Modal 1-->


    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    <script src="{{asset('landingpage/assets/mail/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('landingpage/assets/mail/contact_me.js')}}"></script>
    <!-- Core theme JS-->
    <script src="{{asset('landingpage/js/scripts.js')}}"></script>
</body>

</html>