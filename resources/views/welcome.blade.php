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
    <link href="landingpage/css/styles.css" rel="stylesheet" />
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
            {{-- <ul class="timeline">
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid"
                             src="/landingpage/assets/img/about/1.jpg" alt="" /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>2009-2011</h4>
                            <h4 class="subheading">Our Humble Beginnings</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero
                                unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid"
                             src="/landingpage/assets/img/about/2.jpg" alt="" /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>March 2011</h4>
                            <h4 class="subheading">An Agency is Born</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero
                                unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid"
                             src="/landingpage/assets/img/about/3.jpg" alt="" /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>December 2012</h4>
                            <h4 class="subheading">Transition to Full Service</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero
                                unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid"
                             src="/landingpage/assets/img/about/4.jpg" alt="" /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>July 2014</h4>
                            <h4 class="subheading">Phase Two Expansion</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut
                                voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero
                                unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>Be Part<br />Of Our<br />Story!</h4>
                    </div>
                </li>
            </ul> --}}
        </div>
    </section>
    <!-- Team-->
    {{-- <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="/landingpage/assets/img/team/1.jpg" alt="" />
                        <h4>Kay Garland</h4>
                        <p class="text-muted">Lead Designer</p>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a><a
                           class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a><a
                           class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="/landingpage/assets/img/team/2.jpg" alt="" />
                        <h4>Larry Parker</h4>
                        <p class="text-muted">Lead Marketer</p>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a><a
                           class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a><a
                           class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="/landingpage/assets/img/team/3.jpg" alt="" />
                        <h4>Diana Petersen</h4>
                        <p class="text-muted">Lead Developer</p>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a><a
                           class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a><a
                           class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque,
                        laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Clients-->
    {{-- <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid d-block mx-auto" src="/landingpage/assets/img/logos/envato.jpg"
                             alt="" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid d-block mx-auto"
                             src="/landingpage/assets/img/logos/designmodo.jpg" alt="" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid d-block mx-auto"
                             src="/landingpage/assets/img/logos/themeforest.jpg" alt="" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid d-block mx-auto"
                             src="/landingpage/assets/img/logos/creative-market.jpg" alt="" /></a>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Contact-->
    {{-- <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contact Us</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <form id="contactForm" name="sentMessage" novalidate="novalidate">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="name" type="text" placeholder="Your Name *"
                                   required="required" data-validation-required-message="Please enter your name." />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="email" type="email" placeholder="Your Email *"
                                   required="required"
                                   data-validation-required-message="Please enter your email address." />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group mb-md-0">
                            <input class="form-control" id="phone" type="tel" placeholder="Your Phone *"
                                   required="required"
                                   data-validation-required-message="Please enter your phone number." />
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <textarea class="form-control" id="message" placeholder="Your Message *" required="required"
                                      data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div id="success"></div>
                    <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Send
                        Message</button>
                </div>
            </form>
        </div>
    </section> --}}
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-left">Copyright © PT. Kuta Indah Persada - 2020</div>
                {{-- <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a><a
                       class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a><a
                       class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                </div> --}}
                {{-- <div class="col-lg-4 text-lg-right"><a class="mr-3" href="#!">Privacy Policy</a><a href="#!">Terms of
                        Use</a></div> --}}
            </div>
        </div>
    </footer>
    <!-- Portfolio Modals-->
    @foreach ($brosur as $index => $itemBrosur)
    <div class="portfolio-modal modal fade" id="portfolioModal{{$index}}" tabindex="-1" role="dialog"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal"><img src="/landingpage/assets/img/close-icon.svg"
                         alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project Details Go Here-->
                                <h2 class="text-uppercase">{{$itemBrosur->judul}}</h2>
                                @if (isset($itemBrosur->detailBrosur->first()->file))
                                <img src="{{asset('uploads/' . $itemBrosur->detailBrosur->first()->file)}}"
                                     style="width: 100%;">
                                @else
                                <h4>TIdak ada Gambar</h4>
                                @endif
                                <p>{!! $itemBrosur->deskripsi !!}</p>
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
                <div class="close-modal" data-dismiss="modal"><img src="/landingpage/assets/img/close-icon.svg"
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
    <script src="/landingpage/assets/mail/jqBootstrapValidation.js"></script>
    <script src="/landingpage/assets/mail/contact_me.js"></script>
    <!-- Core theme JS-->
    <script src="/landingpage/js/scripts.js"></script>
</body>

</html>