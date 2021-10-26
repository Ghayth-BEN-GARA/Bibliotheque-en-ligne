<?php
  require_once 'connexion_data_base.php';
  $sql = "SELECT curent_date,nbr_visitor FROM visitor";
  $result = mysqli_query($cnx, $sql);
  $json5 = [];
  $json6 = [];
  while($row = mysqli_fetch_array($result)){
   extract($row);
   $json5[] = (int)$nbr_visitor;
   $json6[] = $curent_date;
  }
 ?>
