<?php
require_once "connection.php";
session_start();
// $userId = $_SESSION['UserId'];
// $userName = $_SESSION['UserName'];
// echo $_SESSION['UserId'];

$id  = $_SESSION['Id'];



$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$sql = "SELECT * FROM `participanttable` where  id = $id";
$result = $connect->query($sql);
$row =  $result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <title>Photographer Profile</title>
    <style>
        body {
            background-color: silver;
        }

        .source {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 5px;
            width: 250px;
            height: 250px;
            /* align-items: center; */
            align-self: center;
        }


        div {
            font-family: 'Trebuchet MS', sans-serif;

        }

        ul {
            border-radius: 0.4rem;
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }


        li a:hover:not(.active) {
            background-color: #70A0AF;
            color: black;
            text-decoration: none;
            font-weight: bolder;

        }

        .active {
            background-color: #3F7CAC;
            color: white;
            font-weight: bolder;
        }
    </style>
</head>

<body>
    <div class="container-fluid " style="padding: 10px 20px 5px 20px;">
        <div>
            <?php
            echo "<p class='d-inline display-5' style='margin-top:20px;'  > Hi, " .  $row['name'] . "</p>";
            echo "<a href='./ViewProfilePoster.php?id=" . $row['id'] . " '>";
            echo " <img class='d-inline' style='width: 100px; height: 100px;     border-radius: 200px;'  src='./upload/" . $row['profile'] . "'>";
            echo "</a>";
            echo "<p class='d-inline display-6 float-right' style='float:right; margin: 20px 10px 5px 5px;' > Ratings  : " .  $row['ratings'] . "</p>";
            echo "<p class='d-inline display-6 float-right' style='float:right; margin: 20px 10px 5px 5px;' > Current Balance : " .  $row['amount'] . "</p>";

            ?>

        </div>
    </div>


    <h1>
        <?php
        if (!isset($_SESSION['Id'])) {
            echo "<script> alert(' Not Authoruzed ');</script>";
            echo ' <script> window.location.assign("http://localhost/galleryWebsite/login.php")</script>';
        }

        ?>
    </h1>

    <ul style="margin: 0.1rem;">
        <li><a href="./posterDash.php">Home</a></li>
        <li><a href="./participateEvent.php">Participate Event</a></li>
        <li><a href="./allEventsPoster.php">View All Events</a></li>
        <li><a href="./postPhoto.php">Post A photo</a></li>
        <li><a href="./ViewAllPhotos.php">View All Photos</a></li>


        <li style="float:right"><a class="active" href="./login.php">Logout</a></li>
    </ul>
    <div class="container  text-center">
            <div class="col-4 offset-4">
            <form action="./poster_changeData.php" method="GET" >

<div class="">
    <h1 class="text-center">
        Register Photographer
    </h1>

    <input class="form-control my-1" type="text" placeholder="First Name" name="firstName" id="firstName" required>
    <input class="form-control my-1" type="text" name="lastName" id="lastName" placeholder="Last Name" required>
    <input class="form-control my-1" type="text" placeholder="Email" name="email" id="email"  required>
    <input class="form-control my-1" type="text" placeholder="Description" name="Description" id="Description" min="10" max="1000" required>
 

    <div class="text-center">
        <input type="submit" id="submit" class="my-3  col-4  btn btn-success" value="Change Data"></input>

    </div>

</form>


            </div>

    </div>

    </div>


</body>

</html>