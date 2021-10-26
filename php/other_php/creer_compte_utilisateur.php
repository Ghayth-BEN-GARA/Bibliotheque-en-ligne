<?php
  require_once 'connexion_data_base.php';;
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $genre = $_POST['genre'];
  $adresse = $_POST['adresse'];
  $dateNaissance = $_POST['dateNaissance'];
  $cin = $_POST['cin'];
  $tel = $_POST['tel'];
  $curent_date = date('Y-m-d H:i:s');

  $sql = "INSERT INTO utilisateur (email_user, password_user, nom_user, prenom_user, genre_user, adresse_user, date_naissance_user, cin_user, mobile_user, date_creation_user)
      VALUES ('$email', '$password', '$nom', '$prenom', '$genre', '$adresse', '$dateNaissance', '$cin', '$tel', '$curent_date')";

  if (mysqli_query($cnx, $sql)) {
    echo "Compte creer";
  }

  else{
    echo "Compte non creer";
  }
 ?>
