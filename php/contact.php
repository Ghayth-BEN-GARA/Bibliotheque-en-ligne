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
      <title>Contact | Bibliothèque en ligne</title>
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
        <section class = "banner_area" data-stellar-background-ratio = "0.5">
          <h2>Contacter nous</h2>
          <ol class = "breadcrumb">
            <li><a href = "index.php">Accueil</a></li>
            <li><a href = "contact.php" class = "active">Contacter nous</a></li>
          </ol>
        </section>
        <div class = "contact_map">
          <iframe src = "https://maps.google.com/maps?q=sesame%20universit%C3%A9&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
        </div>
        <section class = "all_contact_info">
          <div class = "container">
            <div class = "row contact_row">
              <div class = "col-sm-6 contact_info">
                <h2>Contacter nous</h2>
                <p>Si vous avez des questions, notre service client est à votre disposition de lundi à vendredi de 8:30 à 17:30.</p>
                <div class = "location">
                  <div class = "location_laft">
                    <a class = "f_location" href="#">Adresse</a>
                    <a href = "#">Mobile</a>
                    <a href="#">Email</a>
                  </div>
                  <div class = "address">
                    <a href = "#">Parc Technologique El Ghazela<br> Ariana </a>
                    <a href = "#">70 686 486</a>
                    <a href="#">miniprojet.groupec@gmail.com</a>
                  </div>
                </div>
              </div>
              <div class = "col-sm-6 contact_info send_message">
                <h2>Envoyer nous un message</h2>
                <form class = "form-inline contact_box" name = "form_contact" id = "form_contact" method = "POST" action = "#" onsubmit = "return envoyerMailContact();">
                  <input type = "text" class = "form-control input_box" name = "nom_prenom_contact" id = "nom_prenom_contact" placeholder = "Nom et prénom *" required>
                  <input type = "email" class = "form-control input_box" name = "email_contact" id = "email_contact" placeholder = "Email *" required>
                  <input type = "text" class = "form-control input_box" name = "sujet_contact" id = "sujet_contact" placeholder = "Sujet *" required>
                  <textarea class = "form-control input_box" name = "message_contact" id = "message_contact" placeholder = "Message *" required></textarea>
                  <button type = "submit" class = "btn btn-default" name = "envoyer_contact" id = "envoyer_contact">Envoyer</button>
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
        <script src = "../js/jquery-confirm.min.js"></script>
      </body>
    </html>
