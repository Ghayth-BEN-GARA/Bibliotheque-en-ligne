<?php
  session_start();
  $email = $_POST['email'];
  $_SESSION["email"] = $email;

  require_once 'connexion_data_base.php';
  $curent_date = date('Y-m');
  $query = "SELECT * FROM visitor WHERE curent_date = '$curent_date'";
  $result = mysqli_query($cnx, $query);
  if(mysqli_num_rows($result) > 0){
    $sql = "UPDATE visitor SET nbr_visitor = nbr_visitor+1 WHERE curent_date = '$curent_date'";
    $resultat = mysqli_query($cnx, $sql);
  }
  else if (mysqli_num_rows($result) <1){
    $sql2 = "INSERT INTO visitor(curent_date, nbr_visitor)
        VALUES ('$curent_date', '1')";
    $resultat2 = mysqli_query($cnx, $sql2);
  }
?>
