<?php
require_once "connection.php";
session_start();
// $userId = $_SESSION['UserId'];
// $userName = $_SESSION['UserName'];
// echo $_SESSION['UserId'];

$id  = $_SESSION['Id'];



$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

$firstName =  $_GET['firstName'];
$lastName =  $_GET['lastName'];
$email =  $_GET['email'];
$Description =  $_GET['Description'];

$sql = "UPDATE `participanttable` SET `descr`='$Description',`firstName`='$firstName',`lastName`='$lastName',`email`='$email' WHERE id = $id";
print_r($sql);
$result = $connect->query($sql);
if($result)
{
    echo "<script> alert(' Data has been changed ');</script>";

}
else
{
    echo "<script> alert(' There was error in changing data ');</script>";


}

print_r($_GET);
?>