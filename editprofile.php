<?php
//start session
session_start();
if ($_SESSION['email']=="") {
    header("Location:../logOut.php");
}
if($_SESSION['user_type']!="Publisher"){
        header("Location:../logOut.php");
    }
$_SESSION["active"] = "editprofile";
include '../db_conn.php';
$sql0 = "SELECT * FROM `tbluser` WHERE  `email` =  '" . $_SESSION["email"] . "' AND `userType`='Publisher';";
if ($result0 = mysqli_query($conn, $sql0)) {
    $row = mysqli_fetch_assoc($result0);    
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
    include("../includes/publisherHeader.php");
  ?>

		<br><br>
    <div class="row block-9 justify-content-center mb-1">
          <div class="col-md-7 mb-md-5">
            <?php if (isset($_SESSION['fail_message']) && !empty($_SESSION['fail_message'])) { ?>
            <div class="alert alert-danger alert-dismissible" style="background-color:#ff3333;">
            <button type="button" style="background-color:#ff3333;" class="close" data-dismiss="alert">&times;</button>
            <strong>Unsuccessful!</strong> <?php echo $_SESSION['fail_message']; ?></div>
            <?php unset($_SESSION['fail_message']);}?>

            <?php if (isset($_SESSION['success_message']) && !empty($_SESSION['success_message'])) { ?>
            <div class="alert alert-success alert-dismissible" style="background-color:#03fcc2;">
            <button type="button" style="background-color:#03fcc2;" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> <?php echo $_SESSION['success_message']; ?></div>
            <?php unset($_SESSION['success_message']); }?>
          	<h2 class="text-center"> - Edit Profile -</h2>
            <form class="border p-5 contact-form" name="registerform" action="../actions/confirmEditPublisher.php" method="post" onSubmit="return EditForm()">
              <div class="form-group">
                <h5>- Update Personal Information -</h5>
                <h6> Enter First Name: </h6>
                <input type="text" name="firstName" id="firstName" class="form-control" placeholder="Enter your First Name" value="<?php echo $row['firstName'];?>" required onkeyup="validateName(this)">
              <div class="val" style="color:red;"><label hidden="" for="valF" id="valF"></label></div></div>
              <div class="form-group">
                <h6> Enter Last Name: </h6>
                <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Enter your Last Name" value="<?php echo $row['lastName'];?>" required onkeyup="validateName(this)">
              <div class="val" style="color:red;"><label hidden="" for="valL" id="valL"></label></div></div>
              <div class="form-group">
                <h6> Enter Contact Number: </h6>
                <input type="number" name="contactNumber" id="contactNumber" class="form-control" pattern="[0-9]{9}" placeholder="Enter your contact number" onkeyup="validatePhone(this)" value="<?php echo $row['contactNumber'];?>" required>
              <div class="val" style="color:red;"><label hidden="" for="valNum" id="valNum"></label></div></div>
              <div class="form-group">
                <h6> Select Date of birth: </h6>
                <input type="date" class="form-control" name="dateOfBirth" id="dateOfBirth" value="<?php echo $row['dateOfBirth'];?>" required>
              <div class="val" style="color:red;"><label hidden="" for="valDt" id="valDt"></label></div></div>
              <div class="form-group">
                <h6> Enter your address: </h6>
                <input type="text" name="address" id="address" class="form-control" placeholder="Enter your address" value="<?php echo $row['address'];?>" required onkeyup="validateAddress(this)">
              <div class="val" style="color:red;"><label hidden="" for="valA" id="valA"></label></div></div>
              <div class="form-group">
                <h6> Enter your city: </h6>
                <input type="text" name="city" id="city" class="form-control" placeholder="Enter your city" value="<?php echo $row['city'];?>" required>
              <div class="val" style="color:red;"><label hidden="" for="valC" id="valC"></label></div></div>
              <div class="form-group">
                <h6> Enter postal/ zip code: </h6>
                <input type="text" name="zipCode" id="zipCode" class="form-control" placeholder="Enter postal/ zip code" value="<?php echo $row['zipCode'];?>" required>
              <div class="val" style="color:red;"><label hidden="" for="valZ" id="valZ"></label></div></div>
              <div class="form-group">
                <h6> Select Country: </h6>
                <select name="country" id="country" class="form-control" required>
                  <option value="<?php echo $row['Country'];?>"><?php echo $row['Country'];?></option>
                  <option value="">---Select</option>
                  <option value="Sri lanka">Sri Lanka</option>
                </select>
              <div class="val" style="color:red;"><label hidden="" for="valCn" id="valCn"></label></div></div>
              <h5>- Update Login Information -</h5>
              <div class="form-group">
                <h6> Enter Email ID:</h6>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $row['email'];?>" readonly="" required onkeyup="validateEmail(this)">
              <div class="val" style="color:red;"><label hidden="" for="valN" id="valN"></label></div></div>
              <div class="form-group">
                <h6> Enter Password: </h6>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
              <div class="val" style="color:red;"><label hidden="" for="valP" id="valP"></label></div></div>
              <div class="form-group">
                <h6> Enter New Password: </h6>
                <input type="password" name="newpassword" id="newpassword" class="form-control" placeholder="Enter new password">
              <div class="val" style="color:red;"><label hidden="" for="valNP" id="valNP"></label></div></div>
              <div class="form-group">
                <h6> Confirm New Password: </h6>
                <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Retype password" onkeyup="validatePwd()">
              <div class="val" style="color:red;"><label hidden="" for="valCP" id="valCP"></label></div></div>
              <br>
              <div class="form-group">
                <input type="submit" value="Update" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>
        </div>
  
        
  <?php
    include("../includes/footer.php");}
  ?>


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
        if (document.getElementById('confirmpassword').value == document.getElementById('newpassword').value) {
            document.getElementById('newpassword').style.borderColor = "green";
            document.getElementById('confirmpassword').style.borderColor = "green";
        } else {
            
            document.getElementById('newpassword').style.borderColor = "red";
            document.getElementById('confirmpassword').style.borderColor = "red";
        }
}

    </script>
    <script type="text/javascript">
    function EditForm() {
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
        document.getElementById('valDt').innerHTML = 'Enter your date of birth';
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
        document.getElementById('valC').innerHTML = 'Please enter street address';
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
    
    var pwd = document.getElementById("password").value;
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
    var npwd = document.getElementById("newpassword").value;
    if(npwd!=""){
      var cpwd = document.getElementById("confirmpassword").value;
    if(cpwd==""){
      document.getElementById("confirmpassword").style.borderColor = "red";
      document.getElementById("confirmpassword").focus();
      document.getElementById("valCP").hidden = false;
      document.getElementById("valCP").innerHTML = "Enter your confirmation Password.";
      return false;
    }else{
      document.getElementById("valCP").innerHTML = "";
      document.getElementById("valCP").hidden = true;
      document.getElementById("confirmpassword").style.borderColor = "green";
    }

    if (cpwd == npwd)
    {
        document.getElementById('newpassword').style.borderColor = "green";
        document.getElementById('confirmpassword').style.borderColor = "green";
        document.getElementById('valCP').innerHTML = '';
        document.getElementById("valCP").hidden = true;
    } else
    {
        document.getElementById('valCP').innerHTML = 'Passwords do not match';
        document.getElementById("valCP").hidden = false;
        document.getElementById('newpassword').style.borderColor = "red";
        document.getElementById('confirmpassword').style.borderColor = "red";
        document.getElementById('newpassword').focus();
        document.getElementById('confirmpassword').focus();
        return false;
    }
    }
  }
    </script>
  </body>
</html>

