<?php 
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
       
        <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  
        <title>Create Event</title>
    </head>
    <body>
        <div class="container my-5 offset-3 col-6 ">
            <form action="validateEvent.php">
                    <h1>Create Event </h1>
                <input type="text" class="form-control my-1 " name="contentName" placeholder="Contest Name " required>
                <input type="text" class="form-control my-1" name="contentDesc" placeholder="Contest Description " required>
                <input type="number" class="form-control my-1" name="winningPrice" placeholder="winningPrice" required>
                <input type="time" class="form-control my-1" name="endingTime" placeholder="Contest Ending Time" required>
                <input type="date" class="form-control my-1" name="endingDate" name="" placeholder="Contest Ending Time" required>
                
                <input type="submit" class="text-center btn btn-primary my-1" value="Create Event">
            

            
            </form>

        </div>
    
    </body>
</html>