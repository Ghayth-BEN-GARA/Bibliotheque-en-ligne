<?php
  require_once 'connexion_data_base.php';
  $email = $_POST['email'];
  $password = $_POST['password'];
  $curent_date = date('Y-m-d H:i:s');

  $password_crypt = md5($password);
  $sql = "UPDATE utilisateur SET password_user = '$password_crypt', date_modif_user = '$curent_date' WHERE email_user = '$email'";
  if (mysqli_query($cnx, $sql)) {
    echo "Password modifié";
  }

  else{
    echo "Password non modifié";
  }
 ?>
