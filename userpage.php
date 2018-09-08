<?php
require 'conn.php';
$id=0;
$stepcomplete=-1;
if(isset($_GET['loginmail'])) {
  $loginmail = $_GET['loginmail'];
}
else {
  $loginmail = "novalue";
}

if ($loginmail!="novalue") {
  $sqlquery="SELECT * from reguser;";
  $result=$conn->query($sqlquery);
  if ($result->num_rows >0) {
    while ($row=$result->fetch_assoc()) {
      if (strtolower($loginmail)==strtolower($row["email"])) {
        $id=$row["userid"];
        $stepcomplete=$row["stepcomplete"];
        break;
        }
    }
}
$sqlquery1="SELECT * from details where userid=".$id;
$result1=$conn->query($sqlquery1);
if ($result1->num_rows >0) {
  while ($row1=$result1->fetch_assoc()) {
    $name=$row1['fname']." ".$row1['lname'];
    $gender=$row1['gender'];
    $aadhar=$row1['aadhar'];
    $email=$row1['email'];
    $mobile=$row1['mobile'];
    $fathername=$row1['fathername'];
    $fatheroccupation=$row1['fatheroccupation'];
    $mothername=$row1['mothername'];
    $motheroccupation=$row1['motheroccupation'];
    $address=$row1['address'];
    $picurl=$row1['photo'];
    $signurl=$row1['signpic'];
  }
}

if ($stepcomplete==3) {
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Infoseed : User Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Slabo+13px" rel="stylesheet">
    <link rel="stylesheet" href="/css/style2.css">
  </head>
  <body>
    <div class="landing">
      <div class="dashboard-brand text-center">
          <div class="brand">InfoSeed</div>
      </div>
      <div class="hero display-4 text-center">
      <b>User ID : </b><?php echo " ".$id; ?>
      </div>
      <div class="row profile">
        <div class="col-md-6">
          <ol>
            <li><b>Name               :</b><?php echo "  \t \t  ".$name;?></li>
            <li><b>Gender             :</b><?php echo "  \t \t  ".$gender;?></li>
            <li><b>Phone No.          :</b><?php echo "  \t \t  ".$mobile;?></li>
            <li><b>Father's Name      :</b><?php echo "  \t \t  ".$fathername;?></li>
            <li><b>Mother's Name      :</b><?php echo "  \t \t  ".$mothername;?></li>
            <li><b>Father's Occupation:</b><?php echo "  \t \t  ".$fatheroccupation;?></li>
            <li><b>Mother's Occupation:</b><?php echo "  \t \t  ".$motheroccupation;?></li>
            <li><b>Permanent Address  :</b><?php echo "  \t \t  ".$address;?></li>
            <li><b>Email ID           :</b><?php echo "  \t \t  ".$email;?></li>
            <li><b>Aadhar Card        :</b><?php echo "  \t \t  ".$aadhar;?></li>
          </ol>
        </div>
        <div class="col-md-6 text-right">
          <img src="<?php echo $picurl ?>" alt="" class="userphoto">
          <br>
          <img src="<?php echo $signurl ?>" alt="" class="signphoto">
        </div>
      </div>
    </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</html>

<?php
}
elseif ($stepcomplete==1) {
  header("Location: /academic.php?loginmail=".$loginmail);

}
elseif ($stepcomplete==2) {
  header("Location: /upload.php?loginmail=".$loginmail);
  // code...
}
elseif ($stepcomplete==0) {
  header("Location: /personal.php?loginmail=".$loginmail);
}
else {
  Echo "Lost in Space";
}
}
?>
