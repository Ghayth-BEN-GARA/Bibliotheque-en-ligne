<?php
   require_once 'connexion_data_base.php';
   $email = $_POST['email'];
   $password = md5($_POST['password']);
   $requete = "SELECT * FROM utilisateur WHERE email_user = '$email' AND password_user = '$password'";
   $result = mysqli_query($cnx,$requete) or die("Erreur : Requéte erroné.");
   if (mysqli_num_rows($result) >0){
     echo "Compte existe";
   }

   else {
     echo "Compte existe pas";
   }
 ?>
