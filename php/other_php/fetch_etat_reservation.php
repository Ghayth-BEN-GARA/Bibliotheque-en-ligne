<?php
  require_once 'connexion_data_base.php';
  $output = '';
  $email = $_POST['email'];
  $query = "SELECT * FROM livre_reserve WHERE email_user = '$email' ORDER BY date_reservation ASC";

  $result = mysqli_query($cnx, $query);
  $output = '<table class = "table table-striped table-hover table-responsive">
              <tr>
                <th>Date de réservation</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>état</th>
              </tr>';
  if(mysqli_num_rows($result) > 0){
   while($row = mysqli_fetch_array($result)){
     $output .= '<tr>
                  <td>'.$row['date_reservation'].'</td>
                  <td>'.$row['titre_livre'].'</td>
                  <td>'.$row['auteur_livre'].'</td>
                  <td>'.$row['etat_reservation'].'</td>
                </tr>';
      }
      $output .= '</table>';
      echo $output;

    }
    else{
      echo 'Aucune demande trouvé..';
    }
 ?>

 <script>
  function confirmationDelete(code,email){
    $.confirm({
      title: 'Supprimer une demande',
      content: 'Vous étes sur de supprimer cette demande ?',
      autoClose: 'Annuler|10000',
      buttons: {
        logoutUser: {
          text: 'Supprimer',
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
