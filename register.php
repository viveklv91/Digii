<?php
//start session
session_start();
$_SESSION["active"]="signup";
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
            <h1 class="mb-2 bread">Sign Up</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Sign Up <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

		<br><br>
    <div class="row block-9 justify-content-center mb-1">
          <div class="col-md-7 mb-md-5">
            <?php if (isset($_SESSION['fail_message']) && !empty($_SESSION['fail_message'])) { ?>
            <div class="alert alert-danger alert-dismissible" style="background-color:#ff3333;">
            <button type="button" style="background-color:#ff3333;" class="close" data-dismiss="alert">&times;</button>
            <strong>Unsuccessful!</strong> <?php echo $_SESSION['fail_message']; ?></div>
            <?php unset($_SESSION['fail_message']);}?>
            <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
            <div class="alert alert-success alert-dismissible" style="background-color:#33ff33;">
            <button type="button" style="background-color:#33ff33;" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> <?php echo $_SESSION['success_message']; ?></div>
            <?php unset($_SESSION['success_message']); }?>

          	<h2 class="text-center"> Register with digii and <br> publish your website easily with our support</h2>
            <form class="border p-5 contact-form" name="registerform" onSubmit="return regForm()" action="actions/confirmRegistration.php" method="post">
              <h4>Advertiser's/ Publisher's Sign Up Form</h4>
              <div class="form-group">
                <h6> Select Account Type: </h6>
                <select class="form-control" name="userType" id="userType" >
                  <option value="">-Select-</option>
                  <option value="Advertiser">Advertiser</option>
                  <option value="Publisher">Publisher</option>
                </select><div class="val" style="color:red;"><label hidden="" for="valT" id="valT"></label></div>
                <br>
                <input type="text" name="domain" id="domain" class="form-control" placeholder="Enter your wesite URL" style="display: none">
              <div class="val" style="color:red;"><label for="valD" hidden id="valD"></label></div></div>
              <div class="form-group">
                <h5>- Personal Information -</h5>
                <h6> Enter First Name: </h6>
                <input type="text" name="firstName" id="firstName" class="form-control" placeholder="Enter your First Name"  onkeyup="validateName(this)">
              <div class="val" style="color:red;"><label for="valF" hidden="" id="valF"></label></div></div>
              <div class="form-group">
                <h6> Enter Last Name: </h6>
                <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Enter your Last Name"  onkeyup="validateName(this)">
              <div class="val" style="color:red;"><label for="valL" hidden="" id="valL"></label></div></div>
              <div class="form-group">
                <h6> Enter Contact Number: </h6>
                <input type="number" name="contactNumber" id="contactNumber" class="form-control" placeholder="Enter your contact number" pattern="[0-9]{9}"  onkeyup="validatePhone(this)">
              <div class="val" style="color:red;"><label for="valNum" hidden="" id="valNum"></label></div></div>
              <div class="form-group">
                <h6> Select Date of birth: </h6>
                <input type="date" class="form-control" name="dateOfBirth" id="dateOfBirth" >
              <div class="val" style="color:red;"><label for="valDt" hidden="" id="valDt"></label></div></div>
              <div class="form-group">
                <h6> Enter your address: </h6>
                <input type="text" name="address" id="address" class="form-control" placeholder="Enter your address"  onkeyup="validateAddress(this)">
              <div class="val" style="color:red;"><label for="valA" hidden="" id="valA"></label></div></div>
              <div class="form-group">
                <h6> Enter your city: </h6>
                <input type="text" name="city" id="city" class="form-control" placeholder="Enter your city" >
              <div class="val" style="color:red;"><label for="valC" hidden="" id="valC"></label></div></div>
              <div class="form-group">
                <h6> Enter postal/ zip code: </h6>
                <input type="text" name="zipCode" id="zipCode" class="form-control" placeholder="Enter postal/ zip code" >
              <div class="val" style="color:red;"><label for="valZ" hidden="" id="valZ"></label></div></div>
              <div class="form-group">
                <h6> Select Country: </h6>
                <select name="country" id="country" class="form-control" >
                  <option value="">---Select</option>
                  <option value="Sri lanka">Sri Lanka</option>
                </select><div class="val" style="color:red;"><label for="valCn" hidden="" id="valCn"></label></div>
              </div>
              <h5>- Login Information -</h5>
              <div class="form-group">
                <h6> Enter Email ID:</h6>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email and this is your username"  onkeyup="validateEmail(this)">
              <div class="val" style="color:red;"><label for="valN" hidden="" id="valN"></label></div></div>
              <div class="form-group">
                <h6> Enter Password: </h6>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" >
              <div class="val" style="color:red;"><label for="valP" hidden="" id="valP"></label></div></div>
              <div class="form-group">
                <h6> Confirm Password: </h6>
                <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Retype password"  onkeyup="validatePwd()">
              <div class="val" style="color:red;"><label for="valCP" hidden="" id="valCP"></label></div></div>
              <br>
              <div class="form-group">
                <input type="submit" value="SIGN UP" class="btn btn-primary py-3 px-5">
              </div>
              <div class="col text-right">
              <a href="login.php" class="btn-link">Have an account?</a> <br>
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
      
    $("#userType").change(function() {
      // Check input( $( this ).val() ) for validity here
      val = $( this ).val();
      if(val == 'Advertiser'){
        $('#domain').show();
      }else{
        $('#domain').hide();
      }
    });
function validateEmail(txt)
{
    txt.value = txt.value.replace(/[^a-zA-Z0-9.@]/g, '');
}
function validateName(txt)
{
    txt.value = txt.value.replace(/[^a-zA-Z.' ]/g, '');
    //document.getElementById('validationAlertN').innerHTML = 'Please enter valid name';
}
function validateAddress(txt)
{
    txt.value = txt.value.replace(/[^a-zA-Z0-9/, -]/g, '');
    //document.getElementById('validationAlertA').innerHTML = 'Please enter valid address';
}
function validateCurrency(txt)
{
    txt.value = txt.value.replace(/[^0-9.,]/g, '');
    //document.getElementById('validationAlertA').innerHTML = 'Please enter valid address';
}
function validatePhone(txt) 
{
    txt.value = txt.value.replace(/[^0-9]/g, '');
}
function validatePwd() {
        if (document.getElementById('confirmpassword').value == document.getElementById('password').value) {
            document.getElementById('password').style.borderColor = "green";
            document.getElementById('confirmpassword').style.borderColor = "green";
        } else {
            
            document.getElementById('password').style.borderColor = "red";
            document.getElementById('confirmpassword').style.borderColor = "red";
        }
}
    </script>
    <script type="text/javascript">
    function regForm() {
    var uType = document.getElementById('userType').value;
    if (uType == "")
    {
        document.getElementById('valT').innerHTML = 'Please select user type';
        document.getElementById('userType').style.borderColor = "red";
        document.getElementById("valT").hidden = false;
        document.getElementById('userType').focus();
        return false;
    } else
    {
        document.getElementById('userType').style.borderColor = "green";
        document.getElementById("valT").hidden = true;
        document.getElementById('valT').innerHTML = '';
    }

    var dom = document.getElementById('domain').value;
    if (document.getElementById('userType').value == "Advertiser"){
      if(dom == ""){
        document.getElementById('valD').innerHTML = 'Please enter domain name';
        document.getElementById("valD").hidden = false;
        document.getElementById('domain').style.borderColor = "red";
        document.getElementById('domain').focus();
        return false;
    } else
    {
        var re = new RegExp(/^((?:(?:(?:\w[\.\-\+]?)*)\w)+)((?:(?:(?:\w[\.\-\+]?){0,62})\w)+)\.(\w{2,6})$/); 
        var v = dom.match(re);
        if(v){
        document.getElementById('domain').style.borderColor = "green";
        document.getElementById('valD').innerHTML = '';
        document.getElementById("valD").hidden = true;
      }else{
        document.getElementById('valD').innerHTML = 'Please enter a valid domain name';
        document.getElementById('domain').style.borderColor = "red";
        document.getElementById("valD").hidden = false;
        document.getElementById('domain').focus();
        return false;
      }
    }
    }

    var fName = document.getElementById('firstName').value;
    if (fName == "")
    {
        document.getElementById('valF').innerHTML = 'Please enter first name';
        document.getElementById("valF").hidden = false;
        document.getElementById('firstName').style.borderColor = "red";
        document.getElementById('firstName').focus();
        return false;
    } else
    {
        document.getElementById('firstName').style.borderColor = "green";
        document.getElementById('valF').innerHTML = '';
        document.getElementById("valF").hidden = true;
    }
    if (fName.length >= 3 && fName.length <= 50)
    {
        document.getElementById('firstName').style.borderColor = "green";
        document.getElementById('valF').innerHTML = '';
        document.getElementById("valF").hidden = true;
    } else
    {
        document.getElementById('valF').innerHTML = 'Please enter a valid first name';
        document.getElementById('firstName').style.borderColor = "red";
        document.getElementById('firstName').focus();
        document.getElementById("valF").hidden = false;
        return false;
    }
    var lName = document.getElementById('lastName').value;
    if (lName == "")
    {
        document.getElementById('valL').innerHTML = 'Please enter last name';
        document.getElementById("valL").hidden = false;
        document.getElementById('lastName').style.borderColor = "red";
        document.getElementById('lastName').focus();
        return false;
    } else
    {
        document.getElementById('lastName').style.borderColor = "green";
        document.getElementById('valL').innerHTML = '';
        document.getElementById("valL").hidden = true;
    }
    if (lName.length >= 3 && lName.length <= 50)
    {
        document.getElementById('lastName').style.borderColor = "green";
        document.getElementById('valL').innerHTML = '';
        document.getElementById("valL").hidden = true;
    } else
    {
        document.getElementById('valL').innerHTML = 'Please enter a valid last name';
        document.getElementById('lastName').style.borderColor = "red";
        document.getElementById('lastName').focus();
        document.getElementById("valL").hidden = false;
        return false;
    }
    var mobNo = document.getElementById('contactNumber').value;
    if (mobNo == "")
    {
        document.getElementById('valNum').innerHTML = 'Please enter your mobile number';
        document.getElementById("valNum").hidden = false;
        document.getElementById('contactNumber').style.borderColor = "red";
        document.getElementById('contactNumber').focus();
        return false;
    } else
    {
        document.getElementById('contactNumber').style.borderColor = "green";
        document.getElementById("valNum").hidden = true;
        document.getElementById('valNum').innerHTML = '';
    }
    if (mobNo.length == 9)
    {
        document.getElementById('contactNumber').style.borderColor = "green";
        document.getElementById("valNum").hidden = true;
        document.getElementById('valNum').innerHTML = '';
    } else
    {
        document.getElementById('valNum').innerHTML = 'Please enter a valid mobile number';
        document.getElementById("valNum").hidden = false;
        document.getElementById('contactNumber').style.borderColor = "red";
        document.getElementById('contactNumber').focus();
        return false;
    }

    var dob = document.getElementById('dateOfBirth').value;
    var dobYear = dob.split("-");
    var current = new Date();
    if (dob=="") {
        document.getElementById('valDt').innerHTML = 'Please enter your date of birth';
        document.getElementById("valDt").hidden = false;
        document.getElementById('dateOfBirth').style.borderColor = "red";
        document.getElementById('dateOfBirth').focus();
        return false;
    } else {
        document.getElementById('dateOfBirth').style.borderColor = "green";
        document.getElementById("valDt").hidden = true;
        document.getElementById('valDt').innerHTML = '';
    }
    if (current.getFullYear() - dobYear[0] < 18) {
        document.getElementById('valDt').innerHTML = 'You should be more than 18 years to register';
        document.getElementById("valDt").hidden = false;
        document.getElementById('dateOfBirth').style.borderColor = "red";
        document.getElementById('dateOfBirth').focus();
        return false;
    } else {
        document.getElementById('dateOfBirth').style.borderColor = "green";
        document.getElementById("valDt").hidden = true;
        document.getElementById('valDt').innerHTML = '';
    }
    var stAdrs = document.getElementById('address').value;
    if (stAdrs == "")
    {
        document.getElementById('valA').innerHTML = 'Please enter street address';
        document.getElementById("valA").hidden = false;
        document.getElementById('address').style.borderColor = "red";
        document.getElementById('address').focus();
        return false;
    } else
    {
        document.getElementById('address').style.borderColor = "green";
        document.getElementById("valA").hidden = true;
        document.getElementById('valA').innerHTML = '';
    }
    var city = document.getElementById('city').value;
    if (city == "")
    {
        document.getElementById('valC').innerHTML = 'Please enter city';
        document.getElementById("valC").hidden = false;
        document.getElementById('city').style.borderColor = "red";
        document.getElementById('city').focus();
        return false;
    } else
    {
        document.getElementById('city').style.borderColor = "green";
        document.getElementById("valC").hidden = true;
        document.getElementById('valC').innerHTML = '';
    }
    var zip = document.getElementById('zipCode').value;
    if (zip == "")
    {
        document.getElementById('valZ').innerHTML = 'Please enter zipcode';
        document.getElementById("valZ").hidden = false;
        document.getElementById('zipCode').style.borderColor = "red";
        document.getElementById('zipCode').focus();
        return false;
    } else
    {
        document.getElementById('zipCode').style.borderColor = "green";
        document.getElementById("valZ").hidden = true;
        document.getElementById('valZ').innerHTML = '';
    }
    var zip = document.getElementById('zipCode').value;
    if (zip.length <5)
    {
        document.getElementById('valZ').innerHTML = 'Please enter a valid zipcode';
        document.getElementById("valZ").hidden = false;
        document.getElementById('zipCode').style.borderColor = "red";
        document.getElementById('zipCode').focus();
        return false;
    } else
    {
        document.getElementById('zipCode').style.borderColor = "green";
        document.getElementById("valZ").hidden = true;
        document.getElementById('valZ').innerHTML = '';
    }
    var cntry = document.getElementById('country').value;
    if (cntry == "")
    {
        document.getElementById('valCn').innerHTML = 'Please select a country';
        document.getElementById("valCn").hidden = false;
        document.getElementById('country').style.borderColor = "red";
        document.getElementById('country').focus();
        return false;
    } else
    {
        document.getElementById('country').style.borderColor = "green";
        document.getElementById("valCn").hidden = true;
        document.getElementById('valCn').innerHTML = '';
    }

    var usnm = document.getElementById("email").value;
    var mailformat = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
    if(usnm==""){
      document.getElementById("email").style.borderColor = "red";
      document.getElementById("email").focus();
      document.getElementById("valN").hidden = false;
      document.getElementById("valN").innerHTML = "Please enter your email.";
      return false;
    }else{
      document.getElementById("valN").innerHTML = "";
      document.getElementById("valN").hidden = true;
      document.getElementById("email").style.borderColor = "green";
    }
    if(usnm.match(!mailformat)){
      document.getElementById("email").style.borderColor = "red";
      document.getElementById("email").focus();
      document.getElementById("valN").hidden = false;
      document.getElementById("valN").innerHTML = "Please enter a valid email.";
      return false;
    }else{
      document.getElementById("valN").innerHTML = "";
      document.getElementById("valN").hidden = true;
      document.getElementById("email").style.borderColor = "green";
    }

    var pwd = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
    var pwd = document.getElementById("password").value;
    if(pwd==""){
      document.getElementById("password").style.borderColor = "red";
      document.getElementById("password").focus();
      document.getElementById("valP").hidden = false;
      document.getElementById("valP").innerHTML = "Please enter your Password.";
      return false;
    }else{
      document.getElementById("valP").innerHTML = "";
      document.getElementById("valP").hidden = true;
      document.getElementById("password").style.borderColor = "green";
    }
    var cpwd = document.getElementById("confirmpassword").value;
    if(cpwd==""){
      document.getElementById("confirmpassword").style.borderColor = "red";
      document.getElementById("confirmpassword").focus();
      document.getElementById("valCP").hidden = false;
      document.getElementById("valCP").innerHTML = "Please enter your confirmation Password.";
      return false;
    }else{
      document.getElementById("valCP").innerHTML = "";
      document.getElementById("valCP").hidden = true;
      document.getElementById("confirmpassword").style.borderColor = "green";
    }

    if (cpwd == pwd)
    {
        document.getElementById('password').style.borderColor = "green";
        document.getElementById('confirmpassword').style.borderColor = "green";
        document.getElementById('valCP').innerHTML = '';
        document.getElementById("valCP").hidden = true;
    } else
    {
        document.getElementById('valCP').innerHTML = 'Passwords do not match';
        document.getElementById("valCP").hidden = false;
        document.getElementById('password').style.borderColor = "red";
        document.getElementById('confirmpassword').style.borderColor = "red";
        document.getElementById('password').focus();
        document.getElementById('confirmpassword').focus();
        return false;
    }
  }
    </script>
  </body>
</html>