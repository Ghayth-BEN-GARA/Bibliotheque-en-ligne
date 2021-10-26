<?php
  require_once 'connexion_data_base.php';
  $code = $_GET['code'];
  $query = "SELECT * FROM livre WHERE code_livre = '".$code."'";
  $result = mysqli_query($cnx, $query);
  while($row = mysqli_fetch_array($result)){
    $file = $row['data_pdf'];
    header('content-type: application/pdf');
    header('content-disposition: inline; filename ="'.$row['name_pdf'].'"');
    echo ($row['data_pdf']);
  }
 ?>
