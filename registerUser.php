<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="./styles.css" />
    <title>Login</title>
</head>

<body>

    <div class="container my-5">
        <form action="registerUserData.php">

            <div class="offset-3 col-6">
                <h1 class="text-center">
                    Register User
                </h1>
                <input class="form-control my-1" type="text" placeholder="User Name" name="userName" id="userName">
                <input class="form-control my-1" type="text" name="desc" id="desc" placeholder="Description">
                <input class="form-control my-1" type="number" placeholder="Amount" name="amount" id="amount" min="10" max="1000">
                <input class="form-control my-1" type="password" name="password" id="password" placeholder="Password">
                <div class="row">

                    <a  href="./login.php" class="my-3 offset-1 col-4  btn btn-primary" >Login</a>
                    <input type="submit" class="my-3 offset-2 col-4  btn btn-primary" value="Register"></input>
                
                </div>
                    
            </form>


    </div>


    </div>

</body>

</html>