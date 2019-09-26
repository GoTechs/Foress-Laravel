<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Foress -  Notre mission vous simplifier la vie </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jasny-bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/jasny-bootstrap.min.css')}}" type="text/css">
    <!-- Material CSS -->
    <link rel="stylesheet" href="{{asset('css/material-kit.css')}}" type="text/css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css">
    <!-- Line Icons CSS -->
    <link rel="stylesheet" href="{{asset('css/fonts/line-icons/line-icons.css')}}" type="text/css">
    <!-- Line Icons CSS -->
    <link rel="stylesheet" href="{{asset('css/fonts/line-icons/line-icons.css')}}" type="text/css">
    <!-- Main Styles -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('css/extras/animate.css')}}" type="text/css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('css/extras/owl.carousel.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/extras/owl.theme.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/extras/settings.css')}}" type="text/css">
    <!-- Responsive CSS Styles -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" type="text/css">
    <!-- Slicknav js -->
    <link rel="stylesheet" href="{{asset('css/slicknav.css')}}" type="text/css">
    <!-- Bootstrap Select -->
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">

</head>

<body>

<!-- Header Section Start -->
<div class="header">
    <nav class="navbar navbar-default main-navigation" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <!-- Stat Toggle Nav Link For Mobiles -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- End Toggle Nav Link For Mobiles -->
                <a class="navbar-brand logo" href="/"><img src="{{asset('img/Capture.PNG')}}" alt=""></a>
            </div>
            <!-- brand and toggle menu for mobile End -->

            <!-- Navbar Start -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    @auth
                        <li><a href="/home"><i class="fa fa-user"></i> {{Auth::user()->username}}</a></li>
                        <li><a href="/logout"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
                        <li class="postadd">
                            <a class="btn btn-danger btn-post" href="/addAd"><span class="fa fa-plus-circle"></span> Poster une Annonce</a>
                        </li>
                    @else
                        <li><a href="/connexion"><i class="fa fa-sign-in"></i> Connexion</a></li>
                        <li><a href="/inscription"><i class="fa fa-user"></i> Inscription</a></li>
                        <li class="postadd">
                            <a class="btn btn-danger btn-post" href="/connexion"><span class="fa fa-plus-circle"></span> Poster une Annonce</a>
                        </li>
                    @endauth
                </ul>
            </div>
            <!-- Navbar End -->
        </div>
    </nav>
    <!-- Off Canvas Navigation -->
    <div class="navmenu navmenu-default navmenu-fixed-left offcanvas">
        <!--- Off Canvas Side Menu -->
        <div class="close" data-toggle="offcanvas" data-target=".navmenu">
            <i class="fa fa-close"></i>
        </div>
        <h3 class="title-menu">Menu</h3>
        <ul class="nav navmenu-nav"> <!--- Menu -->
            <li><a href="/">Accueil</a></li>
            <li><a href="/Apropos">À Propos</a></li>
            <li><a href="/categorie">Catégorie</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="/faq">Faq</a></li>
        </ul><!--- End Menu -->
    </div> <!--- End Off Canvas Side Menu -->
    <div class="tbtn wow pulse" id="menu" data-wow-iteration="infinite" data-wow-duration="500ms" data-toggle="offcanvas" data-target=".navmenu">
        <p><i class="fa fa-file-text-o"></i> Menu</p>
    </div>
</div>
<!-- Header Section End -->

    @yield('content')

<!-- Footer Section Start -->
<footer>
    <!-- Footer Area Start -->
    <section class="footer-Content">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn">
                    <div class="widget">
                        <h3 class="block-title">à propos de <span style="color:#3188c2;">foress</span></h3>
                        <div class="textwidget">
                            <p>Lancé en 2017, l'idée était d'offrir aux gens une opportunité qui va leur faciliter la façon dont ils vendent, achètent et échangent des articles, des véhicules, des services, de l'immobilier ou du travail.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn">
                    <div class="widget">
                        <h3 class="block-title">Liens Utiles</h3>
                        <ul class="menu">
                            <li><a href="/">Accueil</a></li>
                            <li><a href="/contact">Contact</a></li>
                            <li><a href="/Apropos">À Propos</a></li>
                            <li><a href="/connexion">Connexion</a></li>
                            <li><a href="/categorie">Catégories</a></li>
                            <li><a href="/inscription">Inscription</a></li>
                            <li><a href="/faq">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn">
                    <div class="widget">
                        <h3 class="block-title">DERNIERS TWEETS</h3>
                        <div class="twitter-content clearfix">
                            <ul class="twitter-list">
                                <li class="clearfix">
                      <span>
                        Suivez nous sur le nouveau site d'annonce FORESS
                        <a href="#">http://t.co/cLo2w7rWOx</a>
                      </span>
                                </li>
                                <li class="clearfix">
                      <span>
                        Cherchez, Trouvez !
                        <a href="#">http://t.co/cLo2w7rWOx</a>
                      </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn">
                    <div class="widget">
                        <h3 class="block-title">récemment ajoutés</h3>
                        <ul class="featured-list">
                            @foreach($recentlyAdd as $recent)
                                <li>
                                    <img alt="" src="{{asset('img/nondisponible.jpg')}}">
                                    <div class="hover">
                                        <a href="/details/{{$recent->id}}"><i class="fa fa-eye views"> {{ $recent->numberViews}}</i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer area End -->

    <!-- Copyright Start  -->
    <div id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bottom-social-icons social-icon pull-right">
                        <a class="facebook" target="_blank" href=""><i class="fa fa-facebook"></i></a>
                        <a class="twitter" target="_blank" href=""><i class="fa fa-twitter"></i></a>
                        <a class="dribble" target="_blank" href=""><i class="fa fa-dribbble"></i></a>
                        <a class="flickr" target="_blank" href=""><i class="fa fa-flickr"></i></a>
                        <a class="youtube" target="_blank" href=""><i class="fa fa-youtube"></i></a>
                        <a class="google-plus" target="_blank" href=""><i class="fa fa-google-plus"></i></a>
                        <a class="linkedin" target="_blank" href=""><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

</footer>
<!-- Footer Section End -->

<!-- Go To Top Link -->
<a href="#" class="back-to-top">
    <i class="fa fa-angle-up"></i>
</a>

<!-- Main JS  -->
<script type="text/javascript" src="{{asset('js/jquery-min.js')}}"></script>
<script src="{{asset('https://code.jquery.com/ui/1.12.1/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/material.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/material-kit.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.parallax.js')}}"></script>
<script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/wow.js')}}"></script>
<script type="text/javascript" src="{{asset('js/main.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.counterup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/waypoints.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jasny-bootstrap.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('js/bootstrap-select.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>

<script type="text/javascript">

/* ******************************   AutoComplete Field Wilaya *************************************** */    
    
    $( function() {
        var wilaya = [
            "ADRAR","AIN DEFLA","AIN TEMOUCHENT","AL TARF","ALGER","ANNABA","B.B.ARRERIDJ","BATNA","BECHAR","BEJAIA",           "BISKRA","BLIDA","BOUIRA","BOUMERDES","CHLEF","CONSTANTINE","DJELFA","EL BAYADH","EL OUED","GHARDAIA",             "GUELMA","ILLIZI","JIJEL","KHENCHELA","LAGHOUAT","MASCARA","MEDEA","MILA","MOSTAGANEM","M’SILA","NAAMA",               "ORAN","OUARGLA","OUM ELBOUAGHI","RELIZANE","SAIDA","SETIF","SIDI BEL ABBES","SKIKDA","SOUKAHRAS",               "TAMANGHASSET","TEBESSA","TIARET","TINDOUF","TIPAZA","TISSEMSILT","TIZI.OUZOU","TLEMCEN"
        ];
        $( "#wilaya" ).autocomplete({
          source: wilaya
        });
      } );

    /* ******************************   Add post to favorits *************************************** */            

    function addToFav(idAnnonce){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url : "/addtofav/"+idAnnonce,
            type : "POST",
            data : {'_method' : 'PATCH','_token':csrf_token},
            success : function(data){
              if (data == 'Unauthenticated'){
                document.location.href = "/connexion";

                  } else if (data == '1') {
                    swal("L'annonce a déjà été ajoutée aux favoris", "", "warning");

                    } else {
                        swal("L'annonce a été ajoutée aux favoris", "", "success");
                    }             
            }
        })       
    }   
  </script>

</body>
</html>


