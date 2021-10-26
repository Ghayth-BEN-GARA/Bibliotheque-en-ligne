<?php
  require_once 'connexion_data_base.php';
  $nomPrenom = $_POST['nom'];
  $email = $_POST['email'];
  $sujet = $_POST['sujet'];
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
  $mail ->Username = 'miniprojet.groupec@gmail.com';
  $mail ->Password = 'miniprojet1234567';
  $mail ->SetFrom($email,$nomPrenom);
  $mail ->Subject = $sujet;
  $mail ->Sender = ($email);
  $mail ->Body = "<p>$message </p>
                  <br>
                  <p><b>De :<b/> $email </p>
                  <hr>
                  <b>Bibliothèque en ligne</b>";
  $mail ->AddAddress('miniprojet.groupec@gmail.com');
  $mail ->CharSet = 'UTF-8';
  $mail->send();
?>
