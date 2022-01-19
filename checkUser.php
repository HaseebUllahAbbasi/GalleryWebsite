
<?php

require_once "connection.php";


$userName = $_GET["userName"];
$password = $_GET["password"];
$typeOfUser = $_GET["typeOfUser"];

$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


if ($typeOfUser == "user") {
    echo "User is About to Login";
} else if ($typeOfUser == "photographer") {
    echo "photographer is About to Login";
} else {
    echo "Admin  is About to Login";
    // $sql = `SELECT * FROM ${TABLE_ADMIN}  WHERE User = '$user_1'`;

    $sql = "SELECT * FROM admin_table where name = '$userName' and password = '${password}' ";
    $result = $connect->query($sql);
    $rows = $result->num_rows;
    if ($rows == 1) {
        echo "<script> alert(' You Have Logined ');</script>";
        // header("Location: yes_lite.php");
    } else {
        echo "<script> alert(' You Have Not Logined ');</script>";
    }
}

?>