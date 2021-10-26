<?php
  require_once 'connexion_data_base.php';
  $output = '';
  $query = "SELECT * FROM livre_reserve AS l, utilisateur As u WHERE etat_reservation LIKE 'Non évalué' AND u.email_user = l.email_user";

  $result = mysqli_query($cnx, $query);
  $output = '<table class = "table table-striped table-hover table-responsive">
              <tr>
                <th>Date de réservation</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Catégorie</th>
                <th>Etudiant</th>
                <th>Refuser</th>
                <th>Accepter</th>
              </tr>';
  if(mysqli_num_rows($result) > 0){
   while($row = mysqli_fetch_array($result)){
     $output .= '<tr>
                  <td>'.$row['date_reservation'].'</td>
                  <td>'.$row['titre_livre'].'</td>
                  <td>'.$row['auteur_livre'].'</td>
                  <td>'.$row['nom_categorie'].'</td>
                  <td>'.$row['prenom_user']. '&nbsp;' .$row['nom_user'].'</td>
                  <td><a href = "#" onclick = "confirmationDelete(`'.$row['code_reservation'].'`,`'.$row['email_user'].'`)"><i class = "fa fa-remove" aria-hidden = "true" id = "icon_remove" ></i></a></td>
                  <td><a href = "other_php/confirm_demande.php?code='.$row['code_reservation'].'&email='.$row['email_user'].'" ><i class = "fa fa-check" aria-hidden = "true" id = "icon_check" '.$row['code_reservation'].'heck"></i></a></td>
                </tr>';
      }
      $output .= '</table>';
      echo $output;

    }
    else{
      echo 'Aucune demande de réservation trouvé..';
    }
 ?>

 <script>
  function confirmationDelete(code,email){
    $.confirm({
      title: 'Refuser une demande',
      content: 'Vous étes sur de refuser cette demande ?',
      autoClose: 'Annuler|10000',
      buttons: {
        logoutUser: {
          text: 'Refuser',
          action: function () {
            location.href = "other_php/delete_demande.php?code="+code+"&email="+email;
          }
        },
        Annuler: function () {
        }
      }
    });
  }
 </script>
