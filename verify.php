<?php
//Let us load a Few Important other PHP files....
require 'conn.php';

//User Variables Loading through the Link
$keyvalue=$_GET['key'];
$email=$_GET['email'];

//Own Variable in the php
$verificationsuccess=false;

//CREATE SQL Query to Get it up and running
$sqlquery="SELECT * from reguser;";
$result=$conn->query($sqlquery);
if ($result->num_rows > 0) {
  while ($row=$result->fetch_assoc()) {
    if ($email==$row['email']) {
      if ($keyvalue==$row['verification_key']) {
        $verificationsuccess=true;
        break;
      }
    }
    else {
      $verificationsuccess=false;
      continue;
    }
  }
}

if ($verificationsuccess) {
  //code on Verify
    $verified_Query="UPDATE reguser SET verified=1 WHERE email='".$email."';";
    if($conn->query($verified_Query)==TRUE)
    {
    //CODE FOR Successful Verification ...
    //load login page with Successful Verification messsage
    header("Location: /loginpage.php?ver=success");
    }
    else {
      echo "I guess its a Server Error";
    }
}
else {
  //Code for User not Found
  header("Location: /loginpage.php?ver=notfound");

}
?>
