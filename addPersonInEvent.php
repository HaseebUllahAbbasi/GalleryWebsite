<?php 
include "connection.php";

 session_start();
    $userId =  $_SESSION['Id'];
    $eventId  = $_SESSION['eventId'];  
    echo $eventId;
    $image = $_GET['id'];;
  $connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

  $sql = "SELECT * FROM `participantrefertable` where p_id = $userId and c_id = $eventId";
  // $image = "download.jfif";

  $result = $connect->query($sql);
    
  $rows = $result->num_rows;
  if ($rows >0 ) 
  {
    echo "<script> alert(' You are already enrolled in it  ');</script>";
    // header("Location: userDash.php");
    echo ' <script> window.location.assign("http://localhost/galleryWebsite/posterDash.php")</script>';

  }
  else
  {      

    $sql = "INSERT INTO `participantrefertable`(`c_id`, `p_id`, `image`  ) VALUES ($eventId,$userId,$image);";
    echo $sql;
    $result = $connect->query($sql);
    if($result)
    {
        
        echo "<script> alert(' You enrolled in the event  ');</script>";
    // header("Location: userDash.php");
        echo ' <script> window.location.assign("http://localhost/galleryWebsite/posterDash.php")</script>';
        

    }
    else
    {

    }
    

  }
