
<?php

require_once "connection.php";

session_start();

$userName = $_GET["userName"];
$password = $_GET["password"];
$typeOfUser = $_GET["typeOfUser"];

$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


if ($typeOfUser == "user") 
{
    
    $sql = "SELECT * FROM `user_table` WHERE name = '$userName' and password = '$password'";
    $result = $connect->query($sql);
    
    $rows = $result->num_rows;
    if ($rows >0 ) 
    {

        $rows = $result->fetch_assoc();
        // print_r($rows);
        
        $_SESSION['Id'] =$rows['id'];        
        $_SESSION['UserName'] =$rows['name'];
        $_SESSION['wrongPassword'] = 0 ;
        echo "<script> alert(' You Have Logined ');</script>";
        // header("Location: userDash.php");
        echo ' <script> window.location.assign("http://localhost/galleryWebsite/userDash.php")</script>';

    } else 
    {
        $_SESSION['wrongPassword'] =1;
        echo "<script> alert(' Wrong UserName or password ');</script>";
        echo ' <script> window.location.assign("http://localhost/galleryWebsite/login.php")</script>';
    }

} else if ($typeOfUser == "photographer") 
{
    // echo "photographer is About to Login";
    $sql = "SELECT * FROM `participanttable` WHERE name = '$userName' and password = '$password'";
    $result = $connect->query($sql);

    $rows = $result->num_rows;
    if ($rows >0 ) 
    {

        $rows = $result->fetch_assoc();
        // print_r($rows);
        
        $_SESSION['Id'] =$rows['id'];        
        $_SESSION['UserName'] =$rows['name'];
        $_SESSION['wrongPassword'] = 0 ;
        // echo "<script> alert(' You Have Logined ');</script>";
        // header("Location: userDash.php");
        echo ' <script> window.location.assign("http://localhost/galleryWebsite/posterDash.php")</script>';

    } else 
    {
        $_SESSION['wrongPassword'] =1;
        echo "<script> alert(' Wrong UserName or password ');</script>";
        // echo ' <script> window.location.assign("http://localhost/galleryWebsite/login.php")</script>';
    }
    



} else {
    echo "Admin  is About to Login";
    // $sql = `SELECT * FROM ${TABLE_ADMIN}  WHERE User = '$user_1'`;

    $sql = "SELECT * FROM admin_table where name = '$userName' and password = '${password}' ";
    $result = $connect->query($sql);
    
    $rows = $result->num_rows;
    if ($rows == 1) 
    {
        $rows = $result->fetch_assoc();
        print_r($rows);
        $_SESSION['Id'] =$rows['id'];
        $_SESSION['UserId'] =$rows['userId'];        
        $_SESSION['UserName'] =$rows['name'];
        $_SESSION['wrongPassword'] = 0 ;
        echo "<script> alert(' You Have Logined ');</script>";
        header("Location: adminDash.php");
    } else 
    {
        $_SESSION['wrongPassword'] =1;
        echo "<script> alert(' Wrong UserName or password ');</script>";
        header("Location: login.php");

    }
}

?>