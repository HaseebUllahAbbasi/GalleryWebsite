<?php
require_once "connection.php";
session_start();
// $userId = $_SESSION['UserId'];
// $userName = $_SESSION['UserName'];
// echo $_SESSION['UserId'];



$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$sql = "SELECT * FROM contest where completed = 0";
$sql_2 = "SELECT contest.id as id ,participanttable.id as pid,participanttable.profile  ,name,contestName, winningPrice,contest.descr,participanttable.descr as DescContest FROM `contest` INNER JOIN participanttable on contest.winnerId = participanttable.id where completed = 1 ORDER BY `contest`.`id` DESC";
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
        .custom
        {
            box-shadow: 8px 8px 12px 4px rgba(0, 0, 0, 0.2), 8px 6px 20px 8px rgba(0, 0, 0, 0.19);
        }
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
        <div class="display-1 text-center mb-3"> Admin Dashboard</div>
    </div>
    <h1>

        <?php
        if (!isset($_SESSION['UserId'])) {
            if ($_SESSION['UserId'] != 'admin') {
                header("Location: login.php");
            }
            header("Location: login.php");
        }

        ?>
    </h1>

    <ul style="margin: 0.1rem;">
        <li><a href="./adminDash.php">Home</a></li>
        <li><a href="./createEvent.php">Create Event</a></li>
        <li><a href="./allEvents.php">View All Events</a></li>

        <li><a href="#contact"></a></li>

        <li style="float:right"><a class="active" href="./login.php">Logout</a></li>
    </ul>
    <div class="container my-3">

        <div class="d-flex justify-content-evenly">
            <div class="col-6 custom" style="background-color:#3ea57a; border-radius :20px; margin:0px 10px;border: 1px solid #977d7d; padding:  20px 50px;">
                <?php
                if ($result->num_rows > 0) 
                {
                     $row = $result->fetch_assoc(); 
                    
                        echo '<h2 class="text-center my-3">  Current Contest</h2>';
                        echo '<div class="row">'; 
                        echo '<h3 class=" col-6"> Contest Name :  </h3>';
                        echo '<h3 class=" col-6 text-end "> ' .$row['contestName'] .'  </h3>';
                        echo  '</div>';

                        echo '<div class="row">'; 
                        echo '<h3 class=" col-4 "> Description :  </h3>';
                        echo '<h3 class=" col-8 text-end "> ' .$row['descr'] .'  </h3>';
                        echo  '</div>';

                        
                        echo '<div class="row">'; 
                        echo '<h3 class=" col-6"> Prize :  </h3>';
                        echo '<h3 class=" col-6 text-end "> ' .$row['winningPrice'] .'  </h3>';
                        echo  '</div>';

                        
                        echo '<div class="row">'; 
                        echo '<h3 class=" col-6"> Status :  </h3>';
                        echo '<h3 class=" col-6 text-end "> ' . 'Not Completed Yet' .'  </h3>';
                        echo  '</div>';
                        


                        echo '<div class="d-flex justify-content-evenly">';
                        echo '<a class="btn btn-success " href="./endEvent.php?eventId='. $row['id'] .'"> End Contest </a>';          
                        echo '<a class="btn btn-primary " href="./viewEventAdmin.php?eventId='. $row['id'] .'"> View Contest </a>';          
                        echo  '</div> ';
                } else {
                    echo '<h2 class="text-center my-3"> No Current Contest  </h2>';
                }
                ?>
            </div>
            <div class="col-7 custom" style="background-color:#6d8aaf; border-radius :20px;   margin:0px 10px;    border: 1px solid #977d7d; padding:  20px 50px;">
            <?php
                if ($result_2->num_rows > 0) 
                {
                     $row = $result_2->fetch_assoc(); 
                    
                        echo '<h2 class="text-center my-3">  Previous  Contest</h2>';
                        echo '<div class="row">'; 
                        echo '<h3 class=" col-6"> Contest Name :  </h3>';
                        echo '<h3 class=" col-6 text-end "> ' .$row['contestName'] .'  </h3>';
                        echo  '</div>';

                        echo '<div class="row">'; 
                        echo '<h3 class=" col-4 "> Description :  </h3>';
                        echo '<h3 class=" col-8 text-end "> ' .$row['descr'] .'  </h3>';
                        
                        echo  '</div>';

                        
                        echo '<div class="row">'; 
                        echo '<h3 class=" col-6"> Prize :  </h3>';
                        echo '<h3 class=" col-6 text-end "> ' .$row['winningPrice'] .'  </h3>';
                        echo  '</div>';

                        
                        echo '<div class="row">'; 
                        echo '<h3 class=" col-6"> Status :  </h3>';
                        echo '<h3 class=" col-6 text-end "> ' . 'Completed' .'  </h3>';
                        echo  '</div>';
                        echo '<h3 class="text-center"> Winner :  </h3>';

                        echo '<div class="text-center my-3">'; 
                        echo '<h3 class=""  style=" color: #ffffff;" > ' . $row['name'] .'  </h3>';

                        echo '<img class="text-center" style="width: 100px;"; src="images/tropy.png">' ;
                        echo '<img  class="" style="width: 100px; border-radius:200px"; src="upload/'. $row['profile'].'">' ;
                        echo  '</div>';
                        echo '<div class="d-flex justify-content-evenly">';
                        echo '<a class="btn btn-primary " href="./viewEventAdmin.php?eventId='. $row['id'] .'"> View Contest </a>';          
                        echo  '</div> ';
                } else 
                {
                    
                    echo '<h2 class="text-center my-3"> No Data For Previous Contest   </h2>';
                }
                ?>
            </div>

        </div>


    </div>

    </div>

</body>

</html>