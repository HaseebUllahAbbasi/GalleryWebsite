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
        <div class="display-1 text-center mb-3"> Create Event</div>
    </div>

    <ul style="margin: 0.1rem;">
            <li><a href="./adminDash.php">Home</a></li>
            <li><a href="./createEvent.php">Create Event</a></li>
            <li><a href="./allEvents.php">View All Events</a></li>

            <li><a href="#contact"></a></li>

            <li style="float:right"><a class="active" href="#about">Logout</a></li>
        </ul>
    <div class="container my-5 offset-3 col-6 ">
        <form action="validateEvent.php">
            <input type="text" class="form-control my-1 " name="contentName" placeholder="Contest Name " required>
            <input type="text" class="form-control my-1" name="contentDesc" placeholder="Contest Description " required>
            <input type="number" class="form-control my-1" name="winningPrice" placeholder="winningPrice" required>
            <input type="time" class="form-control my-1" name="endingTime" placeholder="Contest Ending Time" required>
            <input type="date" class="form-control my-1" name="endingDate" name="" placeholder="Contest Ending Time" required>
            <div class="text-center">
                <input type="submit" class="text-center btn btn-primary my-1" value="Create Event">

            </div>
        </form>

    </div>
    </div>

</body>

</html>