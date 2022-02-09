<?php
require_once "connection.php";
session_start();
// $userId = $_SESSION['UserId'];
// $userName = $_SESSION['UserName'];
// echo $_SESSION['UserId'];



$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$sql = "SELECT * FROM `contest` WHERE completed = 0;";
$result = $connect->query($sql);
if($result->num_rows>0)
{
    $row = $result->fetch_assoc();


    $id_of_event =  ($row['id']);
    // echo $id_of_event ;
    $sql = "SELECT * FROM `participantrefertable` INNER JOIN photostable ON participantrefertable.image = photostable.id where participantrefertable.c_id = $id_of_event";
    

// $sql = "SELECT * FROM photostable";
    $result = $connect->query($sql);


}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <title>Photographer : Current Event</title>
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
        
        .source {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 5px;
            width: 250px;
            height: 250px;
            /* align-items: center; */
            align-self: center;
        }

    </style>
</head>

<body>

    <div class="container">
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
        if ($result->num_rows > 0) 
        {
            echo  "<div class='row'>";

            while ($row = $result->fetch_assoc()) {
                
                echo "<div class='col-3 mb-3'>";
                echo '
                <div class="card" style="width: 18rem;">'. 
                '<img  class="source mt-1"  src="upload/' . $row['source'] . '">'.'
                        <div class="card-body">
                            <h5 class="card-title text-center"> ' . $row['title']   .'</h5>
                                <p class="card-text text-center" > '.  $row['desciption']  .'  </p>
                                <p class="card-text text-center" > Price :  '.  $row['price']  .'  </p>
                                <p class="text-center">
                                Vote Count : '. $row['vote_count']  .  '

                                </p>

                                <div class="text-center">
                <a href="./castVote.php?imgId='.$row['id'].'&c_id=' . $row['c_id'].'&p_id=' . $row['p_id'].'&voteCount=' . $row['vote_count'] . '  " class="btn btn-primary">Vote </a>

                                
                                </div> 
                        </div>
                </div>
                ';
                


                echo "</div>";
            }

            echo  "</div>";
        } else 
        {
            echo "<div class='text-center mt-5'>";
            echo "<img  class='mt-5' style='border-radius: 150px;' src='./images/not-found.gif'>";
            echo "<div class='display-5 text-center mt-3'> No Contest In Progress At the Moment  </div";
            
            echo '</div>';

        }

        ?>

    </div>

    </div>


</body>

</html> 