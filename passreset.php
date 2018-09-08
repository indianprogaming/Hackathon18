<?php
require 'conn.php';
require 'spclfun.php';

//loading Variables
if (isset($_GET['key']) && isset($_GET['email'])) {
  $keyval=isset($_GET['key']);
  $email=isset($_GET['email']);
}
$requ=false;
//Let's See if Requested
$sqlquery="SELECT * from resetreq;";
$result=$conn->query($sqlquery);
if ($result->num_rows >0) {
  while ($row=$result->fetch_assoc()) {
    if ((strtolower($email)==strtolower($row["email"]))) {
      $requ=true;
      break;
    }
    else {
      $requ=false;
      continue;
    }
  }
}
if ($requ) {
  header("Location: /forgot.php?resetpass=TRUE&email=".$email);
}
else {
  header("Location: /forgot.php?resetpass=FALSE");

}
 ?>
