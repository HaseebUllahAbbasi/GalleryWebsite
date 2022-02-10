<?php
require_once "connection.php";
session_start();
// $userId = $_SESSION['UserId'];
// $userName = $_SESSION['UserName'];
// echo $_SESSION['UserId'];
$eventId =   $_GET['eventId'];
// echo $eventId;





$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$sql_2 = "select * from contest where id = $eventId";

$sql = "SELECT * FROM photostable INNER JOIN participantrefertable on photostable.id = participantrefertable.image where participantrefertable.c_id = $eventId ORDER by participantrefertable.vote_count;";
$result = $connect->query($sql);
$result_2 = $connect->query($sql_2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <title>Admin Dashboard</title>
    <style>
        body {
            background-color: silver;
        }

        .custom
        {
            box-shadow: 8px 8px 12px 4px rgba(0, 0, 0, 0.2), 8px 6px 20px 8px rgba(0, 0, 0, 0.19);
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

    <div class="container">
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
        <li><a href="./adminDash.php">Home</a></li>
        <li><a href="./createEvent.php">Create Event</a></li>
        <li><a href="./allEvents.php">View All Events</a></li>

        <li style="float:right"><a class="active" href="./login.php">Logout</a></li>
    </ul>
    <div class="container my-3">
        
            <?php 
                $row = $result_2->fetch_assoc();
                // print_r($row);
                echo "<div class='text-center'>"; 
                echo "<h1>Contest Name :  " .$row['contestName']. "  </h1>";            
                echo "<h2>Winning Prize :  " .$row['winningPrice']. "  </h2>";            
                echo "<h2>Ending Date  :  " .$row['endTime']. "  </h2>";            
                echo "<h2> Description  :  " .$row['descr']. "  </h2>";            
                echo "</div>";
            ?>

        <?php
        if ($result->num_rows > 0) {
            echo  "<div class='row'>";

            while ($row = $result->fetch_assoc()) 
            {
                // print_r($row);
                echo "<div class='col-3 mb-3  '>";
                echo '
                <div class="card custom" style="width: 18rem;">' .
                    '<img  class="source mt-1" src="upload/' . $row['source'] . '">' . '
                        <div class="card-body">
                            <h3 class="card-title text-center"> ' . $row['title']   . '</h3>
                                <h6 class="card-text text-center" > ' .  $row['desciption']  . '  </h6>
                                <h5 class="card-text text-center" > Price :  ' .  $row['price']  . '$  </h5>
                                <h5 class="card-text text-center" > Votes  :  ' .  $row['vote_count']  . '  </h5>
                                
                                <div class="text-center">
                                
                                </div> 
                        </div>
                </div>
                ';


                echo "</div>";
                 
            }
            echo  "</div>";
        } else 
        {

            // <h5 class="card-title text-center"> ' . 'By : '   .  'Simpl User'   . '</h5>

            // <a href="./EditPhoto.php?id='.$row['id'].'&source='.$row['source'].'&title='. $row['title'].'&descrip=' . $row['desciption'].'&price= ' . $row['price'] . '     " class="btn btn-primary">Edit Photo</a>

            echo "<div class='text-center'>";
            echo "<img  class='mt-5' style='border-radius: 150px;' src='./images/not-found.gif'>";
            echo "<h2> Photots Not Uploaded yet by PhotoGraphers </h2> ";
            echo '</div>';
        }

        ?>

    </div>

    </div>

</body>

</html>