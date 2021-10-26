<?php
  require_once 'connexion_data_base.php';
  $email = $_POST['email'];
  $titre = $_POST['titre'];
  $auteur= $_POST['auteur'];
  $categorie = $_POST['categorie'];
  $curent_date = date('Y-m-d H:i:s');

  $sql = "INSERT INTO livre_reserve (date_reservation, titre_livre, auteur_livre, nom_categorie, email_user)
      VALUES ('$curent_date', '$titre', '$auteur', '$categorie', '$email')";

  if (mysqli_query($cnx, $sql)) {
    echo "Livre réservé";
  }

  else{
    echo "Livre non réservé";
  }
 ?>
