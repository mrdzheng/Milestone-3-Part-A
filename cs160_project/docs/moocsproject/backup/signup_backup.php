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

      <title>Sign Up</title>

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
        header('Location: index.html');
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
            <a class="navbar-brand" href="index.html">Project SAND</a>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li ><a href="index.html">Home</a></li>
              <li><a href="about.html">About</a></li>
              <li><a href="contact.html">Contact</a></li>
              <li><a href="course.php">Courses</a></li>
              <li><a href="login.php">Login</a></li>
              <li class="active"><a href="#">Sign Up</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>

      <div class="container">

        <div class="starter-template">
          <img src="image/cutecat.png" alt="CAT" height ="617" width ="832">
          <h1>Sign up now for an account! </h1>
  <p>Already have an account?</p>
  <button type = "button"><a href = "login.php">Click Here!</a></button>
  <form action = "<?php $PHP_SELF ?>" name = "validator" id = "validator" class = "validator" method = "POST">
    <input type="hidden" name="test" value="login">

    <!--SET FIRST NAME-->
    <label for = "name">Enter in a name:</label>
      <input type = "text" name = "name" id = "name" value= "<?php if(isset($_POST["name"])) echo $_POST["name"]; ?>">
      <br />
      
      <!--SET USERNAME-->
    <label for = "username">Enter in username:</label>
      <input type = "text" name = "username" id= "username" value="<?php if(isset($_POST["username"]))echo $_POST["username"]; ?>">
      <br />
      
      <!--SET PASSWORD-->
    <label for = "password">Enter in password:</label>
      <input type = "password" name = "password" id= "password" value="<?php if(isset($_POST["password"]))echo $_POST["password"]; ?>">
      <br />
      
      <!--SET EMAIL-->
    <label for = "email">Enter in email:</label>
      <input type = "email" name = "email" id= "email" value="<?php if(isset($_POST["email"]))echo $_POST["email"]; ?>">
      <br />
      
      <!--SET TYPE-->
    <label for = "lname">Select a type:</label>
    <input list = "type" name = "type">
    <datalist id = "type">
      <option value = "admin">
      <option value = "student">
    </datalist>
      <br />
      
       <?php
            require_once('recaptchalib.php');
            $publickey = "6LeERusSAAAAACchYVbriuqeFhcRGWkcT_LI9alg"; // you got this from the signup page
            echo recaptcha_get_html($publickey);
          ?>
     
    <input type = "submit" value = "SUBMIT HERE!" /> <!--SUBMIT BUTTON-->
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
