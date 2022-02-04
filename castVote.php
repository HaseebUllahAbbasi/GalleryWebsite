<?php
require_once "connection.php";

session_start();

$imageId =  $_GET['imgId'];
$eventId =  $_GET['c_id'];
$participentId =  $_GET['p_id'];
$voteCount =  $_GET['voteCount'] + 1;
$userId = $_SESSION['Id'];
$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

$sql = "SELECT * from vote_table where user_id = $userId and c_id = $eventId and photo_id = $imageId;";

$result = $connect->query($sql);

if ($result->num_rows > 0) {
    echo "  <br>";
    echo "<script> alert(' You have already voted for this image  ');</script>";

    echo ' <script> window.location.assign("http://localhost/galleryWebsite/viewCurrentEvent.php")</script>';

} else {


    $sql = "UPDATE `participantrefertable` SET `vote_count`= $voteCount WHERE `image` = $imageId ";
    // echo $sql;
    $result = $connect->query($sql);


    $sql = "INSERT INTO `vote_table`(`user_id`, `photo_id`, `c_id`) VALUES ($userId,$imageId,$eventId);";
    // echo $sql;
    $result = $connect->query($sql);

    echo ' <script> window.location.assign("http://localhost/galleryWebsite/viewCurrentEvent.php")</script>';
}
