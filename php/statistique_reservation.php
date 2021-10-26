<?php
  session_start();
  if ((!isset($_SESSION['admin'])) || (empty($_SESSION['admin']))){
    header('Location: page_not_found.php');
  }
  require_once 'other_php/connexion_data_base.php';
  require_once 'other_php/get_nombre_livre_categorie.php';
  require_once 'other_php/get_pourcent_user.php';
  require_once 'other_php/get_nombre_visitor.php';
  require_once 'other_php/get_nombre_demande.php';
  ?>
 <!DOCTYPE html>
 <html lang = "en">
   <head>
     <meta charset = "utf-8">
       <meta name = "keywords" content = "Bibliothèque en ligne">
       <meta name =  "author" contet = "Université sesame">
       <meta http-equiv = "refresh" content = "600">
       <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
       <title>Statistiques | Bibliothèque en ligne</title>
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
      <link href = "../css/Chart.min.css" rel = "stylesheet">
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
   <body onload = "loadStatOne();loadStatTwo();loadStatThree();loadStatFour()">
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
                   <?php require_once 'other_php/menu_admin_other.php' ?>
                  </ul>
                 </div>
               </div>
             </div>
           </nav>
           <section class = "banner_area" data-stellar-background-ratio = "0.5">
             <h2>Statistiques</h2>
             <ol class = "breadcrumb">
               <li><a href = "../index.php">Accueil</a></li>
               <li><a href = "statistique_reservation.php" class = "active">Statistiques</a></li>
             </ol>
           </section>
          <section class = "what_we_area row">
            <div class = "container">
              <div class = "tittle wow fadeInUp">
                <h2>Statistiques</h2>
                <canvas id = "chartOne"  style = "height: 370px; max-width: 920px; margin: 0px auto; margin-top:50px;"></canvas>
                <canvas id = "chartTwo"  style = "height: 370px; max-width: 920px; margin: 0px auto; margin-top:50px;"></canvas>
                <canvas id = "chartThree"  style = "height: 370px; max-width: 920px; margin: 0px auto; margin-top:50px;"></canvas>
                <canvas id = "chartFour"  style = "height: 370px; max-width: 920px; margin: 0px auto; margin-top:50px;"></canvas>
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
           <script src = "../js/Chart.bundle.min.js"></script>
           <script src = "../js/Chart.min.js"></script>
           <script>
             function loadStatOne(){
               var ctx = document.getElementById('chartOne').getContext('2d');
               var chart = new Chart(ctx,{
                 type:'bar',
                 data:{
                   labels:<?php echo json_encode($json1); ?>,
                   datasets:[{
                     label:'Nombre des livres par le nom des catégories',
                     backgroundColor:'pink',
                     borderColor:'#fff',
                     borderWidth:1,
                     hoverBackgroundColor:'#FF6500',
                     hoverBorderColor:'#fff',
                     order:'1',
                     borderSkipped:'left',
                     data:<?php echo json_encode($json2); ?>,
                   }]
                 },
                 options:{scales: {
                   yAxes: [{
                     stacked: true
                   }]
                  }
                 }
               });
             }
             function loadStatTwo(){
               var ctx = document.getElementById('chartTwo').getContext('2d');
               var chart = new Chart(ctx,{
                 type: 'doughnut',
                 data:{
                   labels:<?php echo json_encode($json3); ?>,
                   datasets:[{
                     label:'Genre des utilisateurs',
                     backgroundColor:['pink','#82c4c3'],
                     borderColor:'#fff',
                     borderAlign:'inner',
                     borderWidth:3,
                     hoverBorderColor:'#fff',
                     weight:2,
                     hoverBackgroundColor:['#FF6500','yellow'],
                     data:<?php echo json_encode($json4); ?>,
                   }]
                 },
                 options:{scales: {
                   xAxes: [{
                     gridLines: {
                       offsetGridLines: true
                     }
                   }]
                 }}
               });
             }
             function loadStatThree(){
               var ctx = document.getElementById('chartThree').getContext('2d');
               var chart = new Chart(ctx,{
                 type: 'line',
                 data:{
                   labels:<?php echo json_encode($json6); ?>,
                   datasets:[{
                     label:'Nombre des visiteurs par mois',
                     backgroundColor:'#82c4c3',
                     borderColor:'#fff',
                     borderAlign:'inner',
                     borderWidth:3,
                     hoverBorderColor:'#fff',
                     weight:2,
                     hoverBackgroundColor:'#FF6500',
                     data:<?php echo json_encode($json5); ?>,
                   }]
                 },
                 options:{scales: {
                   xAxes: [{
                     gridLines: {
                       offsetGridLines: true
                     }
                   }]
                 }}
               });
             }
             function loadStatFour(){
               var ctx = document.getElementById('chartFour').getContext('2d');
               var chart = new Chart(ctx,{
                 type: 'pie',
                 data:{
                   labels:<?php echo json_encode($json7); ?>,
                   datasets:[{
                     label:'Réservation des livres',
                     backgroundColor:['#82c4c3','pink', '#FF6500'],
                     borderColor:'#fff',
                     borderAlign:'inner',
                     borderWidth:3,
                     hoverBorderColor:'#fff',
                     weight:2,
                     hoverBackgroundColor:['green','yellow', 'red'],
                     data:<?php echo json_encode($json8); ?>,
                   }]
                 },
                 options:{scales: {
                   xAxes: [{
                     gridLines: {
                       offsetGridLines: true
                     }
                   }]
                 }}
               });
             }
           </script>
         </body>
        </html>
