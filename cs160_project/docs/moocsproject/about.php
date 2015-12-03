<?php
	session_start();
	$user = $_SESSION["username"];
?>

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

    <title>About</title>

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
            <li><a href="index.php">Home</a></li>
            <li class ="active"><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="courses.php">Courses</a></li>
			<li><a href="login.php">Login</a></li>
            <li><a href="signup.php">Sign Up</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="container">
      <div class="jumbotron">
        <div class= "trans">
        <h1>About Us</h1>
        <p>Group 1 MOOCS Project</p>
        <p><a class="btn btn-primary btn-lg" href="index.php" role="button">Home &raquo;</a></p>
      </div>
      </div>
    </div>

    <!-- START THE FEATURETTES -->

    <div class="container marketing">
      <hr class="featurette-divider">

      <div class="row featurette" style="background-color:white">
        <div class="col-md-7">
          <h2 class="featurette-heading">Project SAND <span class="text-muted"></span></h2>
          <p class="lead">Online courses are becoming a popular way to pursue higher-level education. Students no longer have to sit in a classroom and listen to a lecturer for an hour. Online ourses provide a way of engaging students that could not be done in a traditional classroom setting. Here at Project SANDS, we believe the future of education starts here.</p>
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Dave Zheng <span class="text-muted">Chief Executive Officer</span></h2>
          <p class="lead">Dave is a senior studying Electrical Engineering and Computer Science (EECS) at SJSU. In his spare time he likes to complain about his senior project and CS153 project. He is the founder of Spartan Dragon Boat.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="image/dave_profile.png" alt="Dave Zheng" >
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Alvin Ko <span class="text-muted">Chief Security Officer</span></h2>
          <p class="lead">Alvin Ko is a graduating senior studying Computer Science at SJSU. When he's not at work or at school, you can find him paddling on an outrigger canoe or dragon boat!</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="image/alvin_profile.png" alt="Alvin Ko">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Nick Saric <span class="text-muted">Chief Technology Officer</span></h2>
          <p class="lead">Nick Saric is a senior studying Computer Science at SJSU. He enjoys spending time in the CS room, gamining, and hanging out with friends when he is not hard at work programming</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="image/nick_profile.png" alt="Nick Saric">
        </div>
      </div>

      <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Steve Lee <span class="text-muted">Head of Engineering</span></h2>
          <p class="lead">Steve Lee is a senior studying Computer Science at SJSU. He is the "keep calm and code on" kind of guy on the team. Got a problem? Don't worry. He's got your back. Cool like an ice cube. Whoosh!</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="image/steve_profile.png" alt="Steve Lee">
        </div>
      </div>

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
