<?php
require_once "connection.php";
session_start();
// $userId = $_SESSION['UserId'];
// $userName = $_SESSION['UserName'];
// echo $_SESSION['UserId'];



$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$sql = "SELECT * FROM photostable";
$result = $connect->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <title>User Dashboard</title>
    <style>
        body {
            background-color: silver;
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

    <div class="container">
        <div class="display-1 text-center mb-3">User Dashboard</div>
    </div>
    <h1>
        <?php 
        if(!isset($_SESSION['Id']))
        {
                echo "<script> alert(' Not Authoruzed ');</script>";
                // echo ' <script> window.location.assign("http://localhost/galleryWebsite/login.php")</script>';       
        }        
        
        ?>
    </h1>

    <ul style="margin: 0.1rem;">
        <li><a href="./userDash.php">Home</a></li>
        <li><a href="./myPurchasedPhotos.php">My Photos</a></li>
        <li><a href="./viewCurrentEvent.php">View Current Event </a></li>
        <li><a href="./userAllEvents.php">View All Events</a></li>
        
        <li><a href="#contact"></a></li>

        <li style="float:right"><a class="active" href="./login.php">Logout</a></li>
    </ul>
    <div class="container my-3">
        <!-- <p class="display-1 text-center"> to implement the Current Event Stats or render the No Evetns Running</p> -->

        <?php
        if ($result->num_rows > 0) {
            echo  "<div class='row'>";

            while ($row = $result->fetch_assoc()) {
                
                echo "<div class='col-3'>";
                echo '
                <div class="card" style="width: 18rem;">'. 
                '<img   src="upload/' . $row['source'] . '">'.'
                        <div class="card-body">
                            <h5 class="card-title text-center"> ' . $row['title']   .'</h5>
                                <p class="card-text text-center" > '.  $row['desciption']  .'  </p>
                                <p class="card-text text-center" > Price :  '.  $row['price']  .'  </p>
                                
                                <div class="text-center">
                                
                                <a href="./buyPhoto.php?id='.$row['id'].'&source='.$row['source'].'&title='. $row['title'].'&descrip=' . $row['desciption'].'&price= ' . $row['price'] . '     " class="btn btn-primary">Buy Photo</a>
                                </div> 
                        </div>
                </div>
                ';


                echo "</div>";
            }


            echo  "</div>";
        } else {
            echo "<h2> No Contest </h2> ";
        }


        ?>

    </div>

    </div>

</body>

</html>