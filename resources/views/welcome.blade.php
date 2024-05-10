<!doctype html>
<html lang="en" style="scroll-behavior: smooth;">

<head>
    <title>PRM | Acceuil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="icon" href="{{ asset('assets/css/FAVICO1.ico') }}" type="image/gif" sizes="16x16">

    <link href="{{ asset('assets/fonts/icomoon/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-datepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/fonts/flaticon/font/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <!-- MAIN CSS -->

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


    <div class="site-wrap" id="home-section">

        <div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>



        <header class="site-navbar site-navbar-target" role="banner">

            <div class="container">
                <div class="row align-items-center position-relative">

                    <div class="col-3 ">
                        <div class="site-logo">
                        </div>
                    </div>

                    <div class="col-9 right" style="margin-left: 350px">
                        <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                            <ul class="site-menu main-menu js-clone-nav ml-auto">
                                <li><a href="/login" class="">
                                        <i class="zmdi zmdi-sign-in"></i> Connexion
                                    </a></li>
                            </ul>
                        </nav>
                    </div>


                </div>
            </div>

        </header>

        <div class="ftco-blocks-cover-1">
            <div class="site-section-cover overlay" data-stellar-background-ratio="0.5"
                style="background-image: url('{{ asset('assets/css/SLIDE.jpg') }}')">
                <div class="container">
                    <div class="row align-items-center justify-content-start text-left">
                        <div class="col-md-7">
                            <h1 class="mb-1">
                                <span>Bienvenue sur la plateforme <br> de recrutement <br>de mLouma</span>
                            </h1>
                            <p></p>
                            <p>
                                <a onclick="" href="#campain" class="btn btn-warning">Devenir mLoumer</a>
                                <a onclick="" href="{{ url('/resop') }}"
                                    class="btn btn-success text-light">PAM-RESOPP</a>
                                {{-- <a onclick="" href="{{ url('/admin') }}" class="btn btn-success text-light">Se
                                    connecter</a> --}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="campain" class="site-section">
            <div class="card-body col-md-12 d-flex justify-content-center">
                <div class="col-md-12 d-flex justify-content-center">
                    <!-- <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="img-years">
              <img src="images/img_1.jpg" alt="Image" class="img-fluid">
              <div class="year">
                <span>3 <span>years in <br>excellent service</span></span>
              </div>
            </div>

          </div>
           <div class="col-lg-5 ml-auto pl-lg-5 text-center">
            <h3 class="scissors text-center">Welcome To Barberz!</h3>
            <p class="mb-5 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure nesciunt nemo vel earum maxime neque!</p>
            <p><a href="#" class="btn btn-primary">Learn More</a></p>
          </div> -->
                    <div class="col-md-8">
                        <table class="table table-responsive mx-auto">
                            <thead>
                                <th>Campagnes en cours </th>
                                <th>Debut </th>
                                <th>Fin</th>
                                <th>En savoir plus</th>

                                <th> </th>

                            </thead>
                            <tbody>
                                @foreach ($campagnes as $campagne)
                                    <tr>
                                        <td>{{ $campagne->nom }}</td>
                                        <td>{{ date_format(new Datetime($campagne->date_debut), 'd-m-Y') }}</td>
                                        <td>{{ date_format(new Datetime($campagne->date_fin), 'd-m-Y') }}</td>
                                        <td><a class=" btn-link" href="{{ asset('assets/docs/' . $campagne->lien) }}"
                                                target="_blank">{{ $campagne->lien }}</a></td>
                                        <td><a href="{{ url('/candidature/' . $campagne->id) }}"
                                                class="btn btn-success">Postuler</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--
    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center  mb-5">
          <div class="col-md-7 text-center">
            <h3 class="scissors text-center">Services &amp; Pricing</h3>
            <p class="mb-5 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure nesciunt nemo vel earum maxime neque!</p>

            <p class="text-center">
              <a href="#" class="btn btn-primary custom-prev">Prev</a>
              <a href="#" class="btn btn-primary custom-next">Next</a>
            </p>
          </div>

        </div>
        <div class="row">
          <div class="col-12">

            <div class="nonloop-block-13 owl-carousel d-flex">

              <div class="item-1 h">
                <img src="images/img_1.jpg" alt="Image" class="img-fluid">
                <div class="item-1-contents">
                  <h3>Haircut</h3>
                  <ul>
                    <li class="d-flex"><span>Men's Cut</span> <span class="price ml-auto">$29.00</span></li>
                    <li class="d-flex"><span>Men's Cut with Shampoo and Blow Dry</span><span class="price ml-auto">$10.00</span></li>
                    <li class="d-flex"><span>Ladie's Cut with Shampoo and Blow Dry</span><span class="price ml-auto">$32.00</span></li>
                    <li class="d-flex"><span>Head Shave</span><span class="price ml-auto">$23.00</span></li>
                    <li class="d-flex"><span>Hair Art</span><span class="price ml-auto">$54.00</span></li>
                  </ul>
                </div>

              </div>

              <div class="item-1 h">
                <img src="images/img_2.jpg" alt="Image" class="img-fluid">
                <div class="item-1-contents">
                  <h3>Hair Styling</h3>
                  <ul>
                    <li class="d-flex"><span>Shampoo</span> <span class="price ml-auto">$29.00</span></li>
                    <li class="d-flex"><span>Blow Dry</span><span class="price ml-auto">$10.00</span></li>
                    <li class="d-flex"><span>Iron</span><span class="price ml-auto">$32.00</span></li>
                    <li class="d-flex"><span>Brazilian Blow Out</span><span class="price ml-auto">$23.00</span></li>
                    <li class="d-flex"><span>Hair Art</span><span class="price ml-auto">$54.00</span></li>
                  </ul>
                </div>

              </div>

              <div class="item-1 h">
                <img src="images/img_3.jpg" alt="Image" class="img-fluid">
                <div class="item-1-contents">
                  <h3>Hair Scalp Care</h3>
                  <ul>
                    <li class="d-flex"><span>Shampoo</span> <span class="price ml-auto">$29.00</span></li>
                    <li class="d-flex"><span>Blow Dry</span><span class="price ml-auto">$10.00</span></li>
                    <li class="d-flex"><span>Iron</span><span class="price ml-auto">$32.00</span></li>
                    <li class="d-flex"><span>Brazilian Blow Out</span><span class="price ml-auto">$23.00</span></li>
                    <li class="d-flex"><span>Hair Art</span><span class="price ml-auto">$54.00</span></li>
                  </ul>
                </div>

              </div>

            </div>

          </div>
        </div>
      </div>
    </div> -->


        <!-- <div class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <h3 class="scissors text-center">More Hair Styles</h3>
            <p class="mb-5 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure nesciunt nemo vel earum maxime neque!</p>
          </div>
        </div>
        <div class="row hair-style">
          <div class="col-lg-4 col-md-4 col-sm-6 col-12">
            <a href="#" class="place">
              <img src="images/img_1.jpg" alt="Image placeholder">
              <h2>Beard Shaving</h2>
              <span>$50.00 only</span>
            </a>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6 col-12">
            <a href="#" class="place">
              <img src="images/img_2.jpg" alt="Image placeholder">
              <h2>Crew Cut</h2>
              <span>$50.00 only</span>
            </a>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6 col-12">
            <a href="#" class="place">
              <img src="images/img_3.jpg" alt="Image placeholder">
              <h2>Beard Trim</h2>
              <span>$50.00 only</span>
            </a>
          </div>

        </div>
      </div>
    </div> -->
        <!-- END section -->

        <!-- <div class="site-section section-3" data-stellar-background-ratio="0.5" style="background-image: url('images/hero_2.jpg');">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-7 text-center mb-5">
            <h2 class="text-white scissors primary-color-icon text-center">More Services</h2>
            <p class="lead text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam quo doloribus, suscipit libero, voluptate aliquam.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-bald"></span>
              </span>
              <div class="service-1-contents">
                <h3>Hair Cut</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-beard"></span>
              </span>
              <div class="service-1-contents">
                <h3>Facial &amp; Body Care</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-scissors"></span>
              </span>
              <div class="service-1-contents">
                <h3>Massages</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
              </div>
            </div>
          </div> -->

        <!-- <div class="col-lg-4 col-md-6 mb-4">
            <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-hair-spray"></span>
              </span>
              <div class="service-1-contents">
                <h3>Hair Cut</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-hair"></span>
              </span>
              <div class="service-1-contents">
                <h3>Facial &amp; Body Care</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="service-1">
              <span class="service-1-icon">
                <span class="flaticon-barber-shop"></span>
              </span>
              <div class="service-1-contents">
                <h3>Massages</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div> -->




        <!-- <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-7 text-center mb-5">
            <h2 class="scissors text-center">Our Top Client Says</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo assumenda, dolorum necessitatibus eius earum voluptates sed!</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <div class="d-flex v-card align-items-center mb-4">
                <img src="images/person_1.jpg" alt="Image" class="img-fluid mr-3">
                <span>Mike Fisher</span>
              </div>
              <blockquote>
                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam, voluptatum"</p>
              </blockquote>

            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <div class="d-flex v-card align-items-center mb-4">
                <img src="images/person_2.jpg" alt="Image" class="img-fluid mr-3">
                <span>Jean Stanley</span>
              </div>
              <blockquote>
                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam, voluptatum"</p>
              </blockquote>

            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <div class="d-flex v-card align-items-center mb-4">
                <img src="images/person_3.jpg" alt="Image" class="img-fluid mr-3">
                <span>Katie Rose</span>
              </div>
              <blockquote>
                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam. Ipsam, nam, voluptatum"</p>
              </blockquote>

            </div>
          </div>
        </div>
      </div>
    </div> -->


        <!-- <div class="site-section bg-white">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-7 text-center mb-5">
            <h2 class="scissors text-center">Our Blog</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo assumenda, dolorum necessitatibus eius earum voluptates sed!</p>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <a href="single.html">
                <img src="images/img_1.jpg" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">

                <h2><a href="single.html">Lorem ipsum dolor sit amet</a></h2>
                <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <a href="single.html">
                <img src="images/img_2.jpg" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">

                <h2><a href="single.html">Lorem ipsum dolor sit amet</a></h2>
                <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <a href="single.html">
                <img src="images/img_3.jpg" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">

                <h2><a href="single.html">Lorem ipsum dolor sit amet</a></h2>
                <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

        <!--
    <div class="site-section section-3" data-stellar-background-ratio="0.5" style="background-image: url('images/hero_1.jpg');">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-7 text-center mb-5">
            <h2 class="text-white scissors primary-color-icon text-center">Quality Haircut</h2>
            <p class="lead text-white mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam quo doloribus, suscipit libero, voluptate aliquam.</p>
            <p><a href="#" class="btn btn-primary">Contact Us Now</a></p>
          </div>
        </div>
      </div>
    </div> -->



        <footer class="site-footer">
            {{-- <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <img src="images/img_1.jpg" alt="Image" class="img-fluid mb-5">
            <h2 class="footer-heading mb-3">About Us</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
          </div>
          <div class="col-lg-8 ml-auto">
            <div class="row">
              <div class="col-lg-6 ml-auto">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <h2 class="footer-heading mb-4">Newsletter</h2>
                <form action="#" class="d-flex" class="subscribe">
                  <input type="text" class="form-control mr-3" placeholder="Email">
                  <input type="submit" value="Send" class="btn btn-primary">
                </form>
              </div>

            </div>
          </div>
        </div> --}}
            {{-- <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12"> --}}
            <div class="text-center ">
                <p>
                    Copyright <a href="http://www.mlouma.com" target="_blank">mLouma</a> &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script><br> <a target="_blank"
                        href="{{ asset('assets/docs/PolitiquesdeconfidentialitemLouma.pdf') }}">Conditions générales
                        d’utilisation</a> et <a target="_blank"
                        href="{{ asset('assets/docs/PolitiquesdeconfidentialitemLouma.pdf') }}">Règles de
                        confidentialités</a>
            </div>
            {{-- </div>

        </div> --}}
    </div>
    </footer>

    </div>
    <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        $("#campaign").click(
            function() {
                $("#campain").show();
            });
    </script>



    {{-- <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script> --}}

</body>

</html>
