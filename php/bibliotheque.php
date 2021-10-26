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
      <title>Informations | Bibliothèque en ligne</title>
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
          <section class = "banner_area" data-stellar-background-ratio = "0.5">
            <h2>Informations sur la bibliothèque</h2>
            <ol class = "breadcrumb">
              <li><a href = "index.php">Accueil</a></li>
              <li><a href = "bibliotheque.php" class = "active">Informations sur la Bibliothèque</a></li>
            </ol>
          </section>
          <section class = "building_construction_area">
            <div class = "container">
              <div class = "row building_construction_row">
                <div class = "col-sm-8 constructing_laft">
                  <h2>Université sesame</h2>
                  <img src = "../images/sesame.jpg" alt = "">
                  <a href = "#">Bibliothèque en ligne</a>
                  <p>Bienvenue sur la bibliothèque numérique de sésame. Ce service gratuit vous permet d’emprunter à distance des livres numériques et de les télécharger sur différents supports : tablettes, smartphone, ordinateur.
                    Que trouve-t-on dans le catalogue ?
                    Découvrez une collection initiale de plusieurs livres, qui s'enrichit jours après jours.
                    La bibliothèque numérique est constituée de plusieurs catégories des livres,
                    En plus de l’offre éditoriale proposée en prêt à durée limitée, la Bibliothèque numérique propose un accès au catalogue de plus de 1000 titres téléchargeables librement et gratuitement depuis la Bibliothèque numérique.</p>
                  <div class = "col-md-6 ipsum">
                    <p>Vous trouvez dans notre bibliothèque :</p>
                    <ul class = "excavator">
                      <li><i class = "fa fa-chevron-circle-right"></i><b>Une connexion Internet gratuit</b></li>
                      <li><i class = "fa fa-chevron-circle-right"></i><b>Les différentes catégories des livres</b></li>
                      <li><i class = "fa fa-chevron-circle-right"></i><b>Des confortes places</b></li>
                      <li><i class = "fa fa-chevron-circle-right"></i><b>Une cafétéria pour les pauses</b></li>
                    </ul>
                  </div>
                </div>
                <div class = "col-sm-4 constructing_right">
                  <h2>Liens rapides</h2>
                    <ul class = "painting">
                      <li onclick = "loadText1()"><a href = "#"><i class = "fa fa-book" aria-hidden = "true"></i>Une bibliothèque en ligne ?</a></li>
                      <li onclick = "loadText2()"><a href = "#"><i class = "fa fa-medium" aria-hidden = "true"></i>Autres media ?</a></li>
                      <li onclick = "loadText3()"><a href = "#"><i class = "fa fa-bullseye" aria-hidden = "true"></i>Objectifs de la bibliothèque ?</a></li>
                    </ul>
                    <div class = "contact_us">
                      <h4>Contacter nous</h4>
                      <a href = "#" class = "contac_namber">70 686 486</a>
                      <a href = "#" class = "contac_namber">miniprojet.groupec@gmail.com</a>
                      <p>Si vous avez des questions , Contacter nous </p>
                      <a href = "contact.php" class = "button_all">Contacter nous</a>
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
