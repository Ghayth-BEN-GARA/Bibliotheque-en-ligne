<?php
  session_start();
?>
<!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset = "utf-8">
      <meta name = "keywords" content = "Bibliothèque en ligne">
      <meta name =  "author" contet = "Université sesame">
      <meta http-equiv = "refresh" content = "600">
      <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
      <title>Services | Bibliothèque en ligne</title>
      <link href = "../images/favicon.png" rel = "icon"  type = "image/x-icon" />
      <link href = "../css/bootstrap.min.css" rel = "stylesheet">
      <link href = "../vendors/animate/animate.css" rel = "stylesheet">
	    <link href = "../vendors/font-awesome/css/font-awesome.min.css" rel = "stylesheet" >
      <link href = "../vendors/camera-slider/camera.css"rel = "stylesheet" >
	    <link href = "../vendors/owl_carousel/owl.carousel.css" rel = "stylesheet" type = "text/css"  media = "all">
	    <link href = "../css/style.css" rel = "stylesheet" type = "text/css"  media = "all" />
      <link href = "../css/jquery-confirm.min.css" rel = "stylesheet" />
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
                <a class = "navbar-brand" href = "index.php"><img src = "../images/favicon.png" alt = ""></a>
              </div>
            </div>
            <div class = "col-md-10 p0">
              <div class = "collapse navbar-collapse" id = "min_navbar">
                <ul class = "nav navbar-nav navbar-right">
                  <?php
                   if ((isset($_SESSION['email'])) || (!empty($_SESSION['email']))){
                    require_once 'other_php/menu_user_other.php';
                  }
                  else {
                    require_once 'other_php/menu_normal_other.php';
                  }
                  ?>
                </ul>
              </div>
            </div>
          </div>
        </nav>
        <section class = "banner_area" data-stellar-background-ratio = "0.5">
          <h2>Nos services</h2>
          <ol class = "breadcrumb">
            <li><a href = "index.php">Accueil</a></li>
            <li><a href = "services.php" class = "active">Nos services</a></li>
          </ol>
        </section>
        <section class = "about_us_area about_us_2 row">
          <div class = "container">
            <div class = "row about_row about_us2_pages">
              <div class = "who_we_area col-md-7">
                <div class = "subtittle">
                  <h2>Disponibilité</h2>
                </div>
                <p>La bibliothèque est disponible toute la semaine pour offrir les meilleurs services aux étudiants.</p>
                <div class = "subtittle">
                  <h2>Choix</h2>
                </div>
                <p>La plupart des catégories des livres sont disponible à livrer soit <b>en ligne</b> ou sur place dans notre local à <b>Tunis</b>.</p>
                <div class = "subtittle">
                  <h2>WIFI</h2>
                </div>
                <p>La plupart des étudiants suivent leurs études avec la connexion Internet. C'est pour ça nous mettons à votre disposition une connexion Internet à haute débit gratuit.</p>
                <div class = "subtittle">
                  <h2>Informatisé</h2>
                </div>
                <p>Comme tout les sociétés, notre bibliothèque a développé un site web pour rester plus proches aux étudiants.</p>
              </div>
              <div class = "col-md-5 our_skill_inner">
                <div class = "col-md-6 feature_img">
                  <img src = "../images/bibliotheque_def.jpg" alt = "" class = "sesame_def">
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class = "our_partners_area">
          <div class = "book_now_aera">
            <div class = "container">
              <div class = "row book_now">
                <div class = "col-md-10 booking_text">
                  <h4>Réservation des livres en ligne</h4>
                  <p>Même en ligne, toutes les catégories sont disponible sur le site web.</p>
                </div>
                <div class = "col-md-2 p0 book_bottun">
                  <a href = "login.php" class = "button_all">Reserver des livres</a>
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
        <script src = "../js/jquery-confirm.min.js"></script>
      </body>
  </html>
