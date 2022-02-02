<?php
require_once "connection.php";

$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

$name = $_GET["userName"];
$desc = $_GET["desc"];
$password = $_GET["password"];
$amount= $_GET["amount"];
$formType = $_GET["formType"];
if("registerPoster"== $formType )
{
   $sql = "INSERT INTO participanttable( `name`, `amount` ,`descr`,  `password`) VALUES ('$name', 50 ,'$desc',  '$password' )";
   
}
else if("registerUser"== $formType ) 
{
    $sql = "INSERT INTO user_table( `name`, `amount`, `bio`, `password`) VALUES ('$name', $amount, '$desc',  '$password' )";
}
$result = $connect->query($sql);

if($result==1)
{
    echo "<script> alert(' Your Account Is Successfully  Created ');</script>";
    echo ' <script> window.location.assign("http://localhost/galleryWebsite/login.php")</script>';
}

?>
