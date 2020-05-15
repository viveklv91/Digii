<?php
//start session
session_start();
$_SESSION["active"] = "payout";
if ($_SESSION['email']=="") {
    header("Location:../logOut.php");
}
if($_SESSION['user_type']!="Publisher"){
        header("Location:../logOut.php");
    }
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
            
          	<h2 class="text-center"> - Payout -</h2>
            <form class="border p-5 contact-form" name="registerform" action="../actions/confirmPayout.php" method="post">
              <div class="form-group">
                <h6>Total Income</h6>
                <?php $sql="SELECT `amount` FROM `tblpayout` WHERE `userID`='".$_SESSION["user_id"]."';";
                if ($result = mysqli_query($conn, $sql)) {
                $row = mysqli_fetch_assoc($result);?>
                <input type="number" name="income" id="income" class="form-control" placeholder="" readonly required value=<?php echo $row["amount"];}?>>
              </div>
              <div class="form-group">
                <h6>Available Balance</h6>
                <input type="number" name="blnc" id="blnc" class="form-control" placeholder="Enter transfer amount" required>
              </div><?php
              $sql1 = "SELECT * FROM `tblbankdetail` WHERE `userID`='".$_SESSION['user_id']."';";
            $result1 = mysqli_query($conn, $sql1);
            if($result1){
            $row1 = mysqli_fetch_assoc($result1);
            echo '<div class="form-group">
                  <h6> Bank: </h6>
                      <input type="text" name="bankname" id="bankname" class="form-control" readonly value="'.$row1['bankName'].'"placeholder="your branch city">
                    </div>
                    <div class="form-group">
                      <h6> Bank Branch City: </h6>
                      <input type="text" name="bankbranch" id="bankbranch" class="form-control" readonly value="'.$row1['bankBranchCity'].'"placeholder="your branch city">
                    </div>
                    <div class="form-group">
                      <h6> Bank Branch Code: </h6>
                      <input type="number" name="bankcode" id="bankcode" class="form-control" readonly value="'.$row1['bankBranchCode'].'" placeholder="branch code">
                    </div>
                    <div class="form-group">
                      <h6> Account holder name: </h6>
                      <input type="text" name="accountname" id="accountname" class="form-control" readonly value="'.$row1['accountHolderName'].'" placeholder="account name">
                    </div>
                    <div class="form-group">
                      <h6> Account number: </h6>
                      <input type="text" name="accountnumber" id="accountnumber" class="form-control" readonly value="'.$row1['accountNumber'].'" placeholder="account number">
                    </div>';}?>
              <div class="form-group">
									<input type="submit" value="Transfer" class="btn btn-primary py-3 px-5">
							</div>
							<div class="form-group">
									<p><font color="red">***Available balance should be more than LKR 5000 for bank transfer</font></P>
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

