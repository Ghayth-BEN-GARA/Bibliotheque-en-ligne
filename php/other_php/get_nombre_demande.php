<?php
  require_once 'connexion_data_base.php';
  $sql = "SELECT etat_reservation,COUNT(*) nbr FROM livre_reserve GROUP BY etat_reservation ";
  $result = mysqli_query($cnx, $sql);
  $json7 = [];
  $json8 = [];
  while($row = mysqli_fetch_array($result)){
   extract($row);
   $json7[] = $etat_reservation;
   $json8[] = (int)$nbr;
  }
 ?>
