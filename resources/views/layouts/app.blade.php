<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Gema.ba - Saloni odjeće i obuće</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{asset('public/frontend/images/logo/favicon.ico') }}">
    <!-- Place favicon.ico in the root directory -->
    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css') }}">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/core.css') }}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/shortcode/shortcodes.css') }}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{ asset('public/frontend/style.css') }}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/responsive.css') }}">
    <!-- User style -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/color/skin-default.css') }}">
    
    <!-- Modernizr JS -->
    <script src="{{ asset('public/frontend/js/vendor/modernizr-2.8.3.min.js') }}"></script>
     <!-- Chart CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="{{ asset('public/frontend/sweetalert2.min.css') }}">

</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper home-one">
       
        <!-- Start of header area -->
        <header class="header-area header-wrapper">
            <div class="header-top-bar black-bg clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            @guest
                            <div class="login-register-area">
                                <ul>
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                    <li><a href="{{ route('login') }}">Registracija</a></li>
                                </ul>
                            </div>
                            @else
                            <div class="login-register-area">
                                <ul>
                                    <li><a href="{{ route('home') }}">Profil</a></li>
                                    <li><a href="{{route('user.logout')}}">Logout</a></li>

                                </ul>
                            </div>
                            @endguest
                        </div>
                        <div class="col-md-6 col-sm-6 hidden-xs">
                            <div class="social-search-area text-center">
                                <div class="social-icon socile-icon-style-2">
                                    <ul>
                                        <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a> </li>
                                        <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a> </li>
                                        <li> <a href="#" title="dribble"><i class="fa fa-dribbble"></i></a></li>
                                        <li> <a href="#" title="behance"><i class="fa fa-behance"></i></a> </li>
                                        <li> <a href="#" title="rss"><i class="fa fa-rss"></i></a> </li>
                                    </ul>
                                 </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                                    <li>
                                        <div class="header-cart">
                                            <div class="cart-icon"> <a href="{{ route('show.cart') }}">Korpa<i class="zmdi zmdi-shopping-cart"></i></a> <span style="margin-left: 15px;">{{ Cart::count() }}</span> </div>
                                            <div class="cart-content-wraper">
                                                <div class="cart-single-wraper">
                                                    <div class="cart-img">
                                                        <a href="#"><img src="#" alt=""></a>
                                                    </div>
                                                    <div class="cart-content">
                                                        <div class="cart-name"> <a href="#"></a> </div>
                                                        <div class="cart-price"> </div>
                                                        <div class="cart-qty"> Količina: <span></span> </div>
                                                    </div>
                                                    <div class="remove"> <a href="#"><i class="zmdi zmdi-close"></i></a> </div>
                                                </div>
                                                <div class="cart-subtotal"> Ukupno: <span>{{ Cart::subtotal() }} KM</span> </div>
                                                <div class="cart-check-btn">
                                                    <div class="view-cart"> <a class="btn-def" href="{{ route('show.cart') }}">Pogledaj</a> </div>
                                                    <div class="check-btn"> <a class="btn-def" href="checkout.html">Naruči</a> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header"  class="header-middle-area">
                <div class="container">
                    <div class="full-width-mega-dropdown">
                        <div class="row">
                            <div class="col-md-2 col-sm-2">
                                <div class="logo ptb-20"><a href="{{ url('/') }}"> 
									<img src="{{ asset('public/frontend/images/logo/logo.png')}}" alt="main logo"></a>
								</div>
                            </div>
                            <div class="col-md-7 col-sm-10 hidden-xs">
                                <nav id="primary-menu">
                                    <ul class="main-menu">
                                        <li class="current"><a class="active" href="{{ url('/') }}">Početna</a>
                                        </li>
                                        <li class="mega-parent pos-rltv"><a href="#">Muškarci</a>
                                            <div class="mega-menu-area mma-800">
                                                <ul class="single-mega-item">
                                                   <li class="menu-title uppercase">Shirts</li>
                                                    <li><a href="#">Shirt 01</a></li>
                                                    <li><a href="#">Shirt 02</a></li>
                                                    <li><a href="#">Shirt 03</a></li>
                                                    <li><a href="#">Shirt 04</a></li>
                                                </ul>
                                                <ul class="single-mega-item">
                                                   <li class="menu-title uppercase">Pants</li>
                                                    <li><a href="#">Pant 01</a></li>
                                                    <li><a href="#">Pant 02</a></li>
                                                    <li><a href="#">Pant 03</a></li>
                                                    <li><a href="#">Pant 04</a></li>
                                                </ul>
                                                <ul class="single-mega-item">
                                                   <li class="menu-title uppercase">T-Shirts</li>
                                                    <li><a href="#">T-Shirt 01</a></li>
                                                    <li><a href="#">T-Shirt 02</a></li>
                                                    <li><a href="#">T-Shirt 03</a></li>
                                                    <li><a href="#">T-Shirt 04</a></li>
                                                </ul>
                                                <div class="mega-banner-img">
                                                    <a href="#"><img src="{{ asset('public/frontend/images/banner/banner-fashion-02.jpg') }}" alt=""></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="mega-parent pos-rltv"><a href="#">Žene</a>
                                            <div class="mega-menu-area mma-700">
                                                <ul class="single-mega-item">
                                                   <li class="menu-title uppercase">Sharees</li>
                                                    <li><a href="#">Sharee 01</a></li>
                                                    <li><a href="#">Sharee 02</a></li>
                                                    <li><a href="#">Sharee 03</a></li>
                                                    <li><a href="#">Sharee 04</a></li>
                                                    <li><a href="#">Sharee 05</a></li>
                                                </ul>
                                                <ul class="single-mega-item">
                                                   <li class="menu-title uppercase">Lahenga</li>
                                                    <li><a href="#">Lahenga 01</a></li>
                                                    <li><a href="#">Lahenga 02</a></li>
                                                    <li><a href="#">Lahenga 03</a></li>
                                                    <li><a href="#">Lahenga 04</a></li>
                                                    <li><a href="#">Lahenga 05</a></li>
                                                </ul>
                                                <ul class="single-mega-item">
                                                   <li class="menu-title uppercase">Sandels</li>
                                                    <li><a href="#">Sandel 01</a></li>
                                                    <li><a href="#">Sandel 02</a></li>
                                                    <li><a href="#">Sandel 03</a></li>
                                                    <li><a href="#">Sandel 04</a></li>
                                                    <li><a href="#">Sandel 05</a></li>
                                                </ul>
                                                <div class="mega-banner-img">
                                                    <a href="#"><img src="images/banner/banner-fashion.jpg" alt=""></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li><a href="#">VIJESTI</a></li>

                                        <li><a href="#">O NAMA</a></li>
                                        <li><a href="#">KONTAKT</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="col-md-3 hidden-sm hidden-xs">
                                <div class="search-box global-table">
                                    <div class="global-row">
                                        <div class="global-cell">
                                            <form action="#">
                                                <div class="input-box">
                                                    <input class="single-input" placeholder="Pretraži Proizvode" type="text">
                                                    <button class="src-btn"><i class="fa fa-search"></i></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End of header area -->

@yield('content')
        <!-- footer area start-->
        <div class="footer-area ptb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="single-footer contact-us">
                            <div class="footer-title uppercase">
                                <h5>Kontakt</h5> </div>
                            <ul>
                                <li>
                                    <div class="contact-icon"> <i class="zmdi zmdi-pin-drop"></i> </div>
                                    <div class="contact-text">
                                        <p><span>Ferhadija 28, Sarajevo</span> <span>Bosna i Hercegovina</span></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact-icon"> <i class="zmdi zmdi-email-open"></i> </div>
                                    <div class="contact-text">
                                        <p><span><a href="#">company@gmail.com</a></span><br> <span><a href="#">info@gema.ba</a></span></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact-icon"> <i class="zmdi zmdi-phone-paused"></i> </div>
                                    <div class="contact-text">
                                        <p><span>033 500 500</span> <br> <span>033 550 550</span></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        <div class="single-footer informaton-area">
                            <div class="footer-title uppercase">
                                <h5>Informacije</h5> </div>
                            <div class="informatoin">
                                <ul>
                                    <li><a href="#">Moj Račun</a></li>
                                    <li><a href="#">Narudžbe</a></li>
                                    <li><a href="#">Lista Želja</a></li>
                                    <li><a href="#">Povrat</a></li>
                                    <li><a href="#">Najčešća pitanja</a></li>
                                    <li><a href="#">Kontakt</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 hidden-sm col-xs-12">
                        <div class="single-footer instagrm-area">
                            <div class="footer-title uppercase">
                                <h5>InstaGram</h5> 
                            </div>
                            <div class="instagrm">
                                <ul>
                                    <li><a href="#"><img src="{{ asset('public/frontend/images/gallery/01.jpg') }}" alt=""></a></li>
                                    <li><a href="#"><img src="{{ asset('public/frontend/images/gallery/02.jpg') }}" alt=""></a></li>
                                    <li><a href="#"><img src="{{ asset('public/frontend/images/gallery/03.jpg') }}" alt=""></a></li>
                                    <li><a href="#"><img src="{{ asset('public/frontend/images/gallery/04.jpg') }}" alt=""></a></li>
                                    <li><a href="#"><img src="{{ asset('public/frontend/images/gallery/05.jpg') }}" alt=""></a></li>
                                    <li><a href="#"><img src="{{ asset('public/frontend/images/gallery/06.jpg') }}" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-lg-offset-1 col-xs-12">
                        <div class="single-footer newslatter-area">
                            <div class="footer-title uppercase">
                                <h5>Newsletter</h5> 
                            </div>
                            <div class="newslatter">
                            <form action="{{ route('store.newsletter') }}" method="post" class="newsletter_form">
                            @csrf
                            <div class="input-box pos-rltv">
                                <input type="email" class="newsletter_input" required="required" style="width: 70%;" placeholder="Unesi Email Adresu" name="email">
                                <a class="btn-def" type="submit">Pretplata</a>

                                    </div>
                                </form>
                                <div class="social-icon socile-icon-style-3 mt-40">
                                    <div class="footer-title uppercase">
                                        <h5>Društvene Mreže</h5> 
                                    </div>
                                    <ul>
                                        <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-linkedin"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-pinterest"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-google"></i></a></li>
                                        <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--footer area start-->
        
        <!--footer bottom area start-->
        <div class="footer-bottom global-table">
            <div class="global-row">
                <div class="global-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="copyrigth"> Copyright @ 
									<a href="https://rizvanovics.com">Rizvanovic Semir</a>. Sva prava zadržana.
								</div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <ul class="payment-support text-right">
                                    <li>
                                        <a href="#"><img src="{{ asset('public/frontend/images/icons/pay1.png') }}" alt="" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('public/frontend/images/icons/pay2.png') }}" alt="" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('public/frontend/images/icons/pay3.png') }}" alt="" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('public/frontend/images/icons/pay4.png') }}" alt="" /></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('public/frontend/images/icons/pay5.png') }}" alt="" /></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--footer bottom area end-->
        



    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="{{ asset('public/frontend/js/vendor/jquery-1.12.0.min.js')}}"></script>
    <!-- Bootstrap framework js -->
    <script src="{{ asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <!-- Slider js -->
    <script src="{{ asset('public/frontend/js/slider/jquery.nivo.slider.pack.js')}}"></script>
    <script src="{{ asset('public/frontend/js/slider/nivo-active.js')}}"></script>
    <!-- counterUp-->
    <script src="{{ asset('public/frontend/js/jquery.countdown.min.js')}}"></script>
    <!-- All js plugins included in this file. -->
    <script src="{{ asset('public/frontend/js/plugins.js')}}"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="{{ asset('public/frontend/js/main.js')}}"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{ asset('public/frontend/js/product_custom.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>


<script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        @endif
     </script>  

     <script>  
         $(document).on("click", "#delete", function(e){
             e.preventDefault();
             var link = $(this).attr("href");
                swal({
                  title: "Jeste sigurni da želite obrisati ?",
                  text: "Ako obrišete, nećete moći koristiti više.",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                       window.location.href = link;
                  } else {
                    swal("Niste obrisali.");
                  }
                });
            });
    </script>
<script src="{{ asset('public/frontend/styles/login.js')}}"></script>

</body>

</html>