<?php
  require_once 'connexion_data_base.php';
  $code_livre = $_POST['code'];
  $sql = "SELECT * FROM livre WHERE code_livre = '$code_livre'";
  $result = $cnx->query($sql);

  while($row = $result->fetch_array()) {
    $output['code'] = $row['code_livre'];
    $output['titre'] = $row['titre'];
    $output['auteur'] = $row['auteur'];
    $output['date_imprim'] = $row['date_imprim'];
    $output['nbr_page'] = $row['nbr_page'];
    $output['nom_categorie'] = $row['nom_categorie'];
    $output['name_pdf'] = $row['name_pdf'];
  }
  echo json_encode($output);
?>
