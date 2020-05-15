<?php
//start session
session_start();
$_SESSION["active"] = "mywebclicks";
if ($_SESSION['email']=="") {
    header("Location:../logOut.php");
}
if($_SESSION['user_type']!="Advertiser"){
        header("Location:../logOut.php");
    }
    include '../db_conn.php';
$sql0 = "SELECT * FROM `tbluser` WHERE  `email` =  '" . $_SESSION["email"] . "' AND `userType`='Advertiser';";
if ($result0 = mysqli_query($conn, $sql0)) {
    $row = mysqli_fetch_assoc($result0);
    $sql01 = "SELECT * FROM `tblregisteredwebsite` WHERE  `userID` =  '" . $_SESSION["user_id"] . "';";
    $result01 = mysqli_query($conn, $sql01);
    $row01 = mysqli_fetch_assoc($result01);
    $adID = $row01["webID"];

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
            
            <h2 class="text-center"> - Website Clicks -</h2>
            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning" id="memTable" name="memTable">
                                        <thead>
                                            <tr>
                                                
                                                <th>Click ID</th>
                                                <th>Date Clicked</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $sql = "SELECT * FROM `tblclick` WHERE `adID`='".$adID."';";
                                        $result = mysqli_query($conn, $sql);
                        //echo $sql;
                                        if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {

                                        echo '<form method="post"><tr><td> ' . $row["clickID"] . ' </td><td> ' .
                                          $row["dateClicked"] . ' </td></tr></form>';
                            }
                            $r = mysqli_num_rows($result);
                            if($r==0){
                            echo 'No clicks made for your website yet!';}
                        }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
          
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

