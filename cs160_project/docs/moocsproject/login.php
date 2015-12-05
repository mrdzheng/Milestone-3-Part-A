<?php
	session_start();
	
	if (isset($_SESSION["loggedin"])) {
		$loggedin = $_SESSION["loggedin"];
		
		if ($loggedin) {
			$_SESSION["loggedin"] = false;
			unset($_SESSION['username']);
		}
	}
	
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="This is the login page for Project SAND">
    <meta name="author" content="Alvin Ko">
    <link rel="icon" href="../../favicon.ico">

    <title>Home</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

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
            //echo "Access Granted.";
			//ob_start();
			//$host  = $_SERVER['HTTP_HOST'];
			//$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			//$extra = 'account_info.php';
			
			//header("Location: ./account_info.php");
			$_SESSION["username"] = $_POST["username"];
			$_SESSION["loggedin"] = true;
			
			//header("Location: http://$host$uri/$extra");
			echo "<script>window.location = './account_info.php';</script>";
			//exit();
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
          <a class="navbar-brand" href="index.php">Project SAND</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="courses.php">Courses</a></li>
            <li class="active"><a href="login.php">Login</a></li>
            <li><a href="signup.php">Sign Up</a></li>
			
			<li>
				<form name="form1" method="post" action="course_search.php">
					<input name="search" type="text" size="40" maxlength="50"/>
					<input type="submit" name="Submit" value="Search"/>
				</form>
			</li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="container">
      <div class="jumbotron">
        <div class= "trans">
        <h1>Welcome to</h1>
        <p>Project SAND</p>
        <p><a class="btn btn-primary btn-lg" href="about.php" role="button">Learn more &raquo;</a></p>
      </div>
      </div>
    </div>

    <!--TO REPLACE-->
    <div class="container">
    <hr class="featurette-divider">
      <!-- Example row of columns -->
        <div class="row col-md-6" style="background-color:white">
          <img src = "image/logo1.png" alt = "logo">
        </div>

        <div class="row col-md-6" style="background-color:white">
          <h2>Existing User Login</h2>
            <form role="form" action = "" name = "login" id = "login" class = "login" method = "POST">
              <input type="hidden" name="test" value="login">
              
              <!--Set Username-->
              <div class="form-group">            
                <label for="username">Username</label>
                <input type="text" class="form-control" name = "username" id="username" placeholder="Enter Username" value= "">
              </div>

              <!--Set Password-->
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name = "password" id="password" placeholder="Enter Password" value= "">
              </div>

              <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
      </div>


    
    <div class="container">
      <hr class="featurette-divider">
    <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2015 Project SAND &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
    </div>

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