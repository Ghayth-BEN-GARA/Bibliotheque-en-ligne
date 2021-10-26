<?php
session_start();
if ((isset($_SESSION['email'])) || (!empty($_SESSION['email']))){
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
      <title>Creer un compte | Bibliothèque en ligne</title>
			<link href = "../images/favicon.png" rel = "icon"  type = "image/x-icon" />
			<link href = "../login_style/vendor/animate/animate.css" rel = "stylesheet" type = "text/css" >
			<link href = "../login_style/vendor/css-hamburgers/hamburgers.min.css" rel = "stylesheet" type = "text/css" >
			<link href = "../login_style/vendor/select2/select2.min.css" rel = "stylesheet" type = "text/css" >
			<link href = "../login_style/css/util.css" rel = "stylesheet" type = "text/css" >
			<link href = "../login_style/css/main.css" rel = "stylesheet" type = "text/css" >
      <link href = "../css/bootstrap.min.css" rel = "stylesheet">
      <link href = "../vendors/animate/animate.css" rel = "stylesheet">
	    <link href = "../vendors/font-awesome/css/font-awesome.min.css" rel = "stylesheet" >
      <link href = "../vendors/camera-slider/camera.css"rel = "stylesheet" >
	    <link href = "../vendors/owl_carousel/owl.carousel.css" rel = "stylesheet" type = "text/css"  media = "all">
	    <link href = "../css/style.css" rel = "stylesheet" type = "text/css"  media = "all" />
      <link href = "../css/sweetalert2.css" rel = "stylesheet" />
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
                    require_once 'other_php/menu_normal_other.php';
                  ?>
								</ul>
							</div>
						</div>
					</div>
				</nav>
				<div class = "limiter">
					<div class = "container-login100">
						<div class = "wrap-login100">
							<div class = "login100-pic js-tilt" data-tilt>
								<img src = "../images/favicon.png" alt = "">
							</div>
							<form class = "login100-form" name = "form_creer_compte" id = "form_creer_compte" method = "POST" action = "#" onsubmit = "return validationForm();">
                <span class = "login100-form-title">
									Creer un compte
								</span>
                <div id = "error_message"></div>
								<div class = "wrap-input100">
									<input class = "input100" type = "email_creer_compte" name = "email_creer_compte" id = "email_creer_compte" placeholder = "Email *" required>
									<span class = "focus-input100"></span>
									<span class = "symbol-input100">
										<i class = "fa fa-envelope" aria-hidden = "true"></i>
									</span>
								</div>
								<div class = "wrap-input100">
									<input class = "input100" type = "password" name = "password_creer_compte" id = "password_creer_compte" placeholder = "Password *" maxlength = "10" required>
									<span class = "focus-input100"></span>
									<span class = "symbol-input100">
										<i class = "fa fa-lock" aria-hidden = "true"></i>
									</span>
                  <span toggle = "#password_creer_compte" class = "fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
                <div class = "wrap-input100">
                  <input class = "input100" type = "text" name = "nom_creer_compte" id = "nom_creer_compte" placeholder = "Nom *" required>
                  <span class = "focus-input100"></span>
                  <span class = "symbol-input100">
                    <i class = "fa fa-user" aria-hidden = "true"></i>
                  </span>
                </div>
                <div class = "wrap-input100">
                  <input class = "input100" type = "text" name = "nom_creer_compte" id = "prenom_creer_compte" placeholder = "Prenom *" required>
                  <span class = "focus-input100"></span>
                  <span class = "symbol-input100">
                    <i class = "fa fa-user" aria-hidden = "true"></i>
                  </span>
                </div>
                <div class = "wrap-input100">
                  <select class = "input100" name = "genre_creer_compte" id = "genre_creer_compte" required>
                    <option disabled selected>Aucun</option>
                    <option>Homme</option>
                    <option>Femme</option>
                  </select>
                  <span class = "focus-input100"></span>
                  <span class = "symbol-input100">
                    <i class = "fa fa fa-intersex" aria-hidden = "true"></i>
                  </span>
                </div>
                <div class = "wrap-input100">
                  <input class = "input100" type = "text" name = "adresse_creer_compte" id = "adresse_creer_compte" placeholder = "Adresse *" required>
                  <span class = "focus-input100"></span>
                    <span class = "symbol-input100">
                    <i class = "fa fa-home" aria-hidden = "true"></i>
                  </span>
                </div>
                <div class = "wrap-input100">
                  <input class = "input100" type = "date" name = "date_naissance_creer_compte" id = "date_naissance_creer_compte" required>
                  <span class = "focus-input100"></span>
                  <span class = "symbol-input100">
                    <i class = "fa fa-calendar-check-o" aria-hidden = "true"></i>
                  </span>
                </div>
                <div class = "wrap-input100">
                  <input class = "input100" type = "number" name = "cin_creer_compte" id = "cin_creer_compte" placeholder = "CIN *" maxlength = "8" required>
                  <span class = "focus-input100"></span>
                  <span class = "symbol-input100">
                    <i class = "fa fa-id-card" aria-hidden = "true"></i>
                  </span>
                </div>
                <div class = "wrap-input100">
                  <input class = "input100" type = "tel" name = "tel_creer_compte" id = "tel_creer_compte" placeholder = "Numéro mobile *" maxlength = "8" required>
                  <span class = "focus-input100"></span>
                  <span class = "symbol-input100">
                    <i class = "fa fa-mobile" aria-hidden = "true"></i>
                  </span>
                </div>
								<div class = "container-login100-form-btn">
									<input class = "login100-form-btn" type = "submit" value = "Créer un compte">
								</div>
							</form>
						</div>
          </div>
				</div>
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
			  <script src = "../login_style/vendor/bootstrap/js/popper.js"></script>
			  <script src = "../login_style/vendor/bootstrap/js/bootstrap.min.js"></script>
			  <script src = "../login_style/vendor/select2/select2.min.js"></script>
			  <script src = "../login_style/vendor/tilt/tilt.jquery.min.js"></script>
			  <script src = "../login_style/js/main.js"></script>
			  <script >
			  	$('.js-tilt').tilt({
			  		scale: 1.1
			  	})
			  </script>
        <script>
          $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
              input.attr("type", "text");
            }
            else {
              input.attr("type", "password");
            }
          });
        </script>
			  <script src = "../js/fonction.js"></script>
			</body>
		</html>
