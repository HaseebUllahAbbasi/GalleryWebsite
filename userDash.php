<?php
require_once "connection.php";
session_start();
// $userId = $_SESSION['UserId'];
// $userName = $_SESSION['UserName'];
// echo $_SESSION['UserId'];



$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$sql = "SELECT * FROM `photostable` WHERE owner is NULL";
$result = $connect->query($sql);




$id  = $_SESSION['Id'];
// print_r($_SESSION);
$sql_2 = "SELECT * FROM `user_table` where id  = $id";
$result_2 = $connect->query($sql_2);
$row_2 = $result_2->fetch_assoc();
$id  = $_SESSION['Id'];


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
<div class="container-fluid " style="padding: 10px 20px 5px 20px;">
        <div >
            <?php
                echo "<p class='d-inline display-5' style='margin-top:20px;'  > Hi, ".  $row_2['name']. "</p>";
                echo "<a href='#'>";
                echo " <img class='d-inline' style='width: 100px; height: 100px;     border-radius: 200px;'  src='./upload/".$row_2['profile'] ."'>";

                echo "</a>";
                echo "<p class='d-inline display-6 float-right' style='float:right; margin: 20px 10px 5px 5px;' > Current Balance : ".  $row_2['amount']. "</p>";
                
            ?>
            
        </div>
    </div>



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
                
                echo "<div class='col-md-4 col-sm-6'>";
                echo '
                <div class="card mt-3 custom" style="width: 18rem; height: 30rem;">'. 
                '<img class="source mt-3"   src="upload/' . $row['source_2'] . '">'.'
                        <div class="card-body">
                            <h5 class="card-title text-center"> ' . $row['title']   .'</h5>
                                <p class="card-text text-center" > '.  $row['desciption']  .'  </p>
                                <p class="card-text text-center" > Price :  '.  $row['price']  .'  </p>
                                <div class="text-center">';
                    if($row['price']==0)
                    {
                    echo '<a href="./download.php?file='.$row['source'].'" class="btn btn-primary">Download  Photo</a>';

                    }
                    else
                    echo '<a href="./buyPhoto.php?id='.$row['id'].'&source='.$row['source'].'&title='. $row['title'].'&descrip=' . $row['desciption'].'&price= ' . $row['price'] . '     " class="btn btn-primary">Buy Photo</a>';

                    echo '</div> 
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
            echo "<div class='display-5 text-center mt-3'> No Photos Uploaded   </div";
            echo '</div>';

            // echo "<h2> No Contest </h2> ";
        }


        ?>

    </div>

    </div>

</body>

</html>