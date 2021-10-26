<?php
  require_once 'connexion_data_base.php';
  $output = '';
  if(isset($_POST["query"])){
   $search = mysqli_real_escape_string($cnx, $_POST["query"]);
   $query = "SELECT * FROM utilisateur WHERE email_user LIKE '%".$search."%' OR nom_user LIKE '%".$search."%' OR prenom_user LIKE '%".$search."%' OR cin_user LIKE '%".$search."%'";
 }
 else{
   $query = "SELECT * FROM utilisateur ORDER BY prenom_user";
 }

 $result = mysqli_query($cnx, $query);
 if(mysqli_num_rows($result) > 0){
   while($row = mysqli_fetch_array($result)){
     $output .= '<div class = "blog_tow_row">
                  <div class = "col-md-4 col-sm-6">
                    <div class = "renovation">
                      <img src = "../images/sesame.jpg" alt = "">
                      <div class = "renovation_content">
                        <a class = "clipboard" href = "#" onclick = "ouvriModalModifier(`'.$row['email_user'].'`, `'.$row['prenom_user'].'`, `'.$row['nom_user'].'`, `'.$row['genre_user'].'`, `'.$row['adresse_user'].'`, `'.$row['date_naissance_user'].'`, `'.$row['cin_user'].'`, `'.$row['mobile_user'].'`,
                         `'.$row['date_creation_user'].'`)"><i class = "fa fa-edit" aria-hidden = "true"></i></a>
                        <a href = "#" class = "clipboard clipboard_del" href = "#" onclick = "deleteCompte(`'.$row['email_user'].'`)"><i  class = "fa fa-trash" aria-hidden = "true"></i></a>
                        <a class = "tittle" href = "#">'.$row["prenom_user"].' '.$row["nom_user"].'</a>
                        <div class = "date_comment">
                          <a href = "#"><i class = "fa fa-calendar" aria-hidden = "true"></i>'.$row["date_creation_user"].'</a>
                        </div>
                        <p><i class = "fa fa-envelope-o liste_compte_champ" aria-hidden = "true"></i>'.$row["email_user"].'</p>
                        <p><i class = "fa fa-intersex liste_compte_champ" aria-hidden = "true"></i>'.$row["genre_user"].'</p>
                        <p><i class = "fa fa-home liste_compte_champ" aria-hidden = "true"></i>'.$row["adresse_user"].'</p>
                        <p><i class = "fa fa-calendar-check-o liste_compte_champ" aria-hidden = "true"></i>'.$row["date_naissance_user"].'</p>
                        <p><i class = "fa fa-id-card liste_compte_champ" aria-hidden = "true"></i>'.$row["cin_user"].'</p>
                        <p><i class = "fa fa-mobile liste_compte_champ" aria-hidden = "true"></i>'.$row["mobile_user"].'</p>
                      </div>
                    </div>
                </div>
              </div>';
      }
      echo $output;
    }
    else{
      echo 'Aucun compte trouvé..';
    }
 ?>
