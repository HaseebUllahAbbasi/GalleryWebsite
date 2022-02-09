<?php 
include "connection.php";

session_start();

 
 $userId = $_SESSION['Id'];
 $photoId = $_GET['id'];
 
 $userAmount =  $_SESSION['amount'];
 $newUserAmount = $userAmount -  $_GET['price'];
 if($newUserAmount>=0)
 {
    $_SESSION['amount'] =  $newUserAmount;  
    $connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $sql = "SELECT * FROM `photostable` WHERE  id =  $photoId";
    $result = $connect->query($sql);
    $row =  $result->fetch_assoc();
    $participantId = $row['participantId'];
    echo "<br>";   
    // print_r($row);
   
    $sql = "SELECT * FROM `participanttable` where  id =  $participantId";
    $result = $connect->query($sql);
    $row =  $result->fetch_assoc();
    $participanAmount =  $row['amount']+ $_GET['price'];
   
    echo "<br>";   
    
    $sql = "UPDATE `photostable` SET `owner`= $userId WHERE id = $photoId";
    $result = $connect->query($sql);
    print_r($result);

    $sql = "UPDATE `user_table` SET `amount`= $newUserAmount WHERE id = $userId";
    $result = $connect->query($sql);
    print_r($result);
    
    $sql = "UPDATE `participanttable` SET `amount`= $participanAmount WHERE id = $participantId";
    $result = $connect->query($sql);
    print_r($result);
    
    echo "Transection Completed";

 }
 else
 {
     echo "You dont have sufficient amount";
 }
 
 


?>
