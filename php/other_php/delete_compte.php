<?php
  require_once 'connexion_data_base.php';
  $email = $_POST['email'];
  $query = "DELETE FROM utilisateur WHERE email_user = '".$email."'";
  $result = $cnx->query($query);
  ?>
