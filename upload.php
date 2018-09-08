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

if ($stepcomplete==2) {


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
          <li class="nav-item"><a  class="nav-link">Perosonal Details</a></li>
          <li class="nav-item"><a  class="nav-link">Academic Details</a></li>
          <li class="nav-item"><a class="nav-link active">Uploading Document</a></li>
        </ul>
      </div>
      <div class="form">
        <form class="realform" action="personal.php" method="post">
          <div class="row">
            <div class="col-md-4">
              <label for="photo">User's Photograph*</label>
              <input type="file" required=required name="photo" id="photo" accept=".jpg, .jpeg, .png">

              <label for="10marksheet">X Marksheet*</label>
              <input type="file" required=required name="10thmarksheet" id="photo" accept=".jpg, .jpeg, .png">

              <label for="12thmarksheet">XII Marksheet*</label>
              <input type="file" required=required name="12thmarksheet" id="photo" accept=".jpg, .jpeg, .png">

              <label for="12thpassing">XII Passing Certificate*</label>
              <input type="file" required=required name="12thpassing" id="photo" accept=".jpg, .jpeg, .png">

              <label for="aadharcard">Aadhaar Card*</label>
              <input type="file" required=required name="aadharcard" id="photo" accept=".jpg, .jpeg, .png">

              <label for="signature">Signature*</label>
              <input type="file" required=require name="signature" id="photo" accept=".jpg, .jpeg, .png">


            </div>
            <div class="col-md-4">
              <label for="gradmarksheet">Graduation Marksheet</label>
              <input type="file" name="gradmarksheet" id="photo" accept=".jpg, .jpeg, .png">

              <label for="provisional">Provisional Certificate</label>
              <input type="file" name="provisional" id="photo" accept=".jpg, .jpeg, .png">

              <label for="postgradmarksheet">Post Gradution Marksheet</label>
              <input type="file" name="postgradmarksheet" id="photo" accept=".jpg, .jpeg, .png">

              <label for="passport">Passport</label>
              <input type="file" name="passport" id="photo" accept=".jpg, .jpeg, .png">

              <label for="passport">Thumb Impression*</label>
              <input type="file" required=require name="passport" id="photo" accept=".jpg, .jpeg, .png">

              <button type="submit" class="btn btn-save" name="button">Submit Details</button>
            </div>
            <div class="col-md-4"></div>
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
elseif ($stepcomplete==0) {
  header("Location: /personal.php?loginmail=".$loginmail);

}
elseif ($stepcomplete==1) {
  header("Location: /academic.php?loginmail=".$loginmail);
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
