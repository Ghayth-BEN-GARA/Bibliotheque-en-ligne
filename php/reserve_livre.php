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
       <title>Réservations | Bibliothèque en ligne</title>
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
               <h2>Réservation des livres</h2>
               <ol class = "breadcrumb">
                 <li><a href = "../index.php">Accueil</a></li>
                 <li><a href = "reserve_livre.php" class = "active">Réservation des livres</a></li>
               </ol>
            </section>
            <section class = "all_contact_info">
              <div class = "container">
                <div class = "row contact_row">
                  <div class = "col-sm-12 contact_info send_message">
                    <h2>Réservez votre livre</h2>
                    <form class = "form-inline contact_box" name = "form" id = "form" method = "POST" action = "#" onsubmit = "return reserverDeslivres();">
                           <input type = "hidden" class = "form-control input_box" name = "email_reserve_livre" id = "email_reserve_livre" value = "<?php echo $email; ?>" required>
					                 <input type = "text" class = "form-control input_box" name = "titre_reserve_livre" id = "titre_reserve_livre" placeholder = "Titre *" required>
                           <input type = "text" class = "form-control input_box" name = "auteur_reserve_livre" id = "auteur_reserve_livre" placeholder = "Auteur *" required>
                           <select class = "form-control input_box" name = "categorie_reserve_livre" id = "categorie_reserve_livre" required>'+
                             <option disabled selected>Catégorie *</option>
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
					                 <button type = "submit" class = "btn btn-default" id = "reserver" name = "reserver">Réserver</button>
                    </form>
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
