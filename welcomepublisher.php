<?php 
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['user_type']) && $_SESSION['user_type'] =='Publisher')
{
	//continue
}else{
	header('Location:../login.php');
}
?>
// example

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
      include("includes/publisherHeader.php");
    ?>

    <section class="ftco-section ftco-no-pt">
  			<div class="row tabulation mt-4 ftco-animate">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  				<div class="col-md-3">
						<ul class="nav nav-pills nav-fill d-md-flex d-block flex-column">
						  <li class="nav-item text-left">
						    <a class="nav-link active py-4" data-toggle="tab" href="#services-1"><span class="flaticon-analysis mr-2"></span> PPC Ads</a>
						  </li>
						  <li class="nav-item text-left">
						    <a class="nav-link py-4" data-toggle="tab" href="#services-2"><span class="flaticon-business mr-2"></span> Account Overview</a>
						  </li>
						  <li class="nav-item text-left">
						    <a class="nav-link py-4" data-toggle="tab" href="#services-3"><span class="flaticon-insurance mr-2"></span> Payout</a>
						  </li>
						  <li class="nav-item text-left">
						    <a class="nav-link py-4" data-toggle="tab" href="#EditProfile"><span class="flaticon-money mr-2"></span> Edit Profile</a>
						  </li>
						  <li class="nav-item text-left">
						    <a class="nav-link py-4" data-toggle="tab" href="#ChangePassword"><span class="flaticon-rating mr-2"></span> Change Password</a>
						  </li>
						  <li class="nav-item text-left">
						    <a class="nav-link py-4" data-toggle="tab" href="#BankAccount"><span class="flaticon-search-engine mr-2"></span> Bank Account</a>
						  </li>
						  <li class="nav-item text-left">
						    <a class="nav-link py-4" data-toggle="tab" href="logOut.php"><span class="flaticon-search-engine mr-2"></span> Sign Out</a>
						  </li>
						</ul>
					</div>
					<div class="col-md-8">
						<div class="tab-content">
						  <div class="tab-pane container p-0 active" id="services-1">
						  	<div class="img" style="background-image: url(images/project-2.jpg);"></div>
						  	<h3><a href="#">Business Analysis</a></h3>
						  	<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
						  </div>

						  <div class="tab-pane container p-0 fade" id="services-2">
						  	<div class="img" style="background-image: url(images/project-3.jpg);"></div>
						  	<h3><a href="#">Business Consulting</a></h3>
						  	<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
						  </div>

						  <div class="tab-pane container p-0 fade" id="services-3">
						  <h3>Available Balance</a></h3>
								<div class="form-group">
									<h6> Available Balance: </h6>
									<input type="number" name="password" id="password" class="form-control">
								</div>
								<div class="form-group">
									<h6> Transfer Amount: </h6>
									<input type="number" name="zipCode" id="zipCode" class="form-control" placeholder="Enter transfer amount">
								</div>
								<br>
								<div class="form-group">
									<input type="submit" value="Transfer" class="btn btn-primary py-3 px-5">
								</div>
								<div class="form-group">
									<p><font color="red">***Available balance should be more than LKR 5000 for bank transfer</font></P>
								</div>
						  </div>

						  <div class="tab-pane container p-0 fade" id="EditProfile">
						  <h3>Update Personal Information</a></h3>
						  		<div class="form-group">
									<h6> Enter First Name: </h6>
									<input type="text" name="firstName" id="firstName" class="form-control" placeholder="Enter your First Name">
								</div>
								<div class="form-group">
									<h6> Enter Last Name: </h6>
									<input type="text" name="lastName" id="lastName" class="form-control" placeholder="Enter your Last Name">
								</div>
								<div class="form-group">
									<h6> Enter Contact Number: </h6>
									<input type="number" name="contactNumber" id="contactNumber" class="form-control" placeholder="Enter your contact number">
								</div>
								<div class="form-group">
									<h6> Select Date of birth: </h6>
									<input type="date" class="form-control">
								</div>
								<div class="form-group">
									<h6> Enter your address: </h6>
									<input type="text" name="address" id="address" class="form-control" placeholder="Enter your address">
								</div>
								<div class="form-group">
									<h6> Enter your city: </h6>
									<input type="text" name="city" id="city" class="form-control" placeholder="Enter your city">
								</div>
								<div class="form-group">
									<h6> Enter postal/ zip code: </h6>
									<input type="number" name="zipCode" id="zipCode" class="form-control" placeholder="Enter postal/ zip code">
								</div>
								<div class="form-group">
									<h6> Select Country: </h6>
									<select name="country" id="country" class="form-control">
									<option value="">---Select</option>
									<option value="">Sri Lanka</option>
									</select>
								</div>
								<div class="form-group">
									<input type="submit" value="Update Info" class="btn btn-primary py-3 px-5">
								</div>
						  </div>

						  <div class="tab-pane container p-0 fade" id="ChangePassword">
						  <h3>Change Password</a></h3>
								<div class="form-group">
									<h6> Enter Password: </h6>
									<input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
								</div>
								<div class="form-group">
									<h6> Confirm Password: </h6>
									<input type="password" name="zipCode" id="zipCode" class="form-control" placeholder="Retype password">
								</div>
								<br>
								<div class="form-group">
									<input type="submit" value="Update Password" class="btn btn-primary py-3 px-5">
								</div>
						  </div>

						  <div class="tab-pane container p-0 fade" id="BankAccount">
						  <h3>Bank Account Details</a></h3>
										<div class="form-group">
											<h6> Payout Method: </h6>
											<select name="country" id="country" class="form-control">
											<option value="">---Select</option>
											<option value="">Bank Transfer</option>
											</select>
										</div>
										<div class="form-group">
											<h6> Select Bank: </h6>
											<select name="country" id="country" class="form-control">
											<option value="">---Select</option>
											<option value="">BOC</option>
											<option value="">HNB</option>
											<option value="">Commercial Bank</option>
											<option value="">HSBC</option>
											<option value="">Sampath Bank</option>
											<option value="">Seylan Bank</option>
											</select>
										</div>
										<div class="form-group">
											<h6> Enter Bank's Branch City: </h6>
											<input type="text" name="lastName" id="lastName" class="form-control" placeholder="Enter your branch city">
										</div>
										<div class="form-group">
											<h6> Enter Bank's Branch Code: </h6>
											<input type="number" name="contactNumber" id="contactNumber" class="form-control" placeholder="Enter branch code">
										</div>
										<div class="form-group">
											<h6> Enter account name: </h6>
											<input type="text" name="address" id="address" class="form-control" placeholder="Enter account name">
										</div>
										<div class="form-group">
											<h6> Enter account number: </h6>
											<input type="text" name="city" id="city" class="form-control" placeholder="Enter account number">
										</div>
										<div class="form-group">
											<h6> Re-enter account number: </h6>
											<input type="text" name="city" id="city" class="form-control" placeholder="Re-enter account number">
										</div>
										<div class="form-group">
											<h6> Enter NIC number: </h6>
											<input type="number" name="zipCode" id="zipCode" class="form-control" placeholder=" Enter NIC number">
										</div>
										<div class="form-group">
											<input type="submit" value="Update Info" class="btn btn-primary py-3 px-5">
										</div>
						  	</div>
					<div class="tab-pane container p-0 fade" id="services-6">
						  	<div class="img" style="background-image: url(images/project-3.jpg);"></div>
						  	<h3><a href="#">Business Consulting</a></h3>
						  	<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
					</div>
				</div>
    	</div>
    </section>

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
    
  </body>
</html>