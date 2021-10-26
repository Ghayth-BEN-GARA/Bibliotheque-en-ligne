<?php
  require_once 'connexion_data_base.php';
  $image = $_FILES["image"]["tmp_name"];
  $imgContent = addslashes(file_get_contents($image));

  $name = $_FILES["pdf"]["name"];
  $type = $_FILES["pdf"]["type"];
  $data = addslashes(file_get_contents($_FILES["pdf"]["tmp_name"]));

  $name_mp3 = $_FILES["mp3"]["name"];
  $type_mp3 = $_FILES["mp3"]["type"];
  $data_mp3 = addslashes(file_get_contents($_FILES["mp3"]["tmp_name"]));

  $code = $_POST["code"];
  $titre = $_POST["titre"];
  $auteur = $_POST["auteur"];
  $date_imprim = $_POST["date_imprim"];
  $nbr_page = $_POST["nbr_page"];
  $nom_categorie = $_POST["nom_categorie"];

  $sql = "UPDATE livre SET titre = '$titre', auteur = '$auteur', date_imprim = '$date_imprim', nbr_page = '$nbr_page', nom_categorie = '$nom_categorie', image = '$imgContent', name_pdf = '$name', mime_pdf = '$type', data_pdf = '$data',
  name_mp3 = '$name_mp3', mime_mp3 = '$type_mp3', data_mp3 = '$data_mp3' WHERE code_livre = '$code'";
  if (mysqli_query($cnx, $sql)) {
    header('Location: ../gestion_livre.php');
  }
 ?>
