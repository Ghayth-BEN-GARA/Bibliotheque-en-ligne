<?php
  require_once 'connexion_data_base.php';
  $sql = "SELECT nom_categorie,COUNT(*) nbr FROM livre GROUP BY nom_categorie ";
  $result = mysqli_query($cnx, $sql);
  $json1 = [];
  $json2 = [];
  while($row = mysqli_fetch_array($result)){
   extract($row);
   $json1[] = $nom_categorie;
   $json2[] = (int)$nbr;
  }
 ?>
