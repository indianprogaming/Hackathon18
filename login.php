<?php
require 'conn.php';
$loginmail=$_POST['email'];
$loginpass=$_POST['loginpassword'];
$cryptpass=crypt($loginpass, '$6$rounds=5000$infoseed$'); //THIS IS THE Encrypted PAssword

$id=0;
$stepcomplete=-1;
if ($loginmail!="novalue") {
  $sqlquery="SELECT * from reguser;";
  $result=$conn->query($sqlquery);
  if ($result->num_rows >0) {
    while ($row=$result->fetch_assoc()) {
      if (strtolower($loginmail)==strtolower($row["email"]))
        if (($cryptpass==$row['password'])) {
          if ($row['verified']==1) {
            $id=$row["userid"];
            $stepcomplete=$row["stepcomplete"];
            break;
          }
          else {
            echo "You haven't Verified your Email ID yet Please Verify it and Try Again";
          }
        }
        else {
          echo "Wrong username or Password";
        }
        }
    }
}

if ($stepcomplete==0) {
  header("Location: /personal.php?loginmail=".$loginmail);

}
elseif ($stepcomplete==1) {
  header("Location: /academic.php?loginmail=".$loginmail);

}
elseif ($stepcomplete==2) {
  header("Location: /upload.php?loginmail=".$loginmail);
  // code...
}
elseif ($stepcomplete==3) {
  header("Location: /userpage.php?loginmail=".$loginmail);
}

 ?>
