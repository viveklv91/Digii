<?php
//start session
session_start();
$_SESSION["active"]="signin";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Negotiate - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
  <?php
    include("includes/header.php");
  ?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Sign In</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Sign In <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

		<br><br>
    <div class="row col-4 offset-4">
      <?php if (isset($_SESSION['fail_message']) && !empty($_SESSION['fail_message'])) { ?>
            <div class="alert alert-danger alert-dismissible" style="background-color:#ff3333;">
            <button type="button" style="background-color:#ff3333;" class="close" data-dismiss="alert">&times;</button>
            <strong>Unsuccessful!</strong> <?php echo $_SESSION['fail_message']; ?></div>
            <?php unset($_SESSION['fail_message']);}?>

            <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
            <div class="alert alert-success alert-dismissible" style="background-color:#33ff33;">
            <button type="button" style="background-color:#33ff33;" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> <?php echo $_SESSION['success_message']; ?></div>
            <?php unset($_SESSION['success_message']); }?></div>
    <div class="row block-9 justify-content-center mb-1">
      
          <div class="col-md-5 mb-md-5">
          	<h2 class="text-center"> Welcome back! <br>Enjoy your day using digii, the smart web optimizer</h2>
            <form action="actions/confirmLogin.php" onSubmit="return validateRegForm()" class="border p-5 contact-form" method="post">
              <h4>Login Form</h4>
              <div class="form-group">
                <h6> Enter Email Address: </h6>
                <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email" >
                <div class="val" style="color:red;"><label hidden="" for="valN" id="valN"></label></div>
              </div>
              <div class="form-group">
                <h6> Enter Password: </h6>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" >
                <div class="val" style="color:red;"><label hidden="" for="valP" id="valP"></label></div>
              </div>
              <br>
              <div class="form-group">
                <input type="submit" value="SIGN IN" class="btn btn-primary py-3 px-5">
              </div>
              <div class="col text-right">
			    		 <a href="register.php" class="btn-link">Don't have an account?</a>
              </div>
            </form>
          
          </div>
        </div>
  
  
  <?php
    include("includes/footer.php");
  ?>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  <script type="text/javascript">
  function validateRegForm()
{
    usnm = document.getElementById("email").value;
    pwd = document.getElementById("password").value;
    if(usnm==""){
      document.getElementById("email").style.borderColor = "red";
      document.getElementById("email").focus();
      document.getElementById("valN").hidden = false;
      document.getElementById("valN").innerHTML = "Enter your username.";
      return false;
    }else{
      document.getElementById("valN").innerHTML = "";
      document.getElementById("valN").hidden = true;
      document.getElementById("email").style.borderColor = "green";
    }
    if(pwd==""){
      document.getElementById("password").style.borderColor = "red";
      document.getElementById("password").focus();
      document.getElementById("valP").hidden = false;
      document.getElementById("valP").innerHTML = "Enter your Password.";
      return false;
    }else{
      document.getElementById("valP").innerHTML = "";
      document.getElementById("valP").hidden = true;
      document.getElementById("password").style.borderColor = "green";
    }
}
</script>    
  </body>
</html>