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
          <?php
          $email = $_SESSION['email'];

          $requete = "SELECT * FROM utilisateur WHERE email_user = '$email'";
          $result = mysqli_query($cnx,$requete) or die("Erreur : Requéte erroné");
            if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_assoc($result)) {
                $nom = $row['prenom_user'];
                $nom .= ' ';
                $nom .= $row['nom_user'];

                $nom2 = $row["nom_user"];
                $prenom = $row["prenom_user"];
                $genre = $row["genre_user"];
                $adresse = $row["adresse_user"];
                $date_naissance = $row["date_naissance_user"];
                $cin = $row["cin_user"];
                $mobile = $row["mobile_user"];
                $date_creation = $row["date_creation_user"];
              }
            }
            if($genre == 'Homme'){
              $sexe = "monsieur";
            }
            else if($genre = "Femme"){
              $sexe = "madame";
            }
            ?>
          <script>
          function ouvrirModalUpdateUtilisateur(){
             swal({
             type: 'info',
             title:'Modifier le profil',
             html:
                '<form name = "f" id = "f" method = "POST" class = "login100-form validate-form" action = "#" onsubmit = "return updateUtilisateur();">' +
                '<div class = "wrap-input100 code_input">' +
                    '<input class = "input100" type = "hidden" name = "email_profil" id = "email_profil" required value = "<?php echo ($email);?>">' +
                    '<span class = "focus-input100"></span>'+
                '</div>' +
                '<div class = "wrap-input100 code_input">' +
                    '<input class = "input100" type = "text" name = "prenom_profil" id = "prenom_profil" required value = "<?php echo ($prenom);?>">' +
                    '<span class = "focus-input100"></span>'+
                    '<span class = "symbol-input100">'+
                             '<i class = "fa fa-user" aria-hidden = "true"></i>'+
                    '</span>'+
                '</div>' +
                '<div class = "wrap-input100 code_input">' +
                    '<input class = "input100" type = "text" name = "nom_profil" id = "nom_profil" required value = "<?php echo ($nom2);?>">' +
                    '<span class = "focus-input100"></span>'+
                    '<span class = "symbol-input100">'+
                             '<i class = "fa fa-user" aria-hidden = "true"></i>'+
                    '</span>'+
                '</div>' +
                '<div class = "wrap-input100 code_input">' +
                    '<select class = "input100" name = "genre_profil" id = "genre_profil" required>'+
                      '<option id = "Aucun" disabled>Aucun</option>'+
                      '<option id = "Homme">Homme</option>'+
                      '<option id = "Femme">Femme</option>'+
                    '</select>' +
                    '<span class = "focus-input100"></span>'+
                    '<span class = "symbol-input100">'+
                             '<i class = "fa fa-intersex" aria-hidden = "true"></i>'+
                    '</span>'+
                '</div>' +
                '<div class = "wrap-input100 code_input">' +
                    '<input class = "input100" type = "text" name = "adresse_profil" id = "adresse_profil" required value = "<?php echo ($adresse);?>">' +
                    '<span class = "focus-input100"></span>'+
                    '<span class = "symbol-input100">'+
                             '<i class = "fa fa-home" aria-hidden = "true"></i>'+
                    '</span>'+
                '</div>' +
                '<div class = "wrap-input100 code_input">' +
                    '<input class = "input100" type = "date" name = "date_naissance_profil" id = "date_naissance_profil" required value = "<?php echo ($date_naissance);?>">' +
                    '<span class = "focus-input100"></span>'+
                    '<span class = "symbol-input100">'+
                             '<i class = "fa fa-calendar-check-o" aria-hidden = "true"></i>'+
                    '</span>'+
                '</div>' +
                '<div class = "wrap-input100 code_input">' +
                    '<input class = "input100" type = "number" name = "cin_profil" id = "cin_profil" required value = "<?php echo ($cin);?>" maxlength = "8">' +
                    '<span class = "focus-input100"></span>'+
                    '<span class = "symbol-input100">'+
                             '<i class = "fa fa-id-card" aria-hidden = "true"></i>'+
                    '</span>'+
                '</div>' +
                '<div class = "wrap-input100 code_input">' +
                    '<input class = "input100" type = "tel" name = "mobile_profil" id = "mobile_profil" required value = "<?php echo ($mobile);?>" maxlength = "8">' +
                    '<span class = "focus-input100"></span>'+
                    '<span class = "symbol-input100">'+
                             '<i class = "fa fa-mobile" aria-hidden = "true"></i>'+
                    '</span>'+
                '</div>' +
                '<p class = "style_p">Date de creation : <?php echo ($date_creation);?></p>' +
                '<div class = "container-login100-form-btn code_btn">' +
                    '<input type = "submit" class = "login100-form-btn" name = "update_utilisateur" id = "update_utilisateur" value = "Modifier le profil">	' +
                ' </div>' +
             '</form>',
             width: 400,
             padding: '3em',
             showCloseButton: true,
             showCancelButton: false,
             focusCancel: false,
             popup: 'animated fadeInDown faster',
             showConfirmButton: false,
             allowEscapeKey: false,
             allowEnterKey:false,
             scrollbarPadding: true,
             allowOutsideClick:false
           })
           var genre = "<?php echo ($genre);?>";
            document.getElementById(genre).selected = true;
           }
          </script>
          <section class = "our_feature_area">
            <div class = "container">
              <div class = "tittle wow fadeInUp">
                <h2>Profil</h2>
                <h4>Bienvenue dans votre profil <?php echo ($sexe);?> <b><?php echo ($nom);?><h1>&#128075;</h1></b></h4>
              </div>
              <div class = "feature_row row">
                <div class = "col-md-6 feature_content">
                  <div class = "subtittle">
                    <h2><?php echo ($nom);?></h2>
                    <h5>Ce profil est privé. Tous vos informations personnelles sont sécurisés.</h5>
                    <br>
                    <h2 onclick = "ouvrirModalUpdateUtilisateur()"><i class = "fa fa-edit" aria-hidden = "true"></i></h2>
                  </div>
                  <div class = "media">
                    <div class = "media-left">
                      <a href = "#">
                        <i class = "fa fa-user" aria-hidden = "true"></i>
                      </a>
                    </div>
                    <div class = "media-body">
                      <a href = "#">Nom</a>
                      <p><?php echo ($nom);?></p>
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
                        <p><?php echo ($genre);?></p>
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
                        <p><?php echo ($adresse);?></p>
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
                      <p><?php echo ($date_naissance);?></p>
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
                      <p><?php echo ($cin);?></p>
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
                      <p><?php echo ($mobile);?></p>
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
                      <p><?php echo ($date_creation);?></p>
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
