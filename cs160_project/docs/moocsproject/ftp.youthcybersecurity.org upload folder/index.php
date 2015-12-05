<?php
	session_start();
	
	if (isset($_SESSION["loggedin"])) {
		$loggedin = $_SESSION["loggedin"];
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="This is the home page for Project SAND">
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
            <li class="active"><a href="#">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="courses.php">Courses</a></li>
            <?php
				if (isset($loggedin)) {
			
					if ($loggedin) {
						echo "<li><a href='account_info.php'>Account</a></li>";
						echo "<li><a href='login.php'>Sign Out</a></li>";
					}
					else {
						echo "<li><a href='login.php'>Login</a></li>";
						echo "<li><a href='signup.php'>Sign Up</a></li>";
					}
				}
				else {
					echo "<li><a href='login.php'>Login</a></li>";
					echo "<li><a href='signup.php'>Sign Up</a></li>";
				}
			?>
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

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>About</h2>
          <p>Project SAND is dedicated to bringing courses online. Project SAND was founded in CS160, the software engineering class at San Jose State University. Project Sand's members are: 
Alvin Ko, Dave Zheng, Steve Lee, Nick Saric. </p>
          <p><a class="btn btn-default" href="about.php" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Courses</h2>
          <p>The website presented by Project SAND cross site scrapes course data and details from Udacity, FutureLearn, Canvas, Iversity, Coursera, Open2study, Edx, and Novo 
Ed. This is achieved using Jsoup and calls to an API.</p>
          <p><a class="btn btn-default" href="courses.php" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Login</h2>
          <p>We at Project SAND hope that you appreciate the dedication we put into this site. We are available for support 24/7 (not really). Login here and begin your journey. The 
future of education starts here. </p>
          <p><a class="btn btn-default" href="login.php" role="button">View details &raquo;</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2015 Project SAND &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
    </div> <!-- /container -->


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
