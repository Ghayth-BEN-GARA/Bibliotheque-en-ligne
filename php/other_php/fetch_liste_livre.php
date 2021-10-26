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
     $output .=  '<div class = "row construction_iner">
                     <div class = "col-md-4 col-sm-6 construction">
                      <div class = "cns-content">
                        <i class = "fa fa-book" aria-hidden = "true"></i>
                          <a href = "">'.$row['titre'].'</a>
                          <p><a href = "affiche_livre.php?code='.$row['code_livre'].'"><button class = "button_all button_all_livre">Informations</button></a></p>
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
