<?php
session_start();
if ($_SESSION['user_name']=="") {
    header("Location:../logOut.php");
}
$_SESSION["active"] = "managewebsites";
include '../db_conn.php';
$sql0 = "SELECT * FROM `tbladmin` WHERE  `username` =  '" . $_SESSION["user_name"] . "';";
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
    include("../includes/header.php");
  ?>

    <br><br>
    <div class="row block-9 justify-content-center mb-1">
          <div class="col-md-10 mb-md-5">
            <h2 class="text-center"> - Manage Websites -</h2>
            <div class="form-group d-flex">
              <div class="col-lg-12" style="margin-bottom:20px;">
                                        <div class="row">
                                            <div class="col-lg-6">
                                            <input type="text" class="form-control" id="idInput" onkeyup="idSearch()" placeholder="Search Web ID">
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="nameInput" onkeyup="nameSearch()" placeholder="Search Web Name">
                                        </div>
                                        </div>
                                    </div>
              </div>
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
            <form class="border p-5 contact-form" name="registerform" action="../actions/confirmEditPublisher.php" method="post">
              <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning" id="memTable" name="memTable">
                                        <thead>
                                            <tr>
                                                <th>Web ID</th>
                                                <th>User ID</th>
                                                <th>Domain Name</th>
                                                <th>Domain Type</th>
                                                <th>Domain URL</th>                                                
                                                <th>Company Logo</th>
                                                <th>Deactivate Website</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php $sql = "SELECT * FROM `tblregisteredwebsite` WHERE `approval`=1;";
                                            $result = mysqli_query($conn, $sql);
                                            if ($result) {
                                              while ($row = mysqli_fetch_assoc($result)) {

                                echo '<form method="post"><tr><td> ' . $row["webID"] . 
                                ' </td><td> ' . $row["userID"] . ' </td><td> ' .
                                 $row["webName"].' </td><td> ' . 
                                 $row["webType"] . ' </td><td> ' .
                                  $row["domain"] . ' </td><td><img src=../../digii/actions/' .
                                   $row["weblogoImage"] .' width=100 height=100> </td>
                                   <td><input type="submit" name="deactivate" id="deactivate" value="Deactivate" formaction="../actions/deactivateWeb.php?wID=' . $row["webID"] . '" class="btn btn-primary py-1 px-3"></tr></form>';
                            }
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

