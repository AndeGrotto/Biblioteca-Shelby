<?php
  if(isset($_GET["msg"])) {
    $err = array();
    $err = unserialize($_GET["msg"]);
    $strErr = ":: ";
    foreach ($err as $e)
      $strErr .= $e . " :: ";
    echo "<script>alert(\"$strErr\");</script>";
  }
?>