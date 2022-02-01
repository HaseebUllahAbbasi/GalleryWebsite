<?php
    include "connection.php";

    session_start();
    $connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $title =  $_GET['title'];
    $description =  $_GET['desciption'];
    $price =  $_GET['price'];
    $id =$_GET['id'];
    $sql  = "UPDATE `photostable` SET `title`='$title',`desciption`='$description',`price`='$price' WHERE id = $id;";
    echo  $sql;
    $result =  $connect->query($sql);
    if($result)
    {
        echo "<script> alert(' Updated Data for the image  ');</script>";
        echo ' <script> window.location.assign("http://localhost/galleryWebsite/posterDash.php")</script>';
    }
    else
    {
        echo "<script> alert(' Could not updated the data   ');</script>";
        echo ' <script> window.location.assign("http://localhost/galleryWebsite/posterDash.php")</script>';

    }

?>