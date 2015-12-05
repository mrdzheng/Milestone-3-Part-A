


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="This is the home page for the CS160 Group 1 MOOCS Project">
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
      //CONNECTING TO THE DATABASE
      $mysqli = mysqli_connect("localhost", "root", "", "moocs160");  /*Allows access to localhost phpMyAdmin*/
      //$mysqli = mysqli_connect("localhost", "cs174_39", "yQ0UH0Mn", "cs174_39"); 
      
      $errorMessage = ""; //return errorMessage if found error

      //user inputed values
      $name = "";
      $username = "";
      $password = "";
        $email = "";
      $type = ""; 
            
      //REGULAR EXPRESSION (REGEX)
      //CHECK only: username, password, email
      $check_username = "/[A-Za-z0-9]+/";
      $check_password = "/[A-Za-z0-9]+/";
        $check_email = "/[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/";
      
      if($_SERVER["REQUEST_METHOD"] == "POST") 
      {
        
        require_once('recaptchalib.php');
        $privatekey = "6LeERusSAAAAACamygdHyZopANA3ZGt6IFj-Wfvl"; //PRIVATE KEY
        $resp = recaptcha_check_answer ($privatekey,
                                    $_SERVER["REMOTE_ADDR"],
                                    $_POST["recaptcha_challenge_field"],
                                    $_POST["recaptcha_response_field"]);

        if (!$resp->is_valid) 
        {
        // What happens when the CAPTCHA was entered incorrectly
        die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
           "(reCAPTCHA said: " . $resp->error . ")");
        } 
        else 
        {
        // Your code here to handle a successful verification
        }
      
        /*
         * PREG_MATCH 
         * RETURNS 1 IF THE PATTERN MATCHES THE GIVEN SUBJECT
         * RETURNS 0 IF THE PATTERN DOESNT MATCH GIVEN SUBJECT
         */
        if(preg_match($check_username, $_POST["username"]) === 0)
        {
          echo "Please enter in a username that only contains numbers and/or letters. ";
        }
        if(preg_match($check_password, $_POST["password"]) === 0)
        {
          echo "Please enter in a password that only contains numbers and/or letters. ";
        }
        if(preg_match($check_email, $_POST["email"]) === 0)
        {
          echo "Please enter in a valid email address. ";
        }
        //END PHP FORM VALIDATION PART OF THIS PHP FILE
        
        //START PREPARED STATEMENT
        //ENTRY INTO ACCOUNTS TABLE IN  DATABASE
        /*PREPARED STATEMENT, STAGE 1: PREPARE*/
        $stmt = $mysqli->prepare ("INSERT INTO accounts(Name, Username, Password, Email, Type) VALUES(?,?,?,?,?)"); 
        /*products is the table being inserted into*/
        
        /*PREPARED STATEMENT, STAGE 2: BIND AND EXECUTE*/
        $stmt->bind_param('sssss', $_POST["name"], $_POST["username"], $_POST["password"], 
                       $_POST["email"], $_POST["type"]);
        $stmt->execute();
        
        //CONFIRM INFORMATION IS ENTERED
        Print "Thank you. The information has been added to the database.";
        
        $stmt->close(); /*EXPLICIT CLOSE */
        //END PREPARED STATEMENT PORTION OF THIS PHP FILE
        
        //GO TO ANOTHER PHP SCRIPT
        header('Location: index.php');
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
            <li><a href="login.php">Login</a></li>
            <li class="active"><a href="signup.php">Sign Up</a></li>
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
        <p>Group 1 MOOCS Project</p>
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
          <h2>Sign Up </h2>
            <form role="form" action = "" name = "login" id = "login" class = "login" method = "POST">
              <input type="hidden" name="test" value="login">
              
              <!--Set Name-->
              <div class="form-group">            
                <label for="name">Name</label>
                <input type="text" class="form-control" name = "name" id="name" placeholder="Enter Name" value= "">
              </div>

              <!--Set Username-->
              <div class="form-group">            
                <label for="username">Username</label>
                <input type="text" class="form-control" name = "username" id="username" placeholder="Enter Username" value= "">
              </div>

              <!--Set Password-->
              <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" name = "password" id="password" placeholder="Enter Password" value= "">
              </div>

              <!--Set Email-->
              <div class="form-group">
                <label for="email">Email</label>
                <input type="password" class="form-control" name = "email" id="email" placeholder="Enter Email" value= "">
              </div>

              <!--Set Type-->
              <div class="form-group">
                <label for = "type">Type</label>
                <input list = "type" name = "type" class="form-control" placeholder = "Choose Type">
                <datalist id = "type">
                  <option value = "admin">
                  <option value = "student">
                </datalist>
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
        <p>&copy; 2015 Project SANDS &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
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
