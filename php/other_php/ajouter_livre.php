<?php
  require_once 'connexion_data_base.php';
  $image = $_FILES["image_livre"]["tmp_name"];
  $imgContent = addslashes(file_get_contents($image));

  $name = $_FILES["pdf_livre"]["name"];
  $type = $_FILES["pdf_livre"]["type"];
  $data = addslashes(file_get_contents($_FILES["pdf_livre"]["tmp_name"]));

  $name_mp4 = $_FILES["mp4_livre"]["name"];
  $type_mp4 = $_FILES["mp4_livre"]["type"];
  $data_mp4 = addslashes(file_get_contents($_FILES["mp4_livre"]["tmp_name"]));

  $name_mp3 = $_FILES["mp3_livre"]["name"];
  $type_mp3 = $_FILES["mp3_livre"]["type"];
  $data_mp3 = addslashes(file_get_contents($_FILES["mp3_livre"]["tmp_name"]));

  $titre = $_POST["titre_livre"];
  $auteur = $_POST["auteur_livre"];
  $date_imprim = $_POST["date_imprim_livre"];
  $nbr_page = $_POST["nbr_page_livre"];
  $categorie = $_POST["categorie_livre"];

  $sql = "INSERT INTO livre (titre, auteur, date_imprim, nbr_page, nom_categorie, image, name_pdf, mime_pdf, data_pdf, name_mp3, mime_mp3, data_mp3)
  VALUES ('$titre', '$auteur', '$date_imprim', '$nbr_page', '$categorie', '$imgContent', '$name', '$type', '$data', '$name_mp3', '$type_mp3', '$data_mp3')";
  $result = $cnx->query($sql);
  header('Location: ../gestion_livre.php');

 ?>
