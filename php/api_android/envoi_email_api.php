<?php
  $email = $_POST['email'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $objet = $_POST['objet'];
  $message = $_POST['message'];

  $mail = new PHPMailer\PHPMailer\PHPMailer();
  $mail ->IsSmtp();
  $mail ->SMTPDebug = 0;
  $mail ->SMTPAuth = true;
  $mail ->SMTPSecure = 'ssl';
  $mail ->Host = 'smtp.gmail.com';
  $mail ->Port = 465;
  $mail ->Timeout = 5;
  $mail ->IsHTML(true);
  $mail ->Username = "miniprojet.groupec@gmail.com";
  $mail ->Password = "miniprojet1234567";
  $mail ->SetFrom("miniprojet.groupec@gmail.com","Bibiliothèque en ligne");
  $mail ->Subject = $objet;
  $mail ->Sender = ("miniprojet.groupec@gmail.com");
  $mail ->Body = "<p>"$message"</p>
          <br>
          <p><b>De :<b/> miniprojet.groupec@gmail.com </p>
          <hr>
          <b>Bibliothèque en ligne</b>";
  $mail ->AddAddress($email);
  $mail ->CharSet = 'UTF-8';
  $mail->send();
 ?>
