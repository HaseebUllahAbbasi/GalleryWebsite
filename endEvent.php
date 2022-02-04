<?php
require_once "connection.php";
session_start();
// $userId = $_SESSION['UserId'];
// $userName = $_SESSION['UserName'];
// echo $_SESSION['UserId'];



$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$eventId = $_GET['eventId'];
echo $eventId;
$sql = "UPDATE `contest` SET  completed = 1 WHERE id = $eventId ";
$result = $connect->query($sql);
if($result)
{
    echo "<script> alert(' You have ended the Event ');</script>";
    echo ' <script> window.location.assign("http://localhost/galleryWebsite/adminDash.php")</script>';
}
else
{

    echo "<script> alert(' You have not  ended the Event  ');</script>";
    echo ' <script> window.location.assign("http://localhost/galleryWebsite/adminDash.php")</script>';

}
    
?>