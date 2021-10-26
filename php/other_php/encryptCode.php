<?php
  $code = $_POST['rand'];
  $codeCrypt = base64_encode($code);
  echo $codeCrypt;
 ?>
