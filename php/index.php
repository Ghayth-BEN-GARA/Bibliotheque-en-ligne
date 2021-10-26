<?php
  session_start();
?>
 <!DOCTYPE html>
<html lang = "en">
  <head>
    <meta charset = "utf-8">
      <meta name = "keywords" content = "Bibliothèque en ligne">
      <meta name =  "author" contet = "Université sesame">
      <meta http-equiv = "refresh" content = "601">
      <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
      <title>Accueil | Bibliothèque en ligne</title>
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
               <button type = "button" class = "navbar-toggle collapsed" data-toggle = "collapse" data-target = "#min_navbar">
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
                <?php
                 if ((isset($_SESSION['email'])) || (!empty($_SESSION['email']))){
                  require_once 'other_php/menu_user_other.php';
                }
                else {
                  require_once 'other_php/menu_normal_other.php';
                }
                ?>
                </div>
              </div>
            </div>
          </nav>
          <section class = "slider_area row m0">
            <div class = "slider_inner">
              <div data-thumb = "../images/slider1.jpg" data-src = "../images/slider1.jpg">
                <div class = "camera_caption">
                  <div class = "container">
                    <h5 class = " wow fadeInUp animated">Bienvenue sur notre bibliothèque en ligne</h5>
                    <h3 class = " wow fadeInUp animated" data-wow-delay = "0.5s">La lecture réveille la tête et repose les pieds</h3>
                   </div>
                </div>
              </div>
              <div data-thumb = "../images/slider2.jpg" data-src = "../images/slider2.jpg">
                <div class = "camera_caption">
                  <div class = "container">
                    <h5 class = " wow fadeInUp animated">Bienvenue sur notre bibliothèque en ligne</h5>
                    <h3 class = " wow fadeInUp animated" data-wow-delay = "0.5s">La lecture réveille la tête et repose les pieds</h3>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class = "professional_builder row">
            <div class = "container">
              <div class = "row builder_all">
                <div class = "col-md-3 col-sm-6 builder">
                  <i class = "fa fa-clock-o" aria-hidden = "true"></i>
                  <h4>Disponibilité</h4>
                  <p>Notre bibliothèque est disponible toute la semaine.</p>
                </div>
                <div class = "col-md-3 col-sm-6 builder">
                  <i class = "fa fa-book" aria-hidden = "true"></i>
                  <h4>Choix</h4>
                  <p>La plupart des catégories des livres sont disponible dans notre bibliothèque.</p>
                </div>
                <div class = "col-md-3 col-sm-6 builder">
                  <i class = "fa fa-wifi" aria-hidden = "true"></i>
                  <h4>WIFI</h4>
                  <p>La seule bibliothèque qui offre l'internet gratuitement aux étudiants.</p>
                </div>
                <div class = "col-md-3 col-sm-6 builder">
                  <i class = "fa fa-globe" aria-hidden = "true"></i>
                  <h4>Informatisé</h4>
                  <p>La bibliothèque posséde un site web pour rester plus proche aux étudiants.</p>
                </div>
              </div>
            </div>
          </section>
          <section class = "about_us_area row">
            <div class = "container">
              <div class = "tittle wow fadeInUp">
                <h2>Bibliothèque en ligne</h2>
                <h4>La bibliothèque vous propose un service clientèle disponible pour répondre à toutes vos questions.</h4>
              </div>
              <div class = "row about_row">
                <div class = "who_we_area col-md-7 col-sm-6">
                  <div class = "subtittle">
                    <h2>Université sesame</h2>
                  </div>
                  <p>Bienvenue sur la bibliothèque numérique de sésame. Ce service gratuit vous permet d’emprunter à distance des livres numériques et de les télécharger sur vos smartphones ou vos ordinateurs.
                    Que trouve-t-on dans le catalogue ?
                    Découvrez une collection initiale de plusieurs livres, qui s'enrichit jours après jours.
                    La bibliothèque numérique est constituée de plusieurs catégories des livres.
                    En plus de l’offre éditoriale proposée en prêt à durée limitée, la Bibliothèque numérique propose un accès au catalogue de plus de 1000 titres téléchargeables librement et gratuitement depuis la Bibliothèque numérique.
                  </p>
                  <a href = "contact.php" class = "button_all">Contacter-nous</a>
                </div>
                <div class = "col-md-5 col-sm-6 about_client">
                  <img src = "../images/sesame_def.jpg" alt = "" class = "sesame_def">
                </div>
              </div>
            </div>
          </section>
          <section class = "our_achievments_area" data-stellar-background-ratio = "0.3">
            <div class = "container">
              <div class = "tittle wow fadeInUp">
                <h2>Meilleurs catégories</h2>
                <h4>Les chiffres des catégories disponible dans notre bibliothèque.</h4>
              </div>
              <div class = "achievments_row row">
                <div class = "col-md-3 col-sm-6 p0 completed">
                  <i class = "fa fa-history" aria-hidden = "true"></i>
                  <span class = "counter">310</span>
                  <h6>Histoires</h6>
                </div>
                <div class = "col-md-3 col-sm-6 p0 completed">
                  <i class = "fa fa-futbol-o" aria-hidden = "true"></i>
                  <span class = "counter">247</span>
                  <h6>Sports</h6>
                </div>
                <div class = "col-md-3 col-sm-6 p0 completed">
                  <i class = "fa fa-bar-chart-o" aria-hidden = "true"></i>
                  <span class = "counter">215</span>
                  <h6>Economies</h6>
                </div>
                <div class = "col-md-3 col-sm-6 p0 completed">
                  <i class = "fa fa-book" aria-hidden = "true"></i>
                  <span class = "counter">200</span>
                  <h6>Littératures</h6>
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
                    <p>Si vous n'avez pas trouvé votre livre, reservez-le avec une seule clique..</p>
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
