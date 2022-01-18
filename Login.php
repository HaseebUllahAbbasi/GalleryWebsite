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
  <div class="sidenav">
    <div class="login-main-text">
      <h2>
        Application<br />
        Login Page
      </h2>
      <p>Login or register from here to access.</p>
    </div>
  </div>

  <div class="main">
    <div class="col-md-6 col-sm-12">
      <div class="login-form">
        <form class="container-fluid" action="checkUser.php">
          <div class="form-group my-1">
            <label>User Name</label>
            <input type="text" class="form-control" name="userName" placeholder="User Name" required />
          </div>
          <div class="form-group my-1">
            <label>Password</label>
            <input name="password" type="password" class="form-control" placeholder="Password" required />
          </div>
          <div class="row">
            <label style="width: fit-content;" for="user">User</label>
            <input style="width: fit-content;" type="radio" id="user" name="typeOfUser" value="user" required />

            <label style="width: fit-content;" for="photographer">Photographer</label>
            <input style="width: fit-content;" type="radio" id="photographer" name="typeOfUser" value="photographer" required />

            <label style="width: fit-content;" for="admin">Admin</label>

            <input style="width: fit-content;" type="radio" id="admin" name="typeOfUser" value="admin" required />

          </div>
          <div class="container">
            <div class="row">
              <button type="submit" class="col-4 offset-1 btn btn-black">
                Login
              </button>
              <a class="col-4 offset-2 btn btn-secondary" href="./registerUser.php"> Register </a>
              
              
              </a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>