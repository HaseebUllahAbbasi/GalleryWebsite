<?php
require_once "connection.php";
session_start();
// $userId = $_SESSION['UserId'];
// $userName = $_SESSION['UserName'];
// echo $_SESSION['UserId'];



$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <title>Poster Dashboard</title>
    <style>
        body {
            background-color: silver;
        }

        img {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: 250px;
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

    <div class="container">
        <div class="display-1 text-center mb-3">Poster Dashboard</div>
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



        <li style="float:right"><a class="active" href="./login.php">Logout</a></li>
    </ul>
    <div class="container my-3">

        <?php
        echo  "<div class='row'>";


        echo "<div>";
        echo '
                <div class="text-center" >' .
            '<img  class=""  src="upload/' . $_GET['source'] . '">' . '
                        
                </div>
                    <div class="card-body">
                </div>';
            echo '<form  class="container col-6 offset-3" action="./changePhotoData.php" method="GET" >
                    <input class="form-control" type="text" value=" ' .  $_GET['title'] . ' " name="title" placeholder="Title" required>
                    <input type="text" name="id" value="' . $_GET['id'] . '" hidden >
                    <input class="form-control" type="text" value=" ' .  $_GET['descrip'] . '"  name="desciption" placeholder="Description" required>
                    <input class="form-control" type="number" name="price" value=' . $_GET['price'] . trim(" ") . ' placeholder="Price"  required min="0">
                    <div class="text-center  container col-6 offset-3  ">
                        <input class="form-control btn btn-primary" style="margin:2em; margin-left: 0;" type="submit">
                    </div>
                </form>';



        echo "</div>";



        echo  "</div>";

        ?>

    </div>

    </div>

</body>

</html>