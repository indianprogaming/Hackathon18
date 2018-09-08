<?php
if(isset($_GET['nullval'])){
$nullbool=$_GET["nullval"];
}
else {
	$nullbool="nonull";
}
if (isset($_GET['cnfpass'])) {
	$cnfpass=$_GET['cnfpass'];
}
else{
	$cnfpass="Unknown";
}
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>InfoSeed : Seeding Info Digitally</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Slabo+13px" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"  rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
  </head>
  <body>
    <div class="landing">
      <div class="nav-bar">
        <div class="row nav-row">
          <div class="col-md-4">
            <div class="nav-brand font-weight-light">
              InfoSeed
            </div>
          </div>
          <div class="col-md-8">
            <ul>
              <li class="nav-item"><a href="index.html" class="nav-link ">HOME</a></li>
              <li class="nav-item"><a href="aboutus.html" class="nav-link">ABOUT US</a></li>
              <li class="nav-item"><a href="contactus.html" class="nav-link">CONTACT US</a></li>
							<li class="nav-item"><a href="signup.php" class="nav-link active">SIGN UP</a></li>
              <li class="nav-item"><a href="loginpage.php" class="nav-link">LOGIN</a></li>
            </ul>
          </div>
        </div>
      </div>|
      <div class="spacer120px">
        <br>
        <h3 class="signup-text">Please Enter your Details to Sign up</h1>
					<?php
					if($nullbool=="TRUE") {
						// code...

					 ?>
					<p class=" text-center text-danger">
						<i class="material-icons text-center">
							error
						</i>
						<br>
						Please Make sure you fill all the Entries.
					</p>
					<?php
				}
				else {
					//Do nothing
				}
					 ?>
					 <?php
					 if($cnfpass=="FALSE") {
						 // code...

						?>
					 <p class=" text-center text-danger">
						 <i class="material-icons text-center">
							 error
						 </i>
						 <br>
						 Confirm Password and Password Do not Match
					 </p>
					 <?php
				 }
				 else {
					 //Do nothing
				 }
						?>
      </div>
      <div class="form text-center">
        <form action="register.php" method="post">
          <input type="text" required=require name="name" value="" placeholder="Enter your Full Name">
          <br>
          <input type="text" required=require name="email" value="" placeholder="Enter your Email Address">
          <br>
          <input id="password" required=require type="password" name="password" value="" placeholder="Enter a new Password">
          <br>
         <input id="confirm_password" required=require type="password" name="cnfpassword" value="" placeholder="Confirm Password">
          <br>
    <!--      <p id="cnf-text" class="text-center"><p class="text-danger st">*</p><p class="text-white">Confirm password and main password do not Match</p><p class=" st text-danger">*</p></p> -->
          <button class="btn submit-btn" type="submit">Register</button>
          <br>
          <p class="text-white alr">Already Have an Account? Login <a href="loginpage.php">Here</a></p>
        </form>
      </div>
      <div class="footer">
        <a href="privacy.html">Privacy Policy</a><a href="tnc.html">Terms & condition</a>
      </div>
    </div>

  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</html>
