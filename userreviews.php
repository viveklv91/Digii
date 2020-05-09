<?php 
session_start();
require("db_conn.php");
$_SESSION["active"]="userreviews";
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

    <?php include('userreviewsUpdate.php'); ?>
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">User Reviews</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>User Reviews <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
    <div class="row block-9 justify-content-center mb-5">
    <div class="col-md-10 mb-md-5">
      <br>
      <?php
                                $sql = "SELECT SUM(`rating`) as sum, COUNT(`reviewID`) as count FROM `tblreview`;";
                                $result = mysqli_query($conn, $sql);
                                $r = mysqli_num_rows($result);
                                //echo $sql;
                                if ($r > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        if($row['count'] > 0){
                                            $rating = round( ($row['sum'] / $row['count']) / 4.5 * 100).'%';
                                        }else{
                                            $rating = "No ratings provided.";
                                        }
                                        
                                    }
                                }else{
                                    $rating = "No Ratings Provided.";
                                }
                        ?>
                        <h6 color="36802D">Happy Rating: <?php echo $rating; ?></h6>
    <h2>REVIEWS</h2>
      <?php
        $sql = "SELECT * FROM `tblreview` ORDER BY `reviewDate` DESC; ";
        $result = mysqli_query($conn, $sql);
        $r = mysqli_num_rows($result);
        //echo $sql;
        if ($r > 0) {
          echo "<ul>";
          // output data of each row
          while($rec = $result->fetch_assoc()) {
            echo "<li style='padding-bottom:30px;'><p>".$rec['comment']."</p><em><span>By: ".$rec['fullName']."</span> - <span>".$rec['reviewDate']."</span></em></li>";
          }
             echo "</ul>";
        }
      ?>

    </div>
    </div>
        <div class="row block-9 justify-content-center mb-5">
          <div class="col-md-10 mb-md-5">
          	<h2 class="text-center"> Give your feedback on our system...</h2>
            <?php echo $MSG; ?>
            <form action="userreviews.php" class="border p-5 contact-form" method="post">
              <div class="form-group">
                <input type="text" name="fullName" class="form-control" placeholder="Your Full-name">
              </div>
              <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Your Email">
              </div>
              <div class="form-group">
                <textarea name="comment" id="comment" cols="30" rows="5" class="form-control" placeholder="Write Your Feedback Here!"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Submit Feedback" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>
        </div>
      </div>
    </section>

    <?php
      include("includes/footer.php");
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
    
  </body>
</html>

