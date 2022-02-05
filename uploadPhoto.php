<?php

include_once "connection.php";
    session_start();
    $posterId =  $_SESSION["Id"];

    // echo $poster_id;
    
    $images = $_FILES["fileToUpload"]['name'];
    $connection = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    // echo ($images);
    $title = $_POST["title"];
    $desciption = $_POST["desciption"];
    $participantId = $_POST["participantId"];
    $price= $_POST["price"];
    
    $sql = "INSERT INTO photostable (`title`, `desciption`, `source`,`participantId`, `price`) VALUES ('$title', '$desciption','$images' , $posterId, $price)";
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "upload/".$_FILES["fileToUpload"]["name"]);
    $res = $connection->query($sql);

    
    if($res)
    {
    
        echo "<script> alert(' Photo Uploaded');</script>";
        echo ' <script> window.location.assign("http://localhost/galleryWebsite/posterDash.php")</script>';       

    }
    else 
    {
        echo "<script> alert(' Photo Not Uploaded');</script>";
        echo ' <script> window.location.assign("http://localhost/galleryWebsite/posterDash.php")</script>';       
    }

?>