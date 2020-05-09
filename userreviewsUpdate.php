<?php
//require("db_conn.php");
if(isset($_POST['fullName']) && isset($_POST['email']) && isset($_POST['comment'])){
    if(!empty($_POST['fullName']) && !empty($_POST['email']) && !empty($_POST['comment']))
    {


function current_url()
{
    $url      = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']);
    $validURL = str_replace("&", "&amp", $url);
    return $validURL;
}
//die(current_url());

      //get sentimant value
      $post = ['review' => $_POST['comment']];
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, current_url().'/../php-sentiment-analyser/api.php');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
      $response = curl_exec($ch);

      //print($response);
      $result = json_decode($response);
      $rating = $result->rating;
      
      
      curl_close($ch);
      //$reviewID = $_POST["reviewID"];
      $fullName = $_POST["fullName"];
      $email = $_POST["email"];
      $comment = $_POST["comment"];

      date_default_timezone_set('Asia/Colombo');
      $datetime = date("Y-m-d H:i:s");
      $date = date("Y-m-d");
      
      //$rating = $_SESSION['rating'];
      $d = date("Y-m-d");
      $sql = "INSERT INTO `tblreview` (`reviewID`, `fullName`, `email`, `comment`, `rating`) 
                VALUES (null, '".$_POST['fullName']."', '".$_POST['email']."', '".$_POST['comment']."', '".$rating."' ); ";
            $result = $conn->query($sql);
            //echo $sql;
            $MSG = "<p>Thanks for your review, Review successfully saved!</p>";

        }else{
            $MSG = "<p>Please fill all the fields!</p>";
        }



    }
    else{
$MSG = '';
    }
?>