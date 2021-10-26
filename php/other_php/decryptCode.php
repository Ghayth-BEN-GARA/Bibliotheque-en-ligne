<?php
  $code = $_POST['rand'];
  $codedeCrypt = base64_decode($code);
  echo $codedeCrypt;
 ?>
