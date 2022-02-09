<?php 
require_once "connection.php";

$contestName = $_GET['contentName'];

$contestDesc = $_GET['contentDesc'];
$WinningPrice = $_GET['winningPrice'];
$endingTime = $_GET['endingTime'];
$endingDate = $_GET['endingDate'];


$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$sql = "select * from contest where completed = 1";
$result =  $connect->query($sql);
if($result->num_rows>0)
{
    echo "<script> alert('You can not create event if it is already created  ');</script>";
    // header("Location: userDash.php");
    echo ' <script> window.location.assign("http://localhost/galleryWebsite/adminDash.php")</script>';


}
else
{
    $sql = "INSERT INTO contest ( contestName, winningPrice, endTime, winnerId, descr ) VALUES ('$contestName','$WinningPrice', '$endingDate'  , 0, '${contestDesc}') ";
     $result =  $connect->query($sql);
    if($result)
    {
        echo "<script> alert('Event Has been created ');</script>";
        echo ' <script> window.location.assign("http://localhost/galleryWebsite/adminDash.php")</script>';
    }
    else
    {
        echo "<script> alert('contest was not created') </script>";
        // header("Location: ./adminDash.php");
        echo ' <script> window.location.assign("http://localhost/galleryWebsite/adminDash.php")</script>';


    }



}
