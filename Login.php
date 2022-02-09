<?php
session_start();
require_once "connection.php";
if(isset($_SESSION['UserId']))
{
  session_destroy();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="./styles.css" />
  <title>Login</title>
  <style>
    .container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}


  </style>
</head>

<body>
  <div class="sidenav" style="background-color: #272727;">
    <div class="login-main-text">
      <img src="mainpic.png"/>
  
    </div>
  </div>

  <div class="main">
    <div class="col-md-6 col-sm-12">
      <div class="" style="margin-left:100px; margin-top:130px;">
        <form class="" action="checkUser.php">
          <?php
          if (isset(($_SESSION['wrongPassword']))) {
            if (($_SESSION['wrongPassword']) == 1) {
              echo "<h5 class='text-center'> Wrong Password </h5>";
            }
          }
          ?>
         
          <div style="margin-left:90px;">
             <img src="login.png"  width="200px">
          </div>
          <div class="form-group my-1">

            <input type="text" class="form-control" name="userName" placeholder="User Name" required />
          </div>
          <div class="form-group my-1">
           
            <input name="password" type="password" class="form-control" placeholder="Password" required />
          </div>


          
<!-- 
          <div class="row text-center my-3">
            <div>
              <label  style="width: fit-content;" for="user">User</label>
              <input  style="width: fit-content;" type="radio" id="user" name="typeOfUser" value="user" required />

              <label style="width: fit-content;" for="photographer">Photographer</label>
              <input style="width: fit-content;" type="radio" id="photographer" name="typeOfUser" value="photographer" required />
              

              <label style="width: fit-content;" for="admin">Admin</label>

              <input style="width: fit-content;" type="radio" id="admin" name="typeOfUser" value="admin" required />

            </div>

          </div> -->
          <div class="container">
            <div class="row">
              <button type="submit" class="col-7 offset-3 btn btn-outline-dark">
                Login
              </button>
              </a>
            </div>
            <div class="d-flex justify-content-between mt-3">
              <a class="btn btn-outline-primary" href="./registerUser.php"> Register User </a>
              <a class="btn btn-outline-primary" href="./registerPoster.php"> Register Photographer </a>

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
      
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
          
</body>

</html>