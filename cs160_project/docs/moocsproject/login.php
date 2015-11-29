<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <?php
      $username = "";
      $password = "";
      $mysqli = mysqli_connect("localhost", "root", "", "moocs160"); 
  
      if($_SERVER["REQUEST_METHOD"] == "POST")
      {
          $username = $_POST["username"]; //get username
          $password = $_POST["password"]; //get password
          $userMatch = false; //auto set to false to auto access
          $passwordMatch= false; //auto set to false to auto access
          $result = mysqli_query($mysqli, "SELECT * FROM accounts"); //array to check from
          
          //check if username and match
          while($row = mysqli_fetch_array($result)) //checks only ONE tuple at a time
          {
            if($row['Username'] == $username) //if username matches 
            {
              $userMatch = true;
            }
            if($row['Password'] == $password) //if password matches
            {
              $passwordMatch = true;
            }
          }

          if($userMatch && $passwordMatch)
          {
            //do something here
            echo "Access Granted.";
          }
          else
          {
            //echo "Invalid Username or Password. Please try again.";
            if($userMatch == false) //NO MATCH FOR USERNAME
            {
              echo "Invalid Username";
            }
            if($passwordMatch == false) //NO MATCH FOR PASSWORD
            {
              echo "Invalid Password";
            }
          }
      }
    ?>

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Group 1</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#contact">Courses</a></li>
            <li><a href="#contact">Login</a></li>
            <li><a href="#contact">Sign Up</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <div class="starter-template">
        <img src="image/cutecat.png" alt="CAT" height ="617" width ="832">
        <h1>Existing User Login</h1>
        <form action = "<?php $PHP_SELF ?>" name = "login" id = "login" class = "login" method = "POST">
            <input type="hidden" name="test" value="login">

            <!--SET FIRST NAME-->
            <label for = "username">Username: </label>
            <input type = "text" name = "username" id = "username" value= "<?php if(isset($_POST["username"])) echo $_POST["username"]; ?>">
            <br />

            <!--SET PASSWORD-->
            <label for = "password">Password: </label>
            <input type = "password" name = "password" id= "password" value="<?php if(isset($_POST["password"]))echo $_POST["password"]; ?>">
            <br />

            <!--Submit-->
            <input type = "submit" value = "login"/>
        </form>
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
