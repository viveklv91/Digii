<?php
//start session
session_start();
if ($_SESSION['email']=="") {
    header("Location:logOut.php");
}
if($_SESSION['user_type']!="Publisher"){
        header("Location:logOut.php");
    }
$_SESSION["active"] = "bankaccount";
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
            <?php 
            if(isset($_SESSION['phpValidation'])){ 
              echo $_SESSION['phpValidation'];
              unset($_SESSION['phpValidation']);
            } ?>
          	<h2 class="text-center"> - Bank Account Details -</h2>
            <form class="border p-5 contact-form" name="bankaccountform" action="../actions/registerbankdetails.php" method="post" <?php if($_SESSION['reg']=="Yes"){echo 'disabled';}?>>
            <div class="form-group">
											<h6> Payout Method: </h6>
											<select name="payoutmethod" id="payoutmethod" class="form-control">
											<option value="<?php echo $_POST['payoutmethod'];?>"><?php echo $_POST['payoutmethod'];?></option>
                      <option value="">---Select</option>
											<option value="Bank-Transfer">Bank Transfer</option>
											</select>
										</div>
										<div class="form-group">
											<h6> Select Bank: </h6>
											<select name="bankname" id="bankname" class="form-control">
											<option value="">---Select</option>
											<option value="BOC">BOC</option>
											<option value="HNB">HNB</option>
											<option value="Commercial">Commercial Bank</option>
											<option value="HSBC">HSBC</option>
											<option value="Sampath Bank">Sampath Bank</option>
											<option value="Seylan Bank">Seylan Bank</option>
											</select>
										</div>
										<div class="form-group">
											<h6> Enter Bank's Branch City: </h6>
											<input type="text" name="bankbranch" id="bankbranch" class="form-control" placeholder="Enter your branch city">
										</div>
										<div class="form-group">
											<h6> Enter Bank's Branch Code: </h6>
											<input type="number" name="bankcode" id="bankcode" class="form-control" placeholder="Enter branch code">
										</div>
										<div class="form-group">
											<h6> Enter account name: </h6>
											<input type="text" name="accountname" id="accountname" class="form-control" placeholder="Enter account name">
										</div>
										<div class="form-group">
											<h6> Enter account number: </h6>
											<input type="text" name="accountnumber" id="accountnumber" class="form-control" placeholder="Enter account number">
										</div>
										<div class="form-group">
											<h6> Re-enter account number: </h6>
											<input type="text" name="confirmaccountnumber" id="confirmaccountnumber" class="form-control" placeholder="Re-enter account number">
										</div>
										<div class="form-group">
											<h6> Enter NIC number: </h6>
											<input type="text" name="NICnumber" id="NICnumber" class="form-control" placeholder=" Enter NIC number">
										</div>
										<div class="form-group">
											<input type="submit" value="Update Info" class="btn btn-primary py-3 px-5">
										</div>
						  	</div>
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

    </script>
  </body>
</html>

