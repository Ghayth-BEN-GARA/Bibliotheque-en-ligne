<?php
  session_start();
  if ((!isset($_SESSION['email'])) || (empty($_SESSION['email']))){
    header('Location: page_not_found.php');
  }

  else if ((isset($_SESSION['admin'])) || (!empty($_SESSION['admin']))){
    header('Location: page_not_found_admin.php');
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
       <title>Liste des livres | Bibliothèque en ligne</title>
       <link href = "../images/favicon.png" rel = "icon"  type = "image/x-icon" />
       <link href = "../css/bootstrap.min.css" rel = "stylesheet">
       <link href = "../vendors/animate/animate.css" rel = "stylesheet">
 	     <link href = "../vendors/font-awesome/css/font-awesome.min.css" rel = "stylesheet" >
       <link href = "../vendors/camera-slider/camera.css"rel = "stylesheet" >
 	     <link href = "../vendors/owl_carousel/owl.carousel.css" rel = "stylesheet" type = "text/css"  media = "all">
 	     <link href = "../css/style.css" rel = "stylesheet" type = "text/css"  media = "all" />
       <link href = "../css/sweetalert2.css" rel = "stylesheet" />
       <link href = "../css/jquery-confirm.min.css" rel = "stylesheet" />
       <link href = "../login_style/vendor/animate/animate.css" rel = "stylesheet" type = "text/css" >
       <link href = "../login_style/vendor/css-hamburgers/hamburgers.min.css" rel = "stylesheet" type = "text/css" >
       <link href = "../login_style/vendor/select2/select2.min.css" rel = "stylesheet" type = "text/css" >
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
             <h2>Liste des livres</h2>
             <ol class = "breadcrumb">
               <li><a href = "../index.php">Accueil</a></li>
               <li><a href = "choix_livre.php" class = "active">Liste des livres</a></li>
             </ol>
           </section>
           <section class = "slider_area row m0">
            <div class = "slider_inner">
              <div data-thumb = "../images/slider1.jpg" data-src = "../images/slider1.jpg">
                <div class = "camera_caption">
                  <div class = "container">
                    <h5 class = " wow fadeInUp animated">Passionné de lecture ?</h5>
                    <h3 class = " wow fadeInUp animated" data-wow-delay = "0.5s">Vous voulez en savoir beaucoup sur l'histoire  ? </h3>
                    <br>
                    <h5 class = " wow fadeInUp animated" data-wow-delay = "0.8s">Vous rêvez d'avoir un bon bagage culturel ? </h5>
                  </div>
                </div>
              </div>
              <div data-thumb = "../images/slider2.jpg" data-src = "../images/slider2.jpg">
                <div class = "camera_caption">
                  <div class = "container">
                    <h5 class = " wow fadeInUp animated">Le rêve devient réalité aujourd'hui</h5>
                    <h3 class = " wow fadeInUp animated" data-wow-delay = "0.8s">Avec la bibliothèque en ligne, vous trouvez une plateforme trés riche des livres</h3>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class = "what_we_area row">
            <div class = "container">
              <div class = "tittle wow fadeInUp">
                <h2>Choisissez votre livre</h2>
                <h4>Les grands hommes ne sont plus dans le monde,<br><br> Ils sont tous dans l'histoire.</h4>
              </div>
              <div class = "container" id = "pos_container">
                <div class = "wrap-input100">
                  <select class = "input100 livre" name = "type_categorie" id = "type_categorie" required onchange = "choixCategorieLivre()">
                    <option disabled selected>Catégorie</option>
                    <option>Cinéma</option>
                    <option>Développement personnel</option>
                    <option>Economie</option>
                    <option>Histoire</option>
                    <option>Informatique</option>
                    <option>Littérature</option>
                    <option>Science</option>
                    <option>Sport</option>
                    <option>Tourisme</option>
                  </select>
                  <span class = "focus-input100"></span>
                  <span class = "symbol-input100">
                    <i class = "fa fa-book" aria-hidden = "true"></i>
                  </span>
                </div>
              </div>
            <div class = "container">
              <span class = "tittle tittle_liste_livre">
                  <h2 id = "cat">Les livres</h2>
              </span>
              <br>
              <br>
              <div class = "wrap-input100 validate-input">
                <input class = "input100" type = "search" name = "search_text" id = "search_text" placeholder = "Chercher des livres.." required disabled>
                <span class = "focus-input100"></span>
                <span class = "symbol-input100">
                  <i class = "fa fa-search" aria-hidden = "true"></i>
                </span>
               </div>
               <div id = "result">Aucune catégorie séléctionné...</div>
            </div>
              </div>
            </section>
            <section class = "call_min_area">
              <div class = "container">
                <h2>70 686 486</h2>
                <p>n hésitez pas de nous contacter si vous avez des <br> questions ou vous avez besoin d'aide..</p>
                <div class = "call_btn">
                  <a href = "contact.php" class = "button_all">Contacter nous</a>
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
