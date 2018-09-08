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

if ($stepcomplete==1) {


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
          <li class="nav-item"><a class="nav-link">Perosonal Details</a></li>
          <li class="nav-item"><a class="nav-link active">Academic Details</a></li>
          <li class="nav-item"><a class="nav-link">Uploading Document</a></li>
        </ul>
      </div>
      <div class="form">
        <form class="realform" action="personal.php" method="post">
          <div class="row">
            <div class="col-md-4">
              <label for="10thper">X Percentage*</label>
              <input type="text" name="10thper" required="required" value="">

              <label for="10thboard">X Board*</label>
              <input type="text" name="10thboard" required=required value="">

              <label for="10thyear">Year of Passing*</label>
              <select name="10thyear" required="required">
                 <option value="2011">2011</option>
                 <option value="2012">2012</option>
                 <option value="2013">2013</option>
                 <option value="2014">2014</option>
                 <option value="2015">2015</option>
                 <option value="2016">2016</option>
                 <option value="2017">2017</option>
                 <option value="2018">2018</option>
              </select>

              <label for="12thper">XII Percentage*</label>
              <input type="text" name="12thper" required="required" value="">
              <label for="12thboard">XII Board*</label>
              <input type="text" name="12thboard" required="required" value="">
              <label for="12thyear">Year of Passing*</label>
              <select name="12thyear" required="required">
                 <option value="2011">2011</option>
                 <option value="2012">2012</option>
                 <option value="2013">2013</option>
                 <option value="2014">2014</option>
                 <option value="2015">2015</option>
                 <option value="2016">2016</option>
                 <option value="2017">2017</option>
                 <option value="2018">2018</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="12thstream">XII Stream*</label>
              <input type="text" name="12thstream" required="required" value="">
              <label for="gap">Is There any Gap*</label>
              <select class="" name="gap">
                <option value="no">No</option>
                <option value="yes">Yes</option>
              </select>
              <label for="gradper">Graduation Percentage</label>
              <input type="text" name="gradper" value="">
              <label for="gradcollege">Graduation College</label>
              <input type="text" name="gradcollege" value="">
              <label for="gradyear">Gradution Year</label>
              <input class="" type="text" name="gradyear" value="">
              <label for="furtherstudies">Describe Any Further Studies</label>
              <input class="" type="text" name="furtherstudies" value="">
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
elseif ($stepcomplete==0) {
  header("Location: /personal.php?loginmail=".$loginmail);

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
