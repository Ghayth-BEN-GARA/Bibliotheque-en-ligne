<?php
  require_once 'connexion_data_base.php';
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $genre = $_POST['genre'];
  $adresse = $_POST['adresse'];
  $date_naissance = $_POST['date_naissance'];
  $cin = $_POST['cin'];
  $mobile = $_POST['mobile'];
  $email = $_POST['email'];
  $curent_date = date('Y-m-d H:i:s');

  $sql = "UPDATE utilisateur SET nom_user = '$nom', prenom_user = '$prenom', genre_user = '$genre', adresse_user = '$adresse', date_naissance_user = '$date_naissance', cin_user = '$cin', mobile_user = '$mobile', date_modif_user = '$curent_date' WHERE email_user = '$email'";
  if (mysqli_query($cnx, $sql)) {
    echo "Compte modifié";
  }

  else{
    echo "Compte non modifié";
  }
 ?>
