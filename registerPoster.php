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
      <img src="mainpic.png"/>
  
    </div>
  </div>

  <div class="main">
    <div class="col-md-10 col-sm-12">
      <div class="" style="margin-left:150px; margin-top:190px;">
    <!-- <div class="container my-5"> -->
    <form action="EnterData.php" method="POST" enctype="multipart/form-data">

            <div class="">
                <h1 class="text-center">
                    Register Photographer
                </h1>

                <input style="display: none;" type="text" value="registerPoster" name="formType" required> 
                <input class="form-control my-1" type="text" placeholder="User Name" name="userName" id="userName" required>
                <input class="form-control my-1" type="text" name="email" id="email" placeholder="Email" required>
                <input class="form-control my-1" type="number" placeholder="Amount" name="amount" id="amount" min="10" max="1000" required>
                <input class="form-control my-1" type="password" name="password" id="password" placeholder="Password" onchange="checkPassword()" required >
                <input class="form-control my-1" type="password" name="Re-password" id="Re-password" placeholder="Re-Enter Password" onchange="checkPassword()" required>
                
                <input class="form-control" required type="file" name="fileToUpload" accept="image/*" required>

                <div class="row">

                    <a  href="./login.php"  class="my-3 offset-1 col-4  btn btn-outline-primary" >Login</a>
                    <input type="submit" id="submit" class="my-3 offset-2 col-4  btn btn-outline-primary" value="Register"></input>
                
                </div>
                    
            </form>


    </div>

    </div>

    </div>


    </div>
    <script>
      const checkPassword = ()=>
      {
      
      const password =  document.getElementById('password').value;
      const RePassword =  document.getElementById('Re-password').value;
      const submit =  document.getElementById('submit');
      console.log(password + " "+ RePassword);
      if(password != RePassword)
      {
        console.log(submit);
        submit.disabled = true;
      }
      else
      {
        submit.disabled = false;

      }
      }

    </script>
</body>
</html>