<?php 
require_once "connection.php";

$contestName = $_GET['contentName'];

$contestDesc = $_GET['contentDesc'];
$WinningPrice = $_GET['winningPrice'];
$endingTime = $_GET['endingTime'];
$endingDate = $_GET['endingDate'];

$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$sql = "INSERT INTO contest ( contestName, winningPrice, endTime, winnerId, descr ) VALUES ('$contestName','$WinningPrice', '$endingDate'  , 0, '${contestDesc}') ";

 $result =  $connect->query($sql);
    if($result)
    {
        header("Location: ./adminDash.php");
    }
    else
    {
        echo "<script> alert('contest was not created') </script>";
        header("Location: ./adminDash.php");

    }


?>
