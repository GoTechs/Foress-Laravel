<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:url"           content="https://foress-dz.com" />
    <meta property="og:title"         content="Notre mission vous simplifier la vie" />
    <meta property="og:description"   content="Nous sommes ravis de vous annoncer le lancement d’un nouveau site de petites annonces FORESS.
                                            يسرنا أن نقدم عرض موقعنا الجديد للإعلانات عبر الإنترنت."/>
    <meta property="og:image"         content="https://foress.s3.ca-central-1.amazonaws.com/86802845_111902887060803_4137310999457824768_o.jpg" />
    <title>{{__('layout.name_app')}} -  {{__('layout.description_page')}} </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('img/favicon-32x32.png')}}">
   
    <!-- Line Icons CSS -->
    <link rel="stylesheet" href="{{asset('fonts/line-icons/line-icons.css')}}" type="text/css">
    <link href="{{asset('css/libs.css')}}" rel="stylesheet">

    <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" rel="stylesheet">
</head>

<body>
<div id="loading" style="display:none;">
    <img src="{{asset('img/loading.gif')}}">
</div> 
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
                <a class="navbar-brand logo" href="/"><img src="{{asset('img/logo.png')}}" alt=""></a>
            </div>
            <!-- brand and toggle menu for mobile End -->

            <!-- Navbar Start -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    @auth
                        <li><a href="/home"><i class="fa fa-user"></i> {{Auth::user()->nom}}</a></li>
                        <li class="{{ (request()->is('my-ads')) ? 'active' : '' }}" id="profile">
                          <a href="/my-ads"><i class="fa fa-credit-card" ></i> {{__('layout.my_ads_menu')}}<span class="badge"></span></a>
                        </li>
                        <li class="{{ (request()->is('favorites')) ? 'active' : '' }}" id="profile">
                          <a href="/favorites"><i class="fa fa-heart-o"></i> {{__('layout.my_favorits_menu')}} <span class="badge"></span></a>
                        </li>
                        <li class="{{ (request()->is('archives')) ? 'active' : '' }}" id="profile">
                           <a href="/archives"><i class="fa fa-folder-o"></i> {{__('layout.archives_menu')}} <span class="badge"></span></a>
                        </li>
                        <li><a href="/logout"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
                    @else
                        <li><a href="/admin/inscription"><i class="fa fa-user"></i> {{__('layout.register_button')}}</a></li>
                        <li><a href="/connexion"><i class="fa fa-sign-in"></i> {{__('layout.login_button')}}</a></li>  
                    @endauth
                        <li class="postadd">
                            <a class="btn btn-danger btn-post" href="/add-Ad"><span class="fa fa-plus-circle"></span> {{__('layout.post_button')}}</a>
                        </li>
                </ul>
            </div>
            <!-- Navbar End -->
        </div>
    </nav>
    
   <!-- Search wrapper Start -->
      <div class="container">
        <div class="search-inner">
    <!-- Start Search box -->
            <div class="search-bar">
              <div class="advanced-search">
                <form class="search-form" method="post" action="/categorie">
                <div class="col-md-5 col-sm-12 search-col">
                    <input class="form-control keyword keyword-laptop" id="search-input" name="keyword" placeholder="Rechercher n'importe quoi..." type="text" value="{{isset($_POST['keyword']) ? $_POST['keyword'] : ''}}">
                    <input class="form-control keyword keyword-phone" id="search-input" name="keywordPhone" placeholder="Rechercher n'importe quoi..." type="text" value="{{isset($_POST['keywordPhone']) ? $_POST['keywordPhone'] : ''}}" style="display:none;" onclick="showinput()">
                   
                </div>
                <div class="col-md-3 col-sm-12 search-col">
                    <input class="form-control keyword wilaya" name="wilaya" id="wilaya" placeholder="Wilaya" type="text" value="{{isset($_POST['wilaya']) ? $_POST['wilaya'] : ''}}">
                    <!-- <i class="fa fa-map-marker"></i> -->
                </div>

                <div class="col-md-3 col-sm-12 search-col search-category">
                    <div class="input-group-addon search-category-container search-container">
                        <select class="form-control selectpicker" name="categorie">
                          <option value="">Toutes les catégories</option>
                          @if (isset($_POST['categorie']))
                          @foreach ($search as $key => $value)                                
                              @if($_POST['categorie'] == $value->idCat)
                                <option value="{{$value->idCat}}" selected="">{{ $value->categories }}</option>
                              @else 
                                <option value="{{$value->idCat}}">{{ $value->categories }}</option>
                              @endif
                          @endforeach
                          @else
                          @foreach ($search as $key => $value)  
                                <option value="{{$value->idCat}}">{{ $value->categories }}</option>
                          @endforeach
                          @endif                                 
                       </select>                                    
                    </div>
                  </div>

                  @csrf
                  <div class="col-md-1 search-col">
                  <button class="btn-search"><strong id="text-search">Trouver ce que vous cherchez</strong><i class="fa fa-search"></i></button>
                  </div>
                </form>
              </div>
            </div>
            <!-- End Search box -->   
        </div>
    </div>
    <!-- Search wrapper End -->
   
</div>
<!-- Header Section End -->

    @yield('content')

<!-- Footer Section Start -->
<footer>
    <!-- Footer Area Start -->
    <section class="footer-Content">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                    <div class="widget">
                        <h3 class="block-title">Foress</h3>
                        <ul class="menu">
                         <li><a href="/contact">{{__('layout.contact_menu')}}</a></li>
                         <li><a href="/centre-aide/avantages-de-l-inscription">Avantages de l’inscription</a></li>
                         <li><a href="/centre-aide/publicite-sur-foress">Publicité sur Foress</a></li> 
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                    <div class="widget">
                    <h3 class="block-title"> RENSEIGNEMENTS</h3>
                       
                            <ul class="menu">
                            <li><a href="/centre-aide/conditions-d-utilisation">Conditions d’utilisation</a></li>
                            <li><a href="/centre-aide/politique-de-confidentialite">Politique de confidentialité</a></li>
                            <li><a href="/centre-aide/regles-d-affichage">Règles d’affichage</a></li> 
                            </ul>
                        
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                    <div class="widget">
                        <h3 class="block-title">{{__('layout.recently_add')}}</h3>
                        <ul class="featured-list">
                            @foreach($recentlyAdd as $recent)
                                <li>
                                @if ($recent->hasPicture == '1')
                                    @foreach ($imageAd as $img)
                                        @if ($recent->id == $img->id_annonce)
                                            <img src="{{Storage::disk('s3')->url($img->imagename)}}" alt=""></a>
                                        @endif
                                    @endforeach
                                  @else 
                                    <img src="{{asset('img/nopicture.png')}}" alt=""></a>
                                  @endif                                   
                                    <div class="hover">
                                    @foreach ($search as $cat)
                                        @if ($cat->idCat == $recent->id_Cat)  
                                            <a href="/details/{{$recent->id}}/{{str_replace(' ', '-', $cat->categories)}}/{{str_replace(' ', '-', $recent->titre)}}/{{str_replace(' ', '-', $recent->wilaya)}}"><i class="fa fa-eye views"> {{ $recent->numberViews}}</i></a>
                                        @endif
                                    @endforeach
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                        <div class="bottom-social-icons social-icon ">
                            <a class="facebook" target="_blank" href="https://www.facebook.com/Foress-111899207061171/?__tn__=%2Cd%2CP-R&eid=ARASPotcXhYJOJ-wvJjPnuBDvDZC9CphhqUNtRhQComsB1AHbq0T-NPd6fFC6FeEArdE9mewa5dmrfc_"><i class="fa fa-facebook"></i></a>
                            <a class="instagram" target="_blank" href="https://www.instagram.com/foress_dz/?hl=fr-ca"><i class="fa fa-instagram"></i></a>
                            <a class="youtube" target="_blank" href="https://www.youtube.com/channel/UCuvPoCDLC9ido1GDafDexiQ?fbclid=IwAR3_lUl-W8JX107T3RQF-U4lw5_n1QDRxQd_W6ZX1ng5XxsJVBhHgsRmrQg"><i class="fa fa-youtube"></i></a>    
                            <a class="linkedin" target="_blank" href="https://www.linkedin.com/company/foress-dz"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-12 copyright">
                  <p> ©2014-2019 GoTechs</p><br/>
                  <p>Tous droits réservés. Google, Google Play, You Tube et autres marques sont des marques déposées de Google Inc.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer area End -->

</footer>
<!-- Footer Section End -->

<!-- Go To Top Link -->
<a href="#" class="back-to-top">
    <i class="fa fa-angle-up"></i>
</a>

<!-- Main JS  -->
<script src="{{asset('js/libs.js')}}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>

<script type="text/javascript">

    function showinput() {
        $('.wilaya, .btn-search').show();
    }
    

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

                    } else if (data == 'owner') {
                        swal("Vous êtes le propriétaire de cette annonce!", "", "warning");
                    }  else {
                        swal("L'annonce a été ajoutée aux favoris", "", "success");
                    }             
            }
        })       
    } 

        var text = $('.status-body-text'),
     btn = $('.btn-overflow'),
       h = text[0].scrollHeight; 
if(h > 150) {
	btn.addClass('less');
	btn.css('display', 'block');
}


btn.click(function(e) 
{
  e.stopPropagation();

  if (btn.hasClass('less')) {
      btn.removeClass('less');
      btn.addClass('more');
      btn.text('Afficher moins');
      $("html, body").animate({ 
                              scrollTop: h + 500
                          }, 1000);
      text.animate({'height': h});
  } else {
      btn.addClass('less');
      btn.removeClass('more');
      btn.text('Afficher plus...');
      text.animate({'height': '150px'});
      $("html, body").animate({ 
                              scrollTop: h + 300
                          }, 1000);
  }  
});	
/* ******************************   Get the height and the width of the detail pic  *************************************** */ 
 
        var imgHeight = document.querySelector('#principal-image>img').naturalHeight;
        var imgWidth = document.querySelector('#principal-image>img').naturalWidth;
        if(imgWidth < 600 ){
            $("#details-pricipale-img").css('width', "300")
        }else{
            $("#details-pricipale-img").css('width', "100%")  
        }

    /* ******************************   Gallery *************************************** */  

    $('[data-fancybox="images-preview"]').fancybox({
        
                            // Close existing modals
                        // Set this to false if you do not need to stack multiple instances
                        thumbs : {
                                 autoStart : true
                                  },
                        closeExisting: false,

                        // Enable infinite gallery navigation
                        loop: false,

                        // Horizontal space between slides
                        gutter: 50,

                        // Enable keyboard navigation
                        keyboard: true,

                        // Should allow caption to overlap the content
                        preventCaptionOverlap: true,

                        // Should display navigation arrows at the screen edges
                        arrows: true,

                        // Should display counter at the top left corner
                        infobar: true,

                        // Should display close button (using `btnTpl.smallBtn` template) over the content
                        // Can be true, false, "auto"
                        // If "auto" - will be automatically enabled for "html", "inline" or "ajax" items
                        smallBtn: "auto",

                        // Should display toolbar (buttons at the top)
                        // Can be true, false, "auto"
                        // If "auto" - will be automatically hidden if "smallBtn" is enabled
                        toolbar: "auto",

                        // What buttons should appear in the top right corner.
                        // Buttons will be created using templates from `btnTpl` option
                        // and they will be placed into toolbar (class="fancybox-toolbar"` element)
                        buttons: [
                            "zoom",
                            "slideShow",
                            "share",
                            "fullScreen",
                            "download",
                            "thumbs",
                            "close"
                        ],

                        // Detect "idle" time in seconds
                        idleTime: 3,

                        // Disable right-click and use simple image protection for images
                        protect: false,

                        // Shortcut to make content "modal" - disable keyboard navigtion, hide buttons, etc
                        modal: false,

                        image: {
                            // Wait for images to load before displaying
                            //   true  - wait for image to load and then display;
                            //   false - display thumbnail and load the full-sized image over top,
                            //           requires predefined image dimensions (`data-width` and `data-height` attributes)
                            preload: true
                        },

                        // Open/close animation type
                        // Possible values:
                        //   false            - disable
                        //   "zoom"           - zoom images from/to thumbnail
                        //   "fade"
                        //   "zoom-in-out"
                        //
                        animationEffect: "zoom",

                        // Duration in ms for open/close animation
                        animationDuration: 366,

                        // Should image change opacity while zooming
                        // If opacity is "auto", then opacity will be changed if image and thumbnail have different aspect ratios
                        zoomOpacity: "auto",

                        // Transition effect between slides
                        //
                        // Possible values:
                        //   false            - disable
                        //   "fade'
                        //   "slide'
                        //   "circular'
                        //   "tube'
                        //   "zoom-in-out'
                        //   "rotate'
                        //
                        transitionEffect: "fade", 

                        // Container is injected into this element
                        parentEl: "body",

                        // Hide browser vertical scrollbars; use at your own risk
                        hideScrollbar: true,

                        // Focus handling
                        // ==============

                        // Try to focus on the first focusable element after opening
                        autoFocus: true,

                        // Put focus back to active element after closing
                        backFocus: true,

                        // Do not let user to focus on element outside modal content
                        trapFocus: true,

                        // Module specific options
                        // =======================

                        fullScreen: {
                            autoStart: false
                        },

                        // Set `touch: false` to disable panning/swiping
                        touch: {
                            vertical: true, // Allow to drag content vertically
                            momentum: true // Continue movement after releasing mouse/touch when panning
                        },

                        // Hash value when initializing manually,
                        // set `false` to disable hash change
                        hash: null,

                        media: {},

                        slideShow: {
                            autoStart: false,
                            speed: 3000
                        },

                        // Use mousewheel to navigate gallery
                        // If 'auto' - enabled for images only
                        wheel: "auto",

                        

                        onInit: $.noop, // When instance has been initialized

                        beforeLoad: $.noop, // Before the content of a slide is being loaded
                        afterLoad: $.noop, // When the content of a slide is done loading

                        beforeShow: $.noop, // Before open animation starts
                        afterShow: $.noop, // When content is done loading and animating

                        beforeClose: $.noop, // Before the instance attempts to close. Return false to cancel the close.
                        afterClose: $.noop, // After instance has been closed

                        onActivate: $.noop, // When instance is brought to front
                        onDeactivate: $.noop, // When other instance has been activated


                        // Clicked on the content
                        clickContent: function(current, event) {
                            return current.type === "image" ? "zoom" : false;
                        },

                        // Clicked on the slide
                        clickSlide: "close",

                        // Clicked on the background (backdrop) element;
                        // if you have not changed the layout, then most likely you need to use `clickSlide` option
                        clickOutside: "close",

                        // Same as previous two, but for double click
                        dblclickContent: false,
                        dblclickSlide: false,
                        dblclickOutside: false,

                        // Custom options when mobile device is detected
                        // =============================================

                        mobile: {
                            preventCaptionOverlap: false,
                            idleTime: false,
                            clickContent: function(current, event) {
                            return current.type === "image" ? "toggleControls" : false;
                            },
                            clickSlide: function(current, event) {
                            return current.type === "image" ? "toggleControls" : "close";
                            },
                            dblclickContent: function(current, event) {
                            return current.type === "image" ? "zoom" : false;
                            },
                            dblclickSlide: function(current, event) {
                            return current.type === "image" ? "zoom" : false;
                            }
                        },

        });

            $('#form, #contactForm').submit(function() {
                $('#loading').show();
            });

            function showHidePass(){
                var passwordInput = document.getElementById('password-field');
                var passStatus = document.getElementById('pass-status');

                if (passwordInput.type == 'password'){
                    passwordInput.type='text';
                    passStatus.className='fa fa-eye-slash field-icon toggle-password';
                } else {
                    passwordInput.type='password';
                    passStatus.className='fa fa-eye field-icon toggle-password';
                }
            }

  </script>

</body>
</html>


