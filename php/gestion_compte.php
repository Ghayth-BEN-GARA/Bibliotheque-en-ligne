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
      <title>Gestion des comptes | Bibliothèque en ligne</title>
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
        <section class = "banner_area" data-stellar-background-ratio = "0.5">
          <h2>Liste des comptes</h2>
          <ol class = "breadcrumb">
            <li><a href = "gestion_compte.php" class = "active">Liste des comptes</a></li>
          </ol>
        </section>
        <section class = "blog_tow_area">
          <div class = "container">
            <span class = "tittle tittle_ges">
              <h2>Gestion des comptes</h2>
            </span>
            <div class = "wrap-input100 validate-input">
              <input class = "input100" type = "search" name = "search_text" id = "search_text" placeholder = "Chercher des comptes.." required>
              <span class = "focus-input100"></span>
              <span class = "symbol-input100">
                <i class = "fa fa-search" aria-hidden = "true"></i>
              </span>
             </div>
            <div id = "result"></div>
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
          <script>
            $(document).ready(function(){
              load_data();
              function load_data(query){
                $.ajax({
                  url:"other_php/fetch_compte.php",
                  method:"POST",
                  data:{query:query},
                  success:function(data){
                    $('#result').html(data);
                  }
                });
              }
              $('#search_text').keyup(function(){
                var search = $(this).val();
                if(search != ''){
                  load_data(search);
                }
                else{
                  load_data();
                }
              });
            });

            function ouvriModalModifier(email,prenom,nom,genre,adresse,date_naissance,cin,mobile,date_creation_user){
              swal({
              type: 'info',
              title:'Modifier le profil',
              html:
                 '<form name = "f" id = "f" method = "POST" class = "login100-form center_form" action = "#" onsubmit = "return updateCompte();">' +
                 '<div class = "wrap-input100 code_input">' +
                     '<input class = "input100" type = "hidden" name = "email_profil_modif" id = "email_profil_modif" required value = "'+email+'">' +
                     '<span class = "focus-input100"></span>'+
                 '</div>' +
                 '<div class = "wrap-input100 code_input">' +
                     '<input class = "input100" type = "text" name = "prenom_profil_modif" id = "prenom_profil_modif" required value = "'+prenom+'">' +
                     '<span class = "focus-input100"></span>'+
                     '<span class = "symbol-input100">'+
                              '<i class = "fa fa-user" aria-hidden = "true"></i>'+
                     '</span>'+
                 '</div>' +
                 '<div class = "wrap-input100 code_input">' +
                     '<input class = "input100" type = "text" name = "nom_profil_modif" id = "nom_profil_modif" required value = "'+nom+'">' +
                     '<span class = "focus-input100"></span>'+
                     '<span class = "symbol-input100">'+
                              '<i class = "fa fa-user" aria-hidden = "true"></i>'+
                     '</span>'+
                 '</div>' +
                 '<div class = "wrap-input100 code_input">' +
                     '<select class = "input100" name = "genre_profil_modif" id = "genre_profil_modif" value = "'+genre+'" required>'+
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
                     '<input class = "input100" type = "text" name = "adresse_profil_modif" id = "adresse_profil_modif" required value = "'+adresse+'">' +
                     '<span class = "focus-input100"></span>'+
                     '<span class = "symbol-input100">'+
                              '<i class = "fa fa-home" aria-hidden = "true"></i>'+
                     '</span>'+
                 '</div>' +
                 '<div class = "wrap-input100 code_input">' +
                     '<input class = "input100" type = "date" name = "date_naissance_profil_modif" id = "date_naissance_profil_modif" required value = "'+date_naissance+'">' +
                     '<span class = "focus-input100"></span>'+
                     '<span class = "symbol-input100">'+
                              '<i class = "fa fa-calendar-check-o" aria-hidden = "true"></i>'+
                     '</span>'+
                 '</div>' +
                 '<div class = "wrap-input100 code_input">' +
                     '<input class = "input100" type = "number" name = "cin_profil_modif" id = "cin_profil_modif" required value = "'+cin+'" maxlength = "8">' +
                     '<span class = "focus-input100"></span>'+
                     '<span class = "symbol-input100">'+
                              '<i class = "fa fa-id-card" aria-hidden = "true"></i>'+
                     '</span>'+
                 '</div>' +
                 '<div class = "wrap-input100 code_input">' +
                     '<input class = "input100" type = "tel" name = "mobile_profil_modif" id = "mobile_profil_modif" required value = "'+mobile+'" maxlength = "8">' +
                     '<span class = "focus-input100"></span>'+
                     '<span class = "symbol-input100">'+
                              '<i class = "fa fa-mobile" aria-hidden = "true"></i>'+
                     '</span>'+
                 '</div>' +
                 '<p>'+date_creation_user+'</p>'+
                 '<div class = "container-login100-form-btn code_btn">' +
                     '<input type = "submit" class = "login100-form-btn" name = "update_utilisateur_modif" id = "update_utilisateur_modif" value = "Modifier le profil">	' +
                 ' </div>' +
              '</form>',
              width: 420,
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
             document.getElementById(genre).selected = true;
            }

            function deleteCompte(email){
              $.confirm({
                title: 'Supprimer un compte',
                content: 'Supprimer cet utilisateur ?',
                autoClose: 'Annuler|10000',
                buttons: {
                  logoutUser: {
                    text: 'Supprimer',
                    action: function () {
                      $.ajax({
                        url:"other_php/delete_compte.php",
                        method:"POST",
                        data:{
                          email:email
                        },
                        success:function(data){
                          swal({
                            type: 'success',
                            title: 'Compte supprimé',
                            width: 400,
                            padding: '3em',
                            showCloseButton: false,
                            showCancelButton: false,
                            focusCancel: false,
                            popup: 'animated fadeInDown faster',
                            showConfirmButton: false,
                            allowEscapeKey: false,
                            allowEnterKey:false,
                            scrollbarPadding: true,
                            allowOutsideClick:false,
                            timer:2000
                          })
                          .then(function() {
                            window.location = "gestion_compte.php";
                          })
                        }
                      });
                    }
                  },
                  Annuler: function () {
                  }
                }
              });
            }
          </script>
        </body>
      </html>
