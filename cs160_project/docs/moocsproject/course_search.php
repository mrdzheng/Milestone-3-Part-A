<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "moocs160";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}
	
	session_start();
	$loggedin = $_SESSION["loggedin"];
	
	if (!isset($_POST['search'])) {
		header("Location: index.php");
	}
	else {
		$search = $_POST['search'];
	}
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

    <title>Courses</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="courses.css" rel="stylesheet">

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
    <nav class="navbar navbar-fixed-top navbar-inverse">
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
            <li class="active"><a href="courses.php">Courses</a></li>
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
			?>
			<li>
				<form name="form1" method="post" action="course_search.php">
					<input name="search" type="text" size="40" maxlength="50"/>
					<input type="submit" name="Submit" value="Search"/>
				</form>
			</li>
			
          </ul>
        </div><!--/.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
	
	<div class="container">
		<div class="row">
			<div class="col-xs-6">
				<h1>Courses</h1>
				<?php
					
					$query = "SELECT course_data.title, course_data.course_image, course_data.course_link 
							FROM course_data, coursedetails WHERE course_data.title LIKE '%$search%' 
							OR course_data.short_desc LIKE '%$search%' OR course_data.category LIKE '%$search%'
							OR course_data.long_desc LIKE '%$search%' OR coursedetails.profname LIKE '%$search%' GROUP BY course_data.id";
					$result = mysqli_query($conn, $query);
					
					if (mysqli_num_rows($result) > 0) {
						
						while ($row = mysqli_fetch_array($result)) {
							$img = $row['course_image'];
							$link = $row['course_link'];
							echo "<p class='lead'>
									<a href='$link'>
									<button type='button' class='btn btn-primary-outline btn-block'>
										" . $row['title'] . 
										"<img class='featurette-image img-responsive center-block' src='$img' style='width:75px;height:75px'>
									</button>
									</a>
									</p>";
						}
					}
					else {
						echo "<p class='lead'>No courses taken</p>";
					}
					
					mysqli_close($conn);
				?>
			</div>
		</div>
	</div>
	
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="offcanvas.js"></script>
  </body>
</html>