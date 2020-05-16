<?php
//start session
session_start();
if ($_SESSION['email']=="") {
    header("Location:../logOut.php");
}
if($_SESSION['user_type']!="Publisher"){
        header("Location:../logOut.php");
    }
$_SESSION["active"] = "ppcads";
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
    if($_SESSION['viewad']=="viewad"){
echo "<script type='text/javascript'>
window.open('http://".$_SESSION['url']."', '_blank')
</script>";
$_SESSION['viewad']="adview";
}else{
  $_SESSION['viewad']="adview";
}
  ?>

    <br><br>
    <div class="row block-9 justify-content-center mb-1">
          <div class="col-md-10 mb-md-5">
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
            <h2 class="text-center"> - PPC Ads -</h2>
            <form class="border p-5 contact-form" name="registerform" action="../actions/confirmEditPublisher.php" method="post">
              <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning" id="memTable" name="memTable">
                                        <thead>
                                            <tr>
                                                
                                                <th>Web ID</th>
                                                <th>Domain</th>
                                                <th>Name</th>
                                                <th>Description</th>                                                
                                                <th>Type</th>
                                                <th>Click</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $dateC = date("Y-m-d");
                                        $sql1 = "SELECT COUNT(`clickID`) AS total FROM `tblclick` WHERE `userID`='".$_SESSION["user_id"]."' AND `dateClicked`='".$dateC."';";
                                        $result1 = mysqli_query($conn, $sql1);
                                        $row1 = mysqli_fetch_assoc($result1);
                                        //echo $sql.$row["total"];
                                        $count = 10-$row1["total"];
                                        $sql = "SELECT a.`webID`,a.`domain`,a.`webName`,a.`webDescription`,a.`webType` FROM `tblregisteredwebsite` a WHERE NOT EXISTS (SELECT * FROM `tblclick` t  WHERE t.`adID` = a.`webID` AND t.`dateClicked`='".$dateC."') AND a.`activation`=1 AND a.`approval`=1 order by RAND() LIMIT $count;";
                                        $result = mysqli_query($conn, $sql);
                        //echo $sql;
                                        if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {

                                        echo '<form method="post"><tr><td> ' . $row["webID"] . ' </td><td> ' .
                                          $row["domain"] . ' </td><td> ' . 
                                          $row["webName"] . ' </td>
                                    <td> '. $row["webDescription"].' </td>
                                    <td> ' . $row["webType"] . ' </td>
                                    <td><input type="submit" name="click" id="click" value="Click" formaction="clickad.php?aID=' . $row["webID"] .'&adUrl=' . $row["domain"] .'" class="btn btn-primary py-1 px-4"></td></tr></form>';
                            }
                            $r = mysqli_num_rows($result);
                            if($r==0){
                            echo 'Ads for today is over!';}
                        }?>
                                        </tbody>
                                    </table>
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

<!-- done -->
