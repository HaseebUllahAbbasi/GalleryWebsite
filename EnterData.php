<?php
require_once "connection.php";

$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

$name = $_POST["userName"];
$desc = $_POST["desc"];
$password = $_POST["password"];
$amount= $_POST["amount"];
$formType = $_POST["formType"];

if("registerPoster"== $formType )
{
    $images = $_FILES["fileToUpload"]['name'];
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "upload/".$_FILES["fileToUpload"]["name"]);
   $sql = "INSERT INTO participanttable( `name`, `amount` ,`descr`,  `password`, `profile`) VALUES ('$name', 50 ,'$desc',  '$password', '$images' )";
   
}
else if("registerUser"== $formType ) 
{
    $images = $_FILES["fileToUpload"]['name'];
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "upload/".$_FILES["fileToUpload"]["name"]);
    $sql = "INSERT INTO user_table( `name`, `amount`, `bio`, `password`, `profile`) VALUES ('$name', $amount, '$desc',  '$password', '$images' )";
}
$result = $connect->query($sql);

if($result==1)
{
    echo "<script> alert(' Your Account Is Successfully  Created ');</script>";
    echo ' <script> window.location.assign("http://localhost/galleryWebsite/login.php")</script>';
}

?>
