<?php
  session_start();
  if ((!isset($_SESSION['admin'])) || (empty($_SESSION['admin']))){
    header('Location: page_not_found.php');
  }
  ?>
 <!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset = "utf-8">
      <meta name = "keywords" content = "Bibliothèque en ligne">
      <meta name =  "author" contet = "Université sesame">
      <meta http-equiv = "refresh" content = "600">
      <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
      <title>Profil | Bibliothèque en ligne</title>
      <link href = "../images/favicon.png" rel = "icon"  type = "image/x-icon" />
      <link href = "../css/bootstrap.min.css" rel = "stylesheet">
      <link href = "../vendors/animate/animate.css" rel = "stylesheet">
	    <link href = "../vendors/font-awesome/css/font-awesome.min.css" rel = "stylesheet" >
      <link href = "../vendors/camera-slider/camera.css"rel = "stylesheet" >
	    <link href = "../vendors/owl_carousel/owl.carousel.css" rel = "stylesheet" type = "text/css"  media = "all">
	    <link href = "../css/style.css" rel = "stylesheet" type = "text/css"  media = "all" />
      <link href = "../css/sweetalert2.css" rel = "stylesheet" />
      <link href = "../css/jquery-confirm.min.css" rel = "stylesheet" />
      <link href = "../login_style/vendor/css-hamburgers/hamburgers.min.css" rel = "stylesheet" type = "text/css" >
      <link href = "../login_style/vendor/select2/select2.min.css" rel = "stylesheet" type = "text/css">
      <link href = "../login_style/css/util.css" rel = "stylesheet" type = "text/css" >
      <link href = "../login_style/css/main.css" rel = "stylesheet" type = "text/css" >
      <script>
      function logoutUtilisateur(){
         $.confirm({
           title: 'Déconnexion',
           content: 'Vous étes sur de fermer votre compte?',
           autoClose: 'Annuler|10000',
           buttons: {
             logoutUser: {
               text: 'Déconnexion',
               action: function () {
                 location.href = "other_php/deconnexion.php";
               }
             },
             Annuler: function () {
             }
           }
         });
       }
     </script>
  </head>
  <body>
    <div class = "preloader"></div>
     <section class = "top_header_area">
        <div class = "container">
          <ul class = "nav navbar-nav top_nav">
            <li><a href = "#"><i class = "fa fa-phone"></i>70 686 486</a></li>
            <li><a href = "#"><i class = "fa fa-envelope-o"></i>miniprojet.groupec@gmail.com</a></li>
            <li><a href = "#"><i class = "fa fa-clock-o"></i>Lundi - Vendredi 08:30 - 17:30</a></li>
          </ul>
          <ul class = "nav navbar-nav navbar-right social_nav">
            <li><a href = "https://www.facebook.com/sesametunisie/?eid=ARCM4qvQR_5Ui_laCS5PwDhzrxxM6lWi27KMJw6xBiCUvcz_J3w2h7a3Q733bb_5GrMaQdJDKXYgrxey&timeline_context_item_type=intro_card_education&timeline_context_item_source=100044169768609&fref=tag"><i class = "fa fa-facebook" aria-hidden = "true"></i></a></li>
            <li><a href = "https://www.instagram.com/explore/locations/244984252/universite-sesame/?hl=fr"><i class = "fa fa-instagram" aria-hidden = "true"></i></a></li>
            <li><a href = "https://www.linkedin.com/school/universite-sesame/"><i class = "fa fa-linkedin" aria-hidden = "true"></i></a></li>
          </ul>
         </div>
       </section>
       <nav class = "navbar navbar-default header_aera" id = "main_navbar">
         <div class = "container">
           <div class = "col-md-2 p0">
             <div class = "navbar-header">
               <button type = "button" class="navbar-toggle collapsed" data-toggle = "collapse" data-target = "#min_navbar">
                 <span class = "sr-only">Toggle navigation</span>
                 <span class = "icon-bar"></span>
                 <span class = "icon-bar"></span>
                 <span class = "icon-bar"></span>
                </button>
                <a class = "navbar-brand" href = "#"><img src = "../images/favicon.png" alt = ""></a>
              </div>
            </div>
            <div class = "col-md-10 p0">
              <div class = "collapse navbar-collapse" id = "min_navbar">
                <ul class = "nav navbar-nav navbar-right">
                  <?php require_once 'other_php/menu_admin_other.php' ?>
                </ul>
              </div>
            </div>
          </div>
        </nav>
        <section class = "our_feature_area">
          <div class = "container">
            <div class = "tittle wow fadeInUp">
              <h2>Profil</h2>
              <h4>Bienvenue dans votre profil université <b>Sesame<h1>&#128075;</h1></b></h4>
            </div>
            <div class = "feature_row row">
              <div class = "col-md-6 feature_content">
                <div class = "subtittle">
                  <h2>Université Sesame</h2>
                  <h5>Ce profil est privé. Tous vos informations personnelles sont sécurisés.</h5>
                  <br>
                </div>
                <div class = "media">
                  <div class = "media-left">
                    <a href = "#">
                      <i class = "fa fa-user" aria-hidden = "true"></i>
                    </a>
                  </div>
                  <div class = "media-body">
                    <a href = "#">Nom</a>
                    <p>Université Sesame</p>
                  </div>
                </div>
                <div class = "media">
                  <div class = "media-left">
                    <a href = "#">
                      <i class = "fa fa-intersex" aria-hidden = "true"></i>
                    </a>
                  </div>
                  <div class = "media-body">
                    <a href = "#">Genre</a>
                      <p>Université</p>
                  </div>
                </div>
                <div class = "media">
                  <div class = "media-left">
                    <a href = "#">
                      <i class = "fa fa-home" aria-hidden = "true"></i>
                    </a>
                  </div>
                  <div class = "media-body">
                    <a href = "#">Adresse</a>
                    <p>ZI Chotrana I BP4 Parc Technologique El Ghazela</p>
                  </div>
                </div>
                <div class = "media">
                  <div class = "media-left">
                    <a href = "#">
                      <i class = "fa fa-calendar-check-o" aria-hidden = "true"></i>
                    </a>
                  </div>
                  <div class = "media-body">
                    <a href = "#">Date de naissance</a>
                    <p>Avril 2011</p>
                  </div>
                </div>
                <div class = "media">
                  <div class = "media-left">
                    <a href = "#">
                      <i class = "fa fa-id-card" aria-hidden = "true"></i>
                    </a>
                  </div>
                  <div class = "media-body">
                    <a href = "#">Numéro de carte d'identité</a>
                    <p>Aucun</p>
                  </div>
                </div>
                <div class = "media">
                  <div class = "media-left">
                    <a href = "#">
                      <i class = "fa fa-mobile" aria-hidden = "true"></i>
                    </a>
                  </div>
                  <div class = "media-body">
                    <a href = "#">Numéro mobile</a>
                    <p>70 686 486</p>
                  </div>
                </div>
                <div class = "media">
                  <div class = "media-left">
                    <a href = "#">
                      <i class = "fa fa-calendar" aria-hidden = "true"></i>
                    </a>
                  </div>
                  <div class = "media-body">
                    <a href = "#">Date de création du compte</a>
                    <p>Mai 2020</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <?php require_once 'other_php/footer.php' ?>
        <script src = "../js/jquery-1.12.0.min.js"></script>
        <script src = "../js/bootstrap.min.js"></script>
        <script src = "../vendors/animate/wow.min.js"></script>
        <script src = "../vendors/camera-slider/jquery.easing.1.3.js"></script>
        <script src = "../vendors/camera-slider/camera.min.js"></script>
        <script src = "../vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src = "../vendors/isotope/isotope.pkgd.min.js"></script>
        <script src = "../vendors/Counter-Up/jquery.counterup.min.js"></script>
        <script src = "../vendors/Counter-Up/waypoints.min.js"></script>
        <script src = "../vendors/owl_carousel/owl.carousel.min.js"></script>
        <script src = "../vendors/stellar/jquery.stellar.js"></script>
        <script src = "../js/theme.js"></script>
        <script src = "../js/sweetalert2.all.min.js"></script>
        <script src = "../js/fonction.js"></script>
        <script src = "../js/jquery-confirm.min.js"></script>
      </body>
    </html>
