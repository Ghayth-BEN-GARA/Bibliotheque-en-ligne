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
      <title>Gestion des livres | Bibliothèque en ligne</title>
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
          <h2>Liste des livres</h2>
          <ol class = "breadcrumb">
            <li><a href = "gestion_livre.php" class = "active">Liste des livres</a></li>
          </ol>
        </section>
        <section class = "blog_tow_area">
          <div class = "container" id = "pos_container">
            <div class = "wrap-input100">
              <select class = "input100" name = "type_categorie" id = "type_categorie" required onchange = "choixGestion()">
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
          <div class = "container-login100-form-btn">
            <span class = "background-gestion-plus" onclick = "ouvriModalAjouterLivre()">
              <i class = "fa fa-plus" id = "hel" aria-hidden = "true"></i>
            </span>
          </div>
          <span class = "tittle tittle_ges">
            <h2 id = "cat">Gestion des livres</h2>
          </span>
          <div class = "wrap-input100 validate-input">
            <input class = "input100" type = "search" name = "search_text" id = "search_text" placeholder = "Chercher des livres.." required disabled>
            <span class = "focus-input100"></span>
            <span class = "symbol-input100">
              <i class = "fa fa-search" aria-hidden = "true"></i>
            </span>
          </div>
          <div id = "result">Aucune catégorie séléctionné...</div>
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
        function deleteLivre(code){
          $.confirm({
            title: 'Supprimer un livre',
            content: 'Supprimer cette livre ?',
            autoClose: 'Annuler|10000',
              buttons: {
                logoutUser: {
                  text: 'Supprimer',
                  action: function () {
                    $.ajax({
                      url:"other_php/delete_livre.php",
                      method:"POST",
                      data:{
                        code:code
                      },
                      success:function(data){
                        swal({
                          type: 'success',
                          title: 'Livre supprimé',
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
                          window.location = "gestion_livre.php";
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

          function ouvrirModalModifierLivre(data){
            swal({
            type: 'info',
            title:'Modifier le livre',
            html:
               '<form name = "f" id = "f" method = "POST" class = "login100-form center_form" action = "other_php/update_livre.php" enctype = "multipart/form-data">' +
               '<div class = "wrap-input100 code_input">' +
                   '<input class = "input100" type = "hidden" name = "code" id = "code" required>' +
                   '<span class = "focus-input100"></span>'+
               '</div>' +
               '<div class = "wrap-input100 code_input">' +
                   '<input class = "input100" type = "text" name = "titre" id = "titre" required>' +
                   '<span class = "focus-input100"></span>'+
                   '<span class = "symbol-input100">'+
                            '<i class = "fa fa-header" aria-hidden = "true"></i>'+
                   '</span>'+
               '</div>' +
               '<div class = "wrap-input100 code_input">' +
                   '<input class = "input100" type = "text" name = "auteur" id = "auteur" required>' +
                   '<span class = "focus-input100"></span>'+
                   '<span class = "symbol-input100">'+
                            '<i class = "fa fa-user" aria-hidden = "true"></i>'+
                   '</span>'+
               '</div>' +
               '<div class = "wrap-input100 code_input">' +
                   '<input class = "input100" type = "number" name = "date_imprim" id = "date_imprim" placeholder = "Année de édition" maxlength = "4" equired>' +
                   '<span class = "focus-input100"></span>'+
                   '<span class = "symbol-input100">'+
                            '<i class = "fa fa-calendar" aria-hidden = "true"></i>'+
                   '</span>'+
               '</div>' +
               '<div class = "wrap-input100 code_input">' +
                   '<input class = "input100" type = "number" name = "nbr_page" id = "nbr_page" required>' +
                   '<span class = "focus-input100"></span>'+
                   '<span class = "symbol-input100">'+
                            '<i class = "fa fa-file" aria-hidden = "true"></i>'+
                   '</span>'+
               '</div>' +
               '<div class = "wrap-input100 code_input">' +
                   '<select class = "input100" name = "nom_categorie" id = "nom_categorie" required>'+
                     '<option id = "aucun" disabled>Aucun</option>'+
                     '<option id = "cinema">Cinéma</option>'+
                     '<option id = "dev">Développement Personnel</option>'+
                     '<option id = "economie">Economie</option>'+
                     '<option id = "histoire">Histoire</option>'+
                     '<option id = "informatique">Informatique</option>'+
                     '<option id = "litterature">Littérature</option>'+
                     '<option id = "science">Science</option>'+
                     '<option id = "sport">Sport</option>'+
                     '<option id = "tourisme">Tourisme</option>'+
                   '</select>' +
                   '<span class = "focus-input100"></span>'+
                   '<span class = "symbol-input100">'+
                            '<i class = "fa fa-book" aria-hidden = "true"></i>'+
                   '</span>'+
               '</div>' +
               '<div class = "file-field">'+
                  '<span class = "focus-input100"></span>'+
                  '<div class = "btn btn-secondary btn-sm float-left">'+
                    '<span>Image de livre</span>'+
                    '<input type = "file" name = "image" id = "image" required>'+
                  '</div>'+
               '</div>'+
               '<div class = "file-field">'+
                  '<span class = "focus-input100"></span>'+
                  '<div class = "btn btn-secondary btn-sm float-left">'+
                    '<span>PDF de livre</span>'+
                    '<input type = "file" name = "pdf" id = "pdf" accept = "application/pdf" required>'+
                  '</div>'+
               '</div>'+
               '<div class = "file-field">'+
                  '<span class = "focus-input100"></span>'+
                  '<div class = "btn btn-secondary btn-sm float-left">'+
                    '<span>Audio de livre</span>'+
                    '<input type = "file" name = "mp3" id = "mp3" accept = "application/audio" required>'+
                  '</div>'+
               '</div>'+
               '<div class = "container-login100-form-btn code_btn">' +
                   '<input type = "submit" class = "login100-form-btn" name = "modifier_livre" id = "modifier_livre" value = "Modifier le livre">	' +
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
          var code_input = document.getElementById('code');
          code_input.value = data.code;

          var titre_input = document.getElementById('titre');
          titre_input.value = data.titre;

          var auteur_input = document.getElementById('auteur');
          auteur_input.value = data.auteur;

          var date_imprim_input = document.getElementById('date_imprim');
          date_imprim_input.value = data.date_imprim;

          var nbr_page_input = document.getElementById('nbr_page');
          nbr_page_input.value = data.nbr_page;

          var categorie_input = document.getElementById('nom_categorie');
          categorie_input.value = data.nom_categorie;

          if(data.nom_categorie == "Cinéma"){
            document.getElementById("cinema").selected = true;
          }
          else if(data.nom_categorie == "Développement personnel"){
            document.getElementById("dev").selected = true;
          }
          else if(data.nom_categorie == "Economie"){
            document.getElementById("economie").selected = true;
          }
          else if(data.nom_categorie == "Histoire"){
            document.getElementById("histoire").selected = true;
          }
          else if(data.nom_categorie == "Informatique"){
            document.getElementById("informatique").selected = true;
          }
          else if(data.nom_categorie == "Littérature"){
            document.getElementById("litterature").selected = true;
          }
          else if(data.nom_categorie == "Science"){
            document.getElementById("science").selected = true;
          }
          else if(data.nom_categorie == "Sport"){
            document.getElementById("sport").selected = true;
          }
          else if(data.nom_categorie == "Tourisme"){
            document.getElementById("tourisme").selected = true;
          }

        }

          function getLivre(code){
            $.ajax({
               url:"other_php/select_livre_to_edit.php",
               method:"POST",
               data:{
                   code:code
               },
               dataType:"json",
               success:function(data){
                   ouvrirModalModifierLivre(data);
               }
           })
          }
        </script>
      </body>
    </html>
