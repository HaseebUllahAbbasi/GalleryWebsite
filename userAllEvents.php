<?php
session_start();
// $userId = $_SESSION['UserId'];
// $userName = $_SESSION['UserName'];
// echo $_SESSION['UserId'];
require_once "connection.php";

$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$sql = "SELECT contest.id , winnerId,completed, name,endTime ,winningPrice , contest.descr,contestName FROM `contest` INNER join participanttable on contest.id = participanttable.id";

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


    <h1>
        <?php 
        if(!isset($_SESSION['Id']))
        {
                echo "<script> alert(' Not Authoruzed ');</script>";
                echo ' <script> window.location.assign("http://localhost/galleryWebsite/login.php")</script>';       
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
       
    
    <div class="text-center display-3">
            All Events
            </div>
       <?php
        if ($result->num_rows > 0) 
        {
            echo "<table class='table table-striped'>";
            echo "<tr> <th> Id </th> <th> Contest Name  </th> <th> Contest Description  </th> 
            <th> Contest Winning Price  </th>
            <th> Ending Date  </th>
            <th> Winning Person  </th>   
            </tr>";
            while ($row = $result->fetch_assoc()) 
            {
                echo "<tr> <td>" . $row['id'] . " </td>  <td>" . $row['contestName'] . " </td>   <td>" . $row['descr'] . " </td>  <td>" . $row['winningPrice'] . " </td>    <td>" . $row['endTime'] . " </td>  <td>" ;
                if($row['winnerId']==0)
                {
                    echo 'Not Decided Yet' . " </td>     </tr>";
                }  
                else

                    echo  $row['name'] . " </td>     </tr>";
                 
                // print_r($row) . "<br>";
            }

            echo "</table>";
        } else {
            
            
            echo "<div class='text-center mt-5'>";
            echo "<img  class='mt-5' style='border-radius: 150px;' src='./images/not-found.gif'>";
            echo "<div class='display-5 text-center mt-3'> No Events Created Yet  </div";
            echo '</div>';
        }

        ?>

    </div>

    </div>

</body>

</html>