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
      <title>Gallerie | Bibliothèque en ligne</title>
      <link href = "../images/favicon.png" rel = "icon"  type = "image/x-icon" />
      <link href = "../css/bootstrap.min.css" rel = "stylesheet">
      <link href = "../vendors/animate/animate.css" rel = "stylesheet">
	    <link href = "../vendors/font-awesome/css/font-awesome.min.css" rel = "stylesheet" >
      <link href = "../vendors/camera-slider/camera.css"rel = "stylesheet" >
	    <link href = "../vendors/owl_carousel/owl.carousel.css" rel = "stylesheet" type = "text/css"  media = "all">
	    <link href = "../css/style.css" rel = "stylesheet" type = "text/css"  media = "all" />
      <link href = "../css/sweetalert2.css" rel = "stylesheet" />
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
        <section class = "featured_works row" data-stellar-background-ratio = "0.3">
          <div class = "tittle wow fadeInUp">
            <h2>Photos d'université Sesame</h2>
            <h4>Le travail est souvent le père du plaisir. <b>Voltaire</b></h4>
          </div>
          <div class = "featured_gallery">
            <div class = "col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
              <img src = "../images/image1.jpg" alt = "">
              <div class = "gallery_hover">
                <h4>Sesame</h4>
                <a href = "../images/image1.jpg" data-lightbox = "image-1">Voir image</a>
              </div>
            </div>
            <div class = "col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
              <img src = "../images/sesame_def.jpg" alt = "">
              <div class="gallery_hover">
                <h4>Sesame</h4>
                <a href = "../images/sesame_def.jpg" data-lightbox = "image-1">Voir image</a>
              </div>
            </div>
            <div class = "col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
              <img src = "../images/image2.jpg" alt = "">
              <div class = "gallery_hover">
                <h4>Sesame</h4>
                <a href = "../images/image2.jpg" data-lightbox = "image-1">Voir image</a>
              </div>
            </div>
            <div class = "col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
              <img src = "../images/image4.jpg" alt = "">
              <div class = "gallery_hover">
                <h4>Sesame</h4>
                <a href = "../images/image4.jpg" data-lightbox = "image-1">Voir image</a>
              </div>
            </div>
            <div class = "col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
              <img src = "../images/image5.jpg" alt = "">
              <div class = "gallery_hover">
                <h4>Sesame</h4>
                <a href = "../images/image5.jpg" data-lightbox = "image-1">Voir image</a>
              </div>
            </div>
            <div class = "col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
              <img src = "../images/image6.jpg" alt = "">
              <div class="gallery_hover">
                <h4>Sesame</h4>
                  <a href = "../images/image6.jpg" data-lightbox = "image-1">Voir image</a>
              </div>
            </div>
            <div class = "col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
              <img src = "../images/image7.jpg" alt = "">
              <div class = "gallery_hover">
                <h4>Sesame</h4>
                <a href = "../images/image7.jpg" data-lightbox = "image-1">Voir projet</a>
              </div>
            </div>
            <div class = "col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
              <img src = "../images/image8.jpg" alt = "">
              <div class = "gallery_hover">
                <h4>Sesame</h4>
                <a href = "../images/image8.jpg" data-lightbox = "image-1">Voir projet</a>
              </div>
            </div>
        </div>
        <div class = "tittle wow fadeInUp">
          <h2>Videos d'université Sesame</h2>
          <h4>Learning is the only thing the mind never exhausts, never fears and never regrets. <b>Da vinci</b></h4>
        </div>
        <div class = "featured_gallery">
          <div class = "col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
            <video width = "300" controls>
              <source src = "../videos/video1.mp4" type = "video/mp4">
                Your browser does not support HTML video.
            </video>
            <div class = "gallery_hover">
              <h4>Sesame</h4>
              <a href = "../videos/video1.mp4" data-lightbox = "image-1">Voir video</a>
            </div>
          </div>
          <div class = "col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
            <video width = "300" controls>
              <source src = "../videos/video2.mp4" type = "video/mp4">
                Your browser does not support HTML video.
            </video>
            <div class = "gallery_hover">
              <h4>Sesame</h4>
              <a href = "../videos/video2.mp4" data-lightbox = "image-1">Voir video</a>
            </div>
          </div>
          <div class = "col-md-3 col-sm-4 col-xs-6 gallery_iner p0">
            <video width = "300" controls>
              <source src = "../videos/video3.mp4" type = "video/mp4">
                Your browser does not support HTML video.
            </video>
            <div class = "gallery_hover">
              <h4>Sesame</h4>
              <a href = "../videos/video3.mp4" data-lightbox = "image-1">Voir video</a>
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
