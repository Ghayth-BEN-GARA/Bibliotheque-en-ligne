<?php
   require_once 'connexion_data_base.php';
   $email = $_POST['email'];
   $requete = "SELECT * FROM utilisateur WHERE email_user = '$email'";
   $result = mysqli_query($cnx,$requete) or die("Erreur : Requéte erroné.");
   if (mysqli_num_rows($result) >0){
     echo "Ancien compte";
   }

   else {
     echo "Nouveau compte";
   }
 ?>
