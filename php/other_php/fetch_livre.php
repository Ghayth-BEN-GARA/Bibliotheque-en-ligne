<?php
  require_once 'connexion_data_base.php';
  $output = '';
  $categorie = $_POST['categorie'];
  if(isset($_POST["query"])){
   $search = mysqli_real_escape_string($cnx, $_POST["query"]);
   $query = "SELECT * FROM livre WHERE titre LIKE '%".$search."%' AND nom_categorie LIKE '".$categorie."'";
 }
 else{
   $query = "SELECT * FROM livre WHERE nom_categorie LIKE '".$categorie."' ORDER BY titre";
 }

 $result = mysqli_query($cnx, $query);
 if(mysqli_num_rows($result) > 0){
   while($row = mysqli_fetch_array($result)){
     $output .= '<div class = "blog_tow_row">
                  <div class = "col-md-4 col-sm-6">
                    <div class = "renovation">
                      <img src = "data:image;base64,'.base64_encode($row['image']).'" alt = "">
                      <div class = "renovation_content">
                        <a class = "clipboard" href = "#" onclick = "getLivre(`'.$row['code_livre'].'`)" ><i class = "fa fa-edit" aria-hidden = "true"></i></a>
                        <a href = "#" class = "clipboard clipboard_del" href = "#" onclick = "deleteLivre(`'.$row['code_livre'].'`)"><i  class = "fa fa-trash" aria-hidden = "true"></i></a>
                        <a class = "tittle" href = "#">'.$row["titre"].'</a>
                        <div class = "date_comment">
                          <a href = "#"><i class = "fa fa-user" aria-hidden = "true"></i>'.$row["auteur"].'</a>
                        </div>
                        <p><i class = "fa fa-calendar liste_compte_champ" aria-hidden = "true"></i>'.$row["date_imprim"].'</p>
                        <p><i class = "fa fa-file liste_compte_champ" aria-hidden = "true"></i>'.$row["nbr_page"].' pages</p>
                        <p><i class = "fa fa-book liste_compte_champ" aria-hidden = "true"></i>'.$row["nom_categorie"].'</p>
                        <base target="_parent">
                          <a href = "other_php/telechargerPDF.php?code='.$row['code_livre'].'" download>Télécharger la version PDF</a>
                          <br>
                          <a href = "other_php/telechargerMP3.php?code='.$row['code_livre'].'" download>Télécharger la version MP3</a>
                        </base>
                      </div>
                    </div>
                </div>
              </div>';
      }
      echo $output;
    }
    else{
      echo 'Aucun livre de '.$categorie.' trouvé..';
    }
 ?>
