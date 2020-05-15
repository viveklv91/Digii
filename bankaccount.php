<?php
//start session
session_start();
if ($_SESSION['email']=="") {
    header("Location:../logOut.php");
}
if($_SESSION['user_type']!="Publisher"){
        header("Location:../logOut.php");
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
          	<h2 class="text-center"> - Bank Account Details -</h2>
            <?php
            $sql = "SELECT * FROM `tblbankdetail` WHERE `userID`='".$_SESSION['user_id']."';";
            $result = mysqli_query($conn, $sql);
            if($result){
            $row = mysqli_fetch_assoc($result);
            if (!(mysqli_num_rows($result) > 0)) {
            echo '<form class="border p-5 contact-form" name="bankaccountform" onSubmit="return regBank()" action="../actions/registerbankdetailsPublisher.php" method="post">
              
            <div class="form-group">
											<h6> Payout Method: </h6>
											<select name="payoutmethod" id="payoutmethod" class="form-control">
											<option value="">---Select</option>
											<option value="Bank-Transfer">Bank Transfer</option>
											</select>
										<div class="val" style="color:red;"><label hidden="" for="valP" id="valP"></label></div></div>
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
										<div class="val" style="color:red;"><label hidden="" for="valN" id="valN"></label></div></div>
										<div class="form-group">
											<h6> Enter Bank Branch City: </h6>
											<input type="text" name="bankbranch" id="bankbranch" class="form-control" placeholder="Enter your branch city">
										<div class="val" style="color:red;"><label hidden="" for="valB" id="valB"></label></div></div>
										<div class="form-group">
											<h6> Enter Bank Branch Code: </h6>
											<input type="text" onkeyup="valCode(this)" name="bankcode" id="bankcode" class="form-control" placeholder="Enter branch code">
										<div class="val" style="color:red;"><label hidden="" for="valC" id="valC"></label></div></div>
										<div class="form-group">
											<h6> Enter account name: </h6>
											<input type="text" name="accountname" id="accountname" class="form-control" placeholder="Enter account name" onkeyup="validateName(this)">
										<div class="val" style="color:red;"><label hidden="" for="valAN" id="valAN"></label></div></div>
										<div class="form-group">
											<h6> Enter account number: </h6>
											<input type="text" name="accountnumber" id="accountnumber" class="form-control" placeholder="Enter account number">
										<div class="val" style="color:red;"><label hidden="" for="valA" id="valA"></label></div></div>
										<div class="form-group">
											<h6> Re-enter account number: </h6>
											<input type="text" name="confirmaccountnumber" id="confirmaccountnumber" class="form-control" placeholder="Re-enter account number" onkeyup="validateAcnt()">
										<div class="val" style="color:red;"><label hidden="" for="valAC" id="valAC"></label></div></div>
										<div class="form-group">
											<h6> Enter NIC number: </h6>
											<input type="text" name="NICnumber" id="NICnumber" class="form-control" placeholder=" Enter NIC number">
										<div class="val" style="color:red;"><label hidden="" for="valNIC" id="valNIC"></label></div></div>
										<div class="form-group">
											<input type="submit" value="Submit" class="btn btn-primary py-3 px-5">
										</div>
            </form>';}else{
            
              
        echo '<form class="border p-5 contact-form" name="bankaccountform" action="../actions/editbankdetailsPublisher.php" onSubmit="return edBank()" method="post" ><div class="form-group">
                      <div class="form-group">
                      <h6> Payout Method: </h6>
                      <select name="payoutmethod" id="payoutmethod" class="form-control">
                      <option value="'.$row['payoutMethod'].'">'.$row['payoutMethod'].'</option>
                      <option value="">---Select</option>
                      <option value="Bank-Transfer">Bank Transfer</option>
                      </select>
                    <div class="val" style="color:red;"><label hidden="" for="valP" id="valP"></label></div></div>
                    <div class="form-group">
                      <h6> Bank: </h6>
                      <select name="bankname" id="bankname" class="form-control">
                      <option value="'.$row['bankName'].'">'.$row['bankName'].'</option>
                      <option value="">---Select</option>
                      <option value="BOC">BOC</option>
                      <option value="HNB">HNB</option>
                      <option value="Commercial">Commercial Bank</option>
                      <option value="HSBC">HSBC</option>
                      <option value="Sampath Bank">Sampath Bank</option>
                      <option value="Seylan Bank">Seylan Bank</option>
                      </select>
                    <div class="val" style="color:red;"><label hidden="" for="valN" id="valN"></label></div></div>
                    <div class="form-group">
                      <h6> Enter Bank Branch City: </h6>
                      <input type="text" name="bankbranch" id="bankbranch" class="form-control"  value="'.$row['bankBranchCity'].'"placeholder="Enter your branch city">
                    <div class="val" style="color:red;"><label hidden="" for="valB" id="valB"></label></div></div>
                    <div class="form-group">
                      <h6> Enter Bank Branch Code: </h6>
                      <input type="text" onkeyup="valCode(this)" name="bankcode" id="bankcode" class="form-control"  value="'.$row['bankBranchCode'].'" placeholder="Enter branch code">
                    <div class="val" style="color:red;"><label hidden="" for="valC" id="valC"></label></div></div>
                    <div class="form-group">
                      <h6> Enter Account name: </h6>
                      <input type="text" name="accountname" id="accountname" class="form-control"  value="'.$row['accountHolderName'].'" placeholder="Enter account name" onkeyup="validateName(this)">
                    <div class="val" style="color:red;"><label hidden="" for="valAN" id="valAN"></label></div></div>
                    <div class="form-group">
                      <h6> Account number: </h6>
                      <input type="text" name="accountnumber" id="accountnumber" class="form-control"  value="'.$row['accountNumber'].'" placeholder="Enter account number">
                    <div class="val" style="color:red;"><label hidden="" for="valA" id="valA"></label></div></div>
                    <div class="form-group">
                      <h6> Re-enter Account number: </h6>
                      <input type="text" name="confirmaccountnumber" id="confirmaccountnumber" class="form-control"  value="'.$row['accountNumber'].'" placeholder="Re-Enter account number" onkeyup="validateAcnt()">
                    <div class="val" style="color:red;"><label hidden="" for="valAC" id="valAC"></label></div></div>
                    <div class="form-group">
                      <h6> Enter NIC number: </h6>
                      <input type="text" name="NICnumber" id="NICnumber" class="form-control"  placeholder=" Enter NIC number" value="'.$row['NICnumber'].'">
                    <div class="val" style="color:red;"><label hidden="" for="valNIC" id="valNIC"></label></div></div>
                    <div class="form-group">
                      <input type="submit" value="Update" class="btn btn-primary py-3 px-5">
                    </div>
                </div></form>';
            }
          }?>
            
          
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
    function validateName(txt)
{
    txt.value = txt.value.replace(/[^a-zA-Z.' ]/g, '');
    //document.getElementById('validationAlertN').innerHTML = 'Please enter valid name';
}
function validateAcnt() {
        if (document.getElementById('confirmaccountnumber').value == document.getElementById('accountnumber').value) {
            document.getElementById('accountnumber').style.borderColor = "green";
            document.getElementById('confirmaccountnumber').style.borderColor = "green";
            document.getElementById("valAC").hidden = true;
      document.getElementById("valAC").innerHTML = "";
        } else {
            
            document.getElementById('accountnumber').style.borderColor = "red";
            document.getElementById('confirmaccountnumber').style.borderColor = "red";
        }
}
function valCode(txt){
  txt.value = txt.value.replace(/[^0-9]/g, '');
}

    </script>
    <script type="text/javascript">
    function regBank()
{
    meth = document.getElementById("payoutmethod").value;
    bname = document.getElementById("bankname").value;
    brnch = document.getElementById("bankbranch").value;
    cd = document.getElementById("bankcode").value;
    name = document.getElementById("accountname").value;
    num = document.getElementById("accountnumber").value;
    cnum = document.getElementById("confirmaccountnumber").value;
    nic = document.getElementById("NICnumber").value;
    if(meth==""){
      document.getElementById("payoutmethod").style.borderColor = "red";
      document.getElementById("payoutmethod").focus();
      document.getElementById("valP").hidden = false;
      document.getElementById("valP").innerHTML = "Select your payout method.";
      return false;
    }else{
      document.getElementById("valP").innerHTML = "";
      document.getElementById("valP").hidden = true;
      document.getElementById("payoutmethod").style.borderColor = "green";
    }
    if(bname==""){
      document.getElementById("bankname").style.borderColor = "red";
      document.getElementById("bankname").focus();
      document.getElementById("valN").hidden = false;
      document.getElementById("valN").innerHTML = "Select Bank.";
      return false;
    }else{
      document.getElementById("valN").innerHTML = "";
      document.getElementById("valN").hidden = true;
      document.getElementById("bankname").style.borderColor = "green";
    }
    if(brnch==""){
      document.getElementById("bankbranch").style.borderColor = "red";
      document.getElementById("bankbranch").focus();
      document.getElementById("valB").hidden = false;
      document.getElementById("valB").innerHTML = "Enter branch name.";
      return false;
    }else{
      document.getElementById("valB").innerHTML = "";
      document.getElementById("valB").hidden = true;
      document.getElementById("bankbranch").style.borderColor = "green";
    }
    if(cd==""){
      document.getElementById("bankcode").style.borderColor = "red";
      document.getElementById("bankcode").focus();
      document.getElementById("valC").hidden = false;
      document.getElementById("valC").innerHTML = "Enter branch code.";
      return false;
    }else{
      document.getElementById("valC").innerHTML = "";
      document.getElementById("valC").hidden = true;
      document.getElementById("bankcode").style.borderColor = "green";
    }
    if(cd.length!=4){
      document.getElementById("bankcode").style.borderColor = "red";
      document.getElementById("bankcode").focus();
      document.getElementById("valC").hidden = false;
      document.getElementById("valC").innerHTML = "Enter valid branch code.";
      return false;
    }else{
      document.getElementById("valC").innerHTML = "";
      document.getElementById("valC").hidden = true;
      document.getElementById("bankcode").style.borderColor = "green";
    }
    if(name==""){
      document.getElementById("accountname").style.borderColor = "red";
      document.getElementById("accountname").focus();
      document.getElementById("valAN").hidden = false;
      document.getElementById("valAN").innerHTML = "Enter account name.";
      return false;
    }else{
      document.getElementById("valAN").innerHTML = "";
      document.getElementById("valAN").hidden = true;
      document.getElementById("accountname").style.borderColor = "green";
    }
    if(num==""){
      document.getElementById("accountnumber").style.borderColor = "red";
      document.getElementById("accountnumber").focus();
      document.getElementById("valA").hidden = false;
      document.getElementById("valA").innerHTML = "Enter account number.";
      return false;
    }else{
      document.getElementById("valA").innerHTML = "";
      document.getElementById("valA").hidden = true;
      document.getElementById("accountnumber").style.borderColor = "green";
    }
    if(num.length>18){
      document.getElementById("accountnumber").style.borderColor = "red";
      document.getElementById("accountnumber").focus();
      document.getElementById("valA").hidden = false;
      document.getElementById("valA").innerHTML = "Enter valid account number.";
      return false;
    }else{
      document.getElementById("valA").innerHTML = "";
      document.getElementById("valA").hidden = true;
      document.getElementById("accountnumber").style.borderColor = "green";
    }
    if(cnum==""){
      document.getElementById("confirmaccountnumber").style.borderColor = "red";
      document.getElementById("confirmaccountnumber").focus();
      document.getElementById("valAC").hidden = false;
      document.getElementById("valAC").innerHTML = "Enter confirm accountnumber.";
      return false;
    }else{
      document.getElementById("valAC").innerHTML = "";
      document.getElementById("valAC").hidden = true;
      document.getElementById("confirmaccountnumber").style.borderColor = "green";
    }
    if(cnum==num){
      document.getElementById("valAC").innerHTML = "";
      document.getElementById("valAC").hidden = true;
      document.getElementById("confirmaccountnumber").style.borderColor = "green";
      document.getElementById("accountnumber").style.borderColor = "green";
    }else{
      document.getElementById("accountnumber").style.borderColor = "red";
      document.getElementById("confirmaccountnumber").style.borderColor = "red";
      document.getElementById("confirmaccountnumber").focus();
      document.getElementById("valAC").hidden = false;
      document.getElementById("valAC").innerHTML = "Account number not equal";
      return false;
    }
    if(nic==""){
      document.getElementById("NICnumber").style.borderColor = "red";
      document.getElementById("NICnumber").focus();
      document.getElementById("valNIC").hidden = false;
      document.getElementById("valNIC").innerHTML = "Enter NIC.";
      return false;
    }else{
      document.getElementById("valNIC").innerHTML = "";
      document.getElementById("valNIC").hidden = true;
      document.getElementById("NICnumber").style.borderColor = "green";
    }
    if((nic.length==10)||(nic.length==12)){
      document.getElementById("valNIC").innerHTML = "";
      document.getElementById("valNIC").hidden = true;
      document.getElementById("NICnumber").style.borderColor = "green";
    }else{
      document.getElementById("NICnumber").style.borderColor = "red";
      document.getElementById("NICnumber").focus();
      document.getElementById("valNIC").hidden = false;
      document.getElementById("valNIC").innerHTML = "Enter valid NIC.";
      return false;
    }
  }
  </script>
  <script type="text/javascript">
    function edBank()
{
    meth = document.getElementById("payoutmethod").value;
    bname = document.getElementById("bankname").value;
    brnch = document.getElementById("bankbranch").value;
    cd = document.getElementById("bankcode").value;
    name = document.getElementById("accountname").value;
    num = document.getElementById("accountnumber").value;
    cnum = document.getElementById("confirmaccountnumber").value;
    nic = document.getElementById("NICnumber").value;
    if(meth==""){
      document.getElementById("payoutmethod").style.borderColor = "red";
      document.getElementById("payoutmethod").focus();
      document.getElementById("valP").hidden = false;
      document.getElementById("valP").innerHTML = "Select your payout method.";
      return false;
    }else{
      document.getElementById("valP").innerHTML = "";
      document.getElementById("valP").hidden = true;
      document.getElementById("payoutmethod").style.borderColor = "green";
    }
    if(bname==""){
      document.getElementById("bankname").style.borderColor = "red";
      document.getElementById("bankname").focus();
      document.getElementById("valN").hidden = false;
      document.getElementById("valN").innerHTML = "Select Bank.";
      return false;
    }else{
      document.getElementById("valN").innerHTML = "";
      document.getElementById("valN").hidden = true;
      document.getElementById("bankname").style.borderColor = "green";
    }
    if(brnch==""){
      document.getElementById("bankbranch").style.borderColor = "red";
      document.getElementById("bankbranch").focus();
      document.getElementById("valB").hidden = false;
      document.getElementById("valB").innerHTML = "Enter branch name.";
      return false;
    }else{
      document.getElementById("valB").innerHTML = "";
      document.getElementById("valB").hidden = true;
      document.getElementById("bankbranch").style.borderColor = "green";
    }
    if(cd==""){
      document.getElementById("bankcode").style.borderColor = "red";
      document.getElementById("bankcode").focus();
      document.getElementById("valC").hidden = false;
      document.getElementById("valC").innerHTML = "Enter branch code.";
      return false;
    }else{
      document.getElementById("valC").innerHTML = "";
      document.getElementById("valC").hidden = true;
      document.getElementById("bankcode").style.borderColor = "green";
    }
    if(cd.length!=4){
      document.getElementById("bankcode").style.borderColor = "red";
      document.getElementById("bankcode").focus();
      document.getElementById("valC").hidden = false;
      document.getElementById("valC").innerHTML = "Enter valid branch code.";
      return false;
    }else{
      document.getElementById("valC").innerHTML = "";
      document.getElementById("valC").hidden = true;
      document.getElementById("bankcode").style.borderColor = "green";
    }
    if(name==""){
      document.getElementById("accountname").style.borderColor = "red";
      document.getElementById("accountname").focus();
      document.getElementById("valAN").hidden = false;
      document.getElementById("valAN").innerHTML = "Enter account name.";
      return false;
    }else{
      document.getElementById("valAN").innerHTML = "";
      document.getElementById("valAN").hidden = true;
      document.getElementById("accountname").style.borderColor = "green";
    }
    if(num==""){
      document.getElementById("accountnumber").style.borderColor = "red";
      document.getElementById("accountnumber").focus();
      document.getElementById("valA").hidden = false;
      document.getElementById("valA").innerHTML = "Enter account number.";
      return false;
    }else{
      document.getElementById("valA").innerHTML = "";
      document.getElementById("valA").hidden = true;
      document.getElementById("accountnumber").style.borderColor = "green";
    }
    if(num.length>18){
      document.getElementById("accountnumber").style.borderColor = "red";
      document.getElementById("accountnumber").focus();
      document.getElementById("valA").hidden = false;
      document.getElementById("valA").innerHTML = "Enter valid account number.";
      return false;
    }else{
      document.getElementById("valA").innerHTML = "";
      document.getElementById("valA").hidden = true;
      document.getElementById("accountnumber").style.borderColor = "green";
    }
    if(cnum==""){
      document.getElementById("confirmaccountnumber").style.borderColor = "red";
      document.getElementById("confirmaccountnumber").focus();
      document.getElementById("valAC").hidden = false;
      document.getElementById("valAC").innerHTML = "Enter confirm accountnumber.";
      return false;
    }else{
      document.getElementById("valAC").innerHTML = "";
      document.getElementById("valAC").hidden = true;
      document.getElementById("confirmaccountnumber").style.borderColor = "green";
    }
    if(cnum==num){
      document.getElementById("valAC").innerHTML = "";
      document.getElementById("valAC").hidden = true;
      document.getElementById("confirmaccountnumber").style.borderColor = "green";
      document.getElementById("accountnumber").style.borderColor = "green";
    }else{
      document.getElementById("accountnumber").style.borderColor = "red";
      document.getElementById("confirmaccountnumber").style.borderColor = "red";
      document.getElementById("confirmaccountnumber").focus();
      document.getElementById("valAC").hidden = false;
      document.getElementById("valAC").innerHTML = "Account number not equal";
      return false;
    }
    if(nic==""){
      document.getElementById("NICnumber").style.borderColor = "red";
      document.getElementById("NICnumber").focus();
      document.getElementById("valNIC").hidden = false;
      document.getElementById("valNIC").innerHTML = "Enter NIC.";
      return false;
    }else{
      document.getElementById("valNIC").innerHTML = "";
      document.getElementById("valNIC").hidden = true;
      document.getElementById("NICnumber").style.borderColor = "green";
    }
    if((nic.length==10)||(nic.length==12)){
      document.getElementById("valNIC").innerHTML = "";
      document.getElementById("valNIC").hidden = true;
      document.getElementById("NICnumber").style.borderColor = "green";
    }else{
      document.getElementById("NICnumber").style.borderColor = "red";
      document.getElementById("NICnumber").focus();
      document.getElementById("valNIC").hidden = false;
      document.getElementById("valNIC").innerHTML = "Enter valid NIC.";
      return false;
    }
  }
  </script>
  </body>
</html>

