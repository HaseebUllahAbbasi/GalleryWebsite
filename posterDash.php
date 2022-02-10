<?php
require_once "connection.php";
session_start();
// $userId = $_SESSION['UserId'];
// $userName = $_SESSION['UserName'];
// echo $_SESSION['UserId'];
$connect = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

$id  = $_SESSION['Id'];
// print_r($_SESSION);
$sql_2 = "SELECT * FROM `participanttable` where id  = $id";
$result_2 = $connect->query($sql_2);
$row_2 = $result_2->fetch_assoc();



$id  = $_SESSION['Id'];



$sql = "SELECT * FROM photostable where participantId = $id";
$result = $connect->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <title>Photographer Dashboard</title>
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
                echo "<a href='./ViewProfilePoster.php?id=".$row_2['id'] ." '>";
                echo " <img class='d-inline' style='width: 100px; height: 100px;     border-radius: 200px;'  src='./upload/".$row_2['profile'] ."'>";

                echo "</a>";
                    echo "<p class='d-inline display-6 float-right' style='float:right; margin: 20px 10px 5px 5px;' > Ratings  : ".  $row_2['ratings']. "</p>";
                echo "<p class='d-inline display-6 float-right' style='float:right; margin: 20px 10px 5px 5px;' > Current Balance : ".  $row_2['amount']. "</p>";
                
            ?>
            
        </div>
    </div>

    <div class="container">
    </div>
    <h1>
        <?php
        if (!isset($_SESSION['Id'])) 
        {
            echo "<script> alert(' Not Authoruzed ');</script>";
            echo ' <script> window.location.assign("http://localhost/galleryWebsite/login.php")</script>';
        }

        ?>
    </h1>

    <ul style="margin: 0.1rem;">
        <li><a href="./posterDash.php">Home</a></li>
        <li><a href="./viewCurrentEventPoster.php">View Current event</a></li>
        <li><a href="./participateEvent.php">Participate Event</a></li>
        <li><a href="./allEventsPoster.php">View All Events</a></li>
        <li><a href="./postPhoto.php">Post A photo</a></li>
        <li><a href="./ViewAllPhotos.php">View All Photos</a></li>
        


        <li style="float:right"><a class="active" href="./login.php">Logout</a></li>
    </ul>
            
    
   
            <div class="container my-3">
                <div class="text-center">
                <div class="col-  mb-3 custom" style="background-color:#6d8aaf; border-radius :20px;   margin:0px 10px;    border: 1px solid #977d7d; padding:  20px 50px;">
            <?php
               $sql_2 = "SELECT contest.id as id ,participanttable.id as pid,participanttable.profile  ,name,contestName, winningPrice,contest.descr,participanttable.descr as DescContest FROM `contest` INNER JOIN participanttable on contest.winnerId = participanttable.id where completed = 1 ORDER BY `contest`.`id` DESC";
               $result_2 = $connect->query($sql_2);
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
                        echo  '</div> ';
                } else 
                {
                    
                    echo '<h2 class="text-center my-3"> No Data For Previous Contest   </h2>';
                }
                ?>
            </div>

                </div>

        <?php
     
        if ($result->num_rows > 0) {
            echo  "<div class='row'>";
            while ($row = $result->fetch_assoc()) {

                echo "<div class='col-md-3 col-sm-3 mb-3'>";
                echo '
                <div class="card custom" style="width: 18rem;">' .
                    '<img  class="source mt-3"  src="upload/' . $row['source'] . '">' . '
                        <div class="card-body">
                            <h5 class="card-title text-center"> ' . $row['title']   . '</h5>
                                <p class="card-text text-center" > ' .  $row['desciption']  . '  </p>
                                <p class="card-text text-center" > Price :  ' .  $row['price']  . '  </p>
                                
                                <div class="text-center">
                                
                                <a href="./EditPhoto.php?id=' . $row['id'] . '&source=' . $row['source'] . '&title=' . $row['title'] . '&descrip=' . $row['desciption'] . '&price= ' . $row['price'] . '     " class="btn btn-primary">Edit Photo</a>
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
            echo "<div> ";
            // echo "<a' href='./posterDash.php'> Upload </a>"; 
            echo "<a href='./postPhoto.php'> <button class='btn btn-primary mt-3'>Let's Upload Picture </button>  </a> ";
            echo '</div>';
            
            echo '</div>';
        }

        ?>

    </div>

    </div>

</body>

</html>