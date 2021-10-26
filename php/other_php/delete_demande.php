<?php
  require_once 'connexion_data_base.php';
  $code = $_GET['code'];
  $email = $_GET['email'];
  $sql = "UPDATE livre_reserve SET etat_reservation = 'Refusé' WHERE code_reservation = '$code'";
  if (mysqli_query($cnx, $sql)) {
    require '../phpmailer/PHPMailer.php';
    require '../phpmailer/SMTP.php';
    require '../phpmailer/OAuth.php';
    require '../phpmailer/POP3.php';
    require '../phpmailer/Exception.php';

    $sujet = "Demande de réservation";
    $message = "Désolé : Votre demande de réservation a été rejetée pour des raisons externes.";

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
    $mail ->Subject = $sujet;
    $mail ->Sender = ("miniprojet.groupec@gmail.com");
    $mail ->Body = "<p>$message</p>
      <br>
      <p><b>De :<b/> miniprojet.groupec@gmail.com </p>
      <hr>
      <b>Bibliothèque en ligne</b>";
    $mail ->AddAddress($email);
    $mail ->CharSet = 'UTF-8';
    $mail ->send();
    header('Location: ../demandes_reservation.php');
  }
 ?>
