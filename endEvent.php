<?php
require_once "connection.php";
session_start();
// $userId = $_SESSION['UserId'];
// $userName = $_SESSION['UserName'];
// echo $_SESSION['UserId'];



$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$eventId = $_GET['eventId'];
echo $eventId;
$sql_2 = "SELECT * FROM `participantrefertable` ORDER BY `participantrefertable`.`vote_count` DESC";
$result = $connect->query($sql_2);
if($result->num_rows>0)
{
    $row =  $result->fetch_assoc();
    print_r($row);
    $winner_Id = $row['p_id'];
    $winningImage =  $row['image'];


    $search_winner = "SELECT * FROM `participanttable` where id = $winner_Id ";
    $result = $connect->query($search_winner);
    $row =  $result->fetch_assoc();
    echo "<br>";
    print_r($row);
    $oldAmount =  $row ['amount'];
    $oldRating =  $row ['ratings'];
    $oldAmount = $oldAmount + 100; 
    $oldRating = $oldRating + 20; 

    
    $sql_reward = "UPDATE `participanttable` SET `ratings`= $oldRating ,`amount`= $oldAmount  WHERE id = $winner_Id";
    $result = $connect->query($sql_reward);

    $sql = "UPDATE `contest` SET  completed = 1, winnerId = $winner_Id   WHERE id = $eventId ";

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
    

}
else
{
    echo "<script> alert(' You Can't End The Event, There Must be A Participant ');</script>";
    echo ' <script> window.location.assign("http://localhost/galleryWebsite/adminDash.php")</script>';


}

  
?>