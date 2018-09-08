<?php
if(isset($_GET['reg_suc'])){
$reg_suc=$_GET["reg_suc"];
}
else {
	$reg_suc="LOGIN";
}
if (isset($_GET['ver'])) {
	$verified = $_GET['ver'];
}
else {
	$verified="nothing";
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
              <li class="nav-item"><a href="signup.php" class="nav-link">SIGN UP</a></li>
              <li class="nav-item"><a href="loginpage.php" class="nav-link active">LOGIN</a></li>
            </ul>
          </div>
        </div>
      </div>|
      <div class="spacer120px">
        <br>
        <h3 class="signup-text">Enter Your Login Details</h1>
          <?php
					if ($reg_suc=="TRUE") {
						// code...
					 	?>
          <p class="text-center text-success"><i class="material-icons">done_all</i>
						<br>You have been Successfully Registered.Check your mail and Activate your Account.</p>
					<?php
				}
				else if($reg_suc=="FALSE") {
					// code...

				 ?>
					<p class=" text-center text-danger">
						<i class="material-icons text-center">
							error
						</i>
						<br>
						There was a Error in Creating your Account.Please try again or contact us at raj.fungus@gmail.com
					</p>
					<?php
				}
				else {
					//do Nothing
				}

				if ($verified=="success") {
 			 	// code...

 				 ?>
 				 <p class="text-success text-center">
  						<i class="material-icons">
  						done_outline
  						</i>
  					<br>
  					Your Email has been Verified.Login with your Credentials Below to Continue.
  				</p>
 				<?php
 			}
 			elseif ($verified=="notfound") {
 				// code...

 			 ?>
 			 <p class="text-danger text-center alr">
 					<i class="material-icons">
 					done_outline
 					</i>
 				<br>
 				Something went wrong.Looks Like you are lost in Space Click here to go <a class="text-white" href="http://localhost:8000/">Home</a>
 			</p>
 			<?php
 		}
 		 ?>

      </div>
      <div class="form text-center">
        <form action="login.php" method="post">
          <input type="text" required=require name="email" value="" placeholder="Enter your Email Address">
          <br>
          <input id="loginpassword" required=require type="password" name="loginpassword" value="" placeholder="Enter your Password">
          <br>
    <!--      <p id="cnf-text" class="text-center"><p class="text-danger st">*</p><p class="text-white">Confirm password and main password do not Match</p><p class=" st text-danger">*</p></p> -->
          <button class="btn submit-btn" type="submit">Login</button>
          <br>
          <p class="text-white alr">Don't have an Account? Register <a href="signup.php">Here</a></p>
					<br><br>
          <p class="text-white alr">Can't Sign in? <a href="forgot.php">Forgot password</a></p>
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
