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

if ($stepcomplete==0) {


 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Slabo+13px" rel="stylesheet">

    <link rel="stylesheet" href="/css/style2.css">
    <title>Detail Feeder</title>
  </head>
  <body>
    <div class="landing">
      <div class="dashboard-brand text-center">
          <div class="brand">InfoSeed</div>
      </div>
      <div class="nav-bar text-center">
        <ul>
          <li class="nav-item"><a  class="nav-link active">Perosonal Details</a></li>
          <li class="nav-item"><a  class="nav-link">Academic Details</a></li>
          <li class="nav-item"><a  class="nav-link">Uploading Document</a></li>
        </ul>
      </div>
      <div class="form">
        <form class="realform" action="personaladd.php" method="post">
          <div class="row">
            <div class="col-md-4">
              <label for="firstname">First Name* : </label>
              <input type="text" name="firstname" required="required" value="">

              <label for="lastname">Last Name : </label>
              <input type="text" name="lastname" value="">

              <label for="gender">Gender* : </label>
              <select name="gender" required="required">
                 <option value="Male">Male</option>
                 <option value="Female">Female</option>
              </select>

              <label for="aadhar">Aadhar Card Number*</label>
              <input type="text" name="aadhar" required="required" value="">
              <label for="emailid">Email ID*</label>
              <input type="text" name="emailid" required="required" value="<?php echo $loginmail ?>">
              <label for="mobile">Mobile Number*</label>
              <input type="text" name="mobile" required="required" value="">
              <input type="text" name="userid" value="<?php echo $id;?>" style="visibility:hidden;">
            </div>
            <div class="col-md-4">
              <label for="fathername">Father's Name*</label>
              <input type="text" name="fathername" required="required" value="">
              <label for="fatheroccupation">Father's Occupation*</label>
              <input type="text" name="fatheroccupation" required="required" value="">
              <label for="mothername">Mother's Name*</label>
              <input type="text" name="mothername" required="required" value="">
              <label for="motheroccupation">Mother's Occupation*</label>
              <input type="text" name="motheroccupation" required="required" value="">
              <label for="address">Permanent Address*</label>
              <input class="address" type="text" name="address" required="required" value="">
            </div>
            <div class="col-md-4">
              <button type="submit" class="btn btn-save">Save and Next</button>
            </div>
          </div>

        </form>
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
elseif ($stepcomplete==3) {
  header("Location: /userpage.php?loginmail=".$loginmail);
}
else {
  Echo "Lost in Space";
}
}
?>
