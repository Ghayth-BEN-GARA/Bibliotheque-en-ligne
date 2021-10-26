<?php
  session_start();
  $admin = $_POST['email'];
  $_SESSION['admin'] = $admin;
?>
