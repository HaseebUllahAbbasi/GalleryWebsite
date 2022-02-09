<?php
require_once "connection.php";

$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

$name = $_POST["userName"];
$email = $_POST["email"];
$password = $_POST["password"];
$amount= $_POST["amount"];
$formType = $_POST["formType"];

$sql_3 = "select * from all_users where user_Name = '$name'";
$result = $connect->query($sql_3);
    
    if( $result->num_rows > 0) 
    {
        echo "<script> alert(' UserName is Already Taken Chose a different User Name  ');</script>";
        
        if("registerPoster"== $formType )
        {
            echo ' <script> window.location.assign("http://localhost/galleryWebsite/registerUser.php")</script>';
        } 
        else if("registerUser"== $formType )
        {
            
            echo ' <script> window.location.assign("http://localhost/galleryWebsite/registerPoster.php")</script>';
        } 



    }
    else
    {
        if("registerPoster"== $formType )
            {
                $images = $_FILES["fileToUpload"]['name'];
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "upload/".$_FILES["fileToUpload"]["name"]);
            $sql = "INSERT INTO participanttable( `name`, `amount` ,`email`,  `password`, `profile`) VALUES ('$name', $amount ,'$email',  '$password', '$images' )";
            $sql_2 = "INSERT INTO `all_users`( `user_Name`, `email`, `password`, `account_type`) VALUES ('$name', '$email','$password', 'poster')";
            
            }
            else if("registerUser"== $formType ) 
            {
                $images = $_FILES["fileToUpload"]['name'];
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "upload/".$_FILES["fileToUpload"]["name"]);
                $sql = "INSERT INTO user_table( `name`, `amount`, `email`, `password`, `profile`) VALUES ('$name', $amount, '$email',  '$password', '$images' )";
            $sql_2 = "INSERT INTO `all_users`( `user_Name`, `email`, `password`, `account_type`) VALUES ('$name', '$email','$password', 'user_')";

            }
            $result = $connect->query($sql);
            $result = $connect->query($sql_2);

            if($result==1)
            {
                echo "<script> alert(' Your Account Is Successfully  Created ');</script>";
                echo ' <script> window.location.assign("http://localhost/galleryWebsite/login.php")</script>';
            }
            else
            {
                echo "<script> alert(' Error ');</script>";

            }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Regiser </title>
    </head>
    <body>
        
    </body>
    </html>
