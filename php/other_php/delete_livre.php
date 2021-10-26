<?php
  require_once 'connexion_data_base.php';
  $code_livre = $_POST['code'];
  $query = "DELETE FROM livre WHERE code_livre = '".$code_livre."'";
  $result = $cnx->query($query);
  ?>
