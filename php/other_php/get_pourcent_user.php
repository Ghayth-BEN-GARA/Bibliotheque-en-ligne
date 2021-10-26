<?php
  require_once 'connexion_data_base.php';
  $sql = "SELECT genre_user,COUNT(*) nbr FROM utilisateur GROUP BY genre_user ";
  $result = mysqli_query($cnx, $sql);
  $json3 = [];
  $json4 = [];
  while($row = mysqli_fetch_array($result)){
   extract($row);
   $json3[] = $genre_user;
   $json4[] = (int)$nbr;
  }
 ?>
