<?php
//start session
session_start();
if ($_SESSION['email']=="") {
    header("Location:../logOut.php");
}
if($_SESSION['user_type']!="Advertiser"){
        header("Location:../logOut.php");
    }
$_SESSION["active"] = "registerwebsites";
include '../db_conn.php';
$sql0 = "SELECT * FROM `tbluser` WHERE  `email` =  '" . $_SESSION["email"] . "' AND `userType`='Advertiser';";
if ($result0 = mysqli_query($conn, $sql0)) {
    $row0 = mysqli_fetch_assoc($result0);
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
    include("../includes/advertiserHeader.php");
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
          	<h2 class="text-center"> - Register Website -</h2>
            <?php $sql="SELECT * FROM `tblregisteredwebsite` WHERE  `userID` =  '" . $_SESSION["user_id"] ."';";
                 if ($result = mysqli_query($conn, $sql)) {
                if(!(mysqli_num_rows($result) > 0)){
                  echo '<form enctype="multipart/form-data" class="border p-5 contact-form" onSubmit="return regWeb()" name="registerform" action="../actions/confirmRegisterWebsite.php" method="post">
              <div class="form-group">
                <h6>My Website URL</h6>
                <input type="text" name="webURL" id="webURL" class="form-control" readonly placeholder="" value='.$row0['domain'].' >
              </div>
              <div class="form-group">
                <h6>My Website Name</h6>
                <input type="text" name="webName" id="webName" class="form-control" placeholder="Enter website name" >
              <div class="val" style="color:red;"><label hidden="" for="valN" id="valN"></label></div></div>
              <div class="form-group">
                <h6>Description</h6>
                <input type="text" name="webDescription" id="webDescription" class="form-control" placeholder="Write a small description about your website" >
              <div class="val" style="color:red;"><label hidden="" for="valD" id="valD"></label></div></div>
              <div class="form-group">
                <h6> Select Website Type: </h6>
                <select name="webType" id="webType" class="form-control" >
                  <option value="">---Select</option>
                  <option value="Education">Education</option>
                  <option value="Business">Business</option>
                  <option value="Blogger">Blogger</option>
                  <option value="e-commerce">e-commerce</option>
                </select>
              <div class="val" style="color:red;"><label hidden="" for="valT" id="valT"></label></div></div>
              <div class="form-group">
                <h6>Upload Website Logo</h6>
                <input type="file" name="webLogo" id="webLogo" class="form-control" >
              <div class="val" style="color:red;"><label hidden="" for="valL" id="valL"></label></div></div>
              <div class="form-group">
									<input type="submit" value="Register Website" class="btn btn-primary py-3 px-5">
							</div>
              </div>
            </form>';}else{
              $row = mysqli_fetch_assoc($result);
              
              /*if($row["activation"]==1){
                echo '<div class="form-group">
                <form action="../bank.php">
                <input type="text" value="'.$row["webID"].'" name="aId" id="aId" hidden="">
                  <input type="submit" value="Pay" class="btn btn-primary py-3 px-5">
                </div>';
              }*/
              echo '<form enctype="multipart/form-data" class="border p-5 contact-form" name="registerform" onSubmit="return edWeb()" action="../actions/updateWebsite.php" method="post">
              <div class="form-group">
                <h6>My Website URL</h6>
                <input type="text" name="webURL" id="webURL" class="form-control" readonly placeholder="" value='.$row['domain'].' >
              </div>
              <div class="form-group">
                <h6>My Website Name</h6>
                <input type="text" name="webName" id="webName" class="form-control" placeholder="Enter website name"  value='.$row['webName'].'>
              <div class="val" style="color:red;"><label hidden="" for="valN" id="valN"></label></div></div>
              <div class="form-group">
                <h6>Description</h6>
                <input type="text" name="webDescription" id="webDescription" class="form-control" placeholder="Write a small description about your website"  value="'.$row['webDescription'].'">
              <div class="val" style="color:red;"><label hidden="" for="valD" id="valD"></label></div></div>
              <div class="form-group">
                <h6> Select Website Type: </h6>
                <select name="webType" id="webType" class="form-control" >
                  <option value="'.$row['webType'].'">'.$row['webType'].'</option>
                  <option value="">---Select</option>
                  <option value="Education">Education</option>
                  <option value="Business">Business</option>
                  <option value="Blogger">Blogger</option>
                  <option value="e-commerce">e-commerce</option>
                </select>
              <div class="val" style="color:red;"><label hidden="" for="valT" id="valT"></label></div></div>
              <div class="form-group">
              <div class="col-md-6"><img src="../actions/'.$row['weblogoImage'].'" width="200" height="200"></div>
                <h6>Upload Website Logo</h6>
                <input type="file" name="webLogo" id="webLogo" class="form-control">
              <div class="val" style="color:red;"><label hidden="" for="valL" id="valL"></label></div></div>
              <div class="form-group">
                  <input type="submit" value="Update Website" class="btn btn-primary py-3 px-5">
              </div>
              </div>
            </form>';
            if(($row["activation"]==0) && ($row["approval"]==1)){
                echo '<div class="form-group">
                <form action="payout.php">
                  <input type="submit" value="Pay" class="btn btn-primary py-3 px-5"></form>
              </div>';
              }else if(($row["activation"]==0) && ($row["approval"]==0)){
                echo 'Waiting for approval';
              }
            }}?>
          
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
    
    </script>
    <script type="text/javascript">
    function regWeb()
{
    name = document.getElementById("webName").value;
    type = document.getElementById("webType").value;
    logo = document.getElementById("webLogo").value;
    des = document.getElementById("webDescription").value;
    if(name==""){
      document.getElementById("webName").style.borderColor = "red";
      document.getElementById("webName").focus();
      document.getElementById("valN").hidden = false;
      document.getElementById("valN").innerHTML = "Please enter a name for your website.";
      return false;
    }else{
      document.getElementById("valN").innerHTML = "";
      document.getElementById("valN").hidden = true;
      document.getElementById("webName").style.borderColor = "green";
    }
    if(des==""){
      document.getElementById("webDescription").style.borderColor = "red";
      document.getElementById("webDescription").focus();
      document.getElementById("valD").hidden = false;
      document.getElementById("valD").innerHTML = "Please enter a description for your website.";
      return false;
    }else{
      document.getElementById("valD").innerHTML = "";
      document.getElementById("valD").hidden = true;
      document.getElementById("webDescription").style.borderColor = "green";
    }
    if(type==""){
      document.getElementById("webType").style.borderColor = "red";
      document.getElementById("webType").focus();
      document.getElementById("valT").hidden = false;
      document.getElementById("valT").innerHTML = "Please select the type of your website.";
      return false;
    }else{
      document.getElementById("valT").innerHTML = "";
      document.getElementById("valT").hidden = true;
      document.getElementById("webType").style.borderColor = "green";
    }
    if(logo==""){
      document.getElementById("webLogo").style.borderColor = "red";
      document.getElementById("webLogo").focus();
      document.getElementById("valL").hidden = false;
      document.getElementById("valL").innerHTML = "Please select a logo for your website.";
      return false;
    }else{
      document.getElementById("valL").innerHTML = "";
      document.getElementById("valL").hidden = true;
      document.getElementById("webLogo").style.borderColor = "green";
    }
}
function edWeb()
{
    name = document.getElementById("webName").value;
    type = document.getElementById("webType").value;
    logo = document.getElementById("webLogo").value;
    des = document.getElementById("webDescription").value;
    if(name==""){
      document.getElementById("webName").style.borderColor = "red";
      document.getElementById("webName").focus();
      document.getElementById("valN").hidden = false;
      document.getElementById("valN").innerHTML = "Please enter a name for your website.";
      return false;
    }else{
      document.getElementById("valN").innerHTML = "";
      document.getElementById("valN").hidden = true;
      document.getElementById("webName").style.borderColor = "green";
    }
    if(des==""){
      document.getElementById("webDescription").style.borderColor = "red";
      document.getElementById("webDescription").focus();
      document.getElementById("valD").hidden = false;
      document.getElementById("valD").innerHTML = "Please enter a description for your website.";
      return false;
    }else{
      document.getElementById("valD").innerHTML = "";
      document.getElementById("valD").hidden = true;
      document.getElementById("webDescription").style.borderColor = "green";
    }
    if(type==""){
      document.getElementById("webType").style.borderColor = "red";
      document.getElementById("webType").focus();
      document.getElementById("valT").hidden = false;
      document.getElementById("valT").innerHTML = "Please select the type of your website.";
      return false;
    }else{
      document.getElementById("valT").innerHTML = "";
      document.getElementById("valT").hidden = true;
      document.getElementById("webType").style.borderColor = "green";
    }
}
    </script>
  </body>
</html>

