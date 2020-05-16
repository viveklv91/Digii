<?php
//start session
session_start();

//check if the required details are entered
if ((isset($_GET["aID"])) && ($_GET["aID"]!=null) && (isset($_GET["adUrl"])) && ($_GET["adUrl"]!=null)) {

    $adId = $_GET["aID"];
    $adUrl = $_GET["adUrl"];
    $userID = $_SESSION["user_id"];
    $dateC = date("Y-m-d");

    //check connection
    include '../db_conn.php';
    $sql = "SELECT * from `tblclick` WHERE `adID`='".$adId."' AND `dateClicked`='".$dateC."';";
    $result = mysqli_query($conn, $sql);
    //echo $sql;
    if (mysqli_num_rows($result) > 0) {
        mysqli_close($conn);
        $_SESSION['fail_message'] = "Ad already clicked.";
        header('Location:../welcomepublisher/ppcads.php');
    }else{
        $sql = "INSERT INTO `tblclick`(`clickID`, `adID`, `userID`, `dateClicked`) VALUES (null,'$adId',
            '$userID','$dateC');";
        $result = mysqli_query($conn, $sql);
        //echo $sql;
        if($result){
            $sql1 = "SELECT * FROM `tblpayout` WHERE `userID`='".$userID."';";
            $result1 = mysqli_query($conn, $sql1);
            //echo $sql1;
            if (mysqli_num_rows($result1)>0) {
                $row1 = mysqli_fetch_assoc($result1);
                $sql2 = "UPDATE `tblpayout` SET `amount`='".$row1["amount"]."'+10 WHERE `userID`='".$userID."';";
                $result2 = mysqli_query($conn, $sql2);
                //echo $sql2;
        if ($result2) {
        mysqli_close($conn);
        //echo $sql;
        $_SESSION['success_message'] = "Succesfully clicked ad.";
        $_SESSION['viewad'] = "viewad";
        $_SESSION['url'] = $adUrl;
        header('Location:../welcomepublisher/ppcads.php');

        } else {
        mysqli_close($conn);
        $_SESSION['fail_message'] = "Ad click was unsuccessful";
        header('Location:../welcomepublisher/ppcads.php');
        }
    }else{
        $sql1 = "INSERT INTO `tblpayout`(`payoutID`, `userID`, `amount`) VALUES (null,'$userID',
            '10');";
        $result1 = mysqli_query($conn, $sql1);
        echo $sql1;
        if ($result1) {
        mysqli_close($conn);
        //echo $sql;
        $_SESSION['success_message'] = "Succesfully clicked ad.";
        header('Location:http://'.$adUrl);
        } else {
        mysqli_close($conn);
        $_SESSION['fail_message'] = "Ad click was unsuccessful";
        header('Location:../welcomepublisher/ppcads.php');
        }
    }
    }
}
}else{
    mysqli_close($conn);
    $_SESSION['fail_message'] = "Invalid details";
    header('Location:../welcomepublisher/ppcads.php');
}
?>

<!-- click ad -->
