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
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="container">
      <div class="jumbotron">
        <div class= "trans">
        <h1>Welcome to</h1>
        <p>Group 1 MOOCS Project</p>
        <p><a class="btn btn-primary btn-lg" href="about.php" role="button">Learn more &raquo;</a></p>
      </div>
      </div>
    </div>

    <div class="container">
      <?php 
       error_reporting(E_ALL ^ E_DEPRECATED);
       //SET VARIABLES TO USE
       $categories = "";
       $val = "";
       $table = "";

        $mysqli = mysql_connect("localhost", "root", "", "moocs160"); /*Allows access to localhost phpMyAdmin*/
        //$mysqli = mysql_connect("localhost", "cs174_39", "yQ0UH0Mn", "cs174_39"); 
        /*Allows access to CS174 webspace phpMyAdmin*/
        
        if($_SERVER["REQUEST_METHOD"] == "POST") 
        {
          if(isset($_POST["val"])) 
          {
            //SET VALUES
             $categories = $_POST["categories"];
             //$search
             $search = $_POST["val"];
             
             mysql_select_db("moocs160"); //SELECT DATABASE
                    
             $data = mysql_query("SELECT * FROM course_data WHERE $categories = '$search'"); 
              
            //PRINTS OUT DATA IN THE PRODUCTS TABLE OF THE TEST DATABASE
             while($info = mysql_fetch_array($data)) 
             { 

                $table .= "<div class=\"col-xs-6 col-lg-4\">";
                $table .= "<h2>" . $info['title'] . "</h2>";
                $table .= "<p>id: " . $info['id'] . "</p>";
                $table .= "<p>start date: " . $info['start_date'] . "</p>";
                $table .= "<p>course length: " . $info['course_length'] . "</p>";
                $table .= "<p>category: " . $info['category'] . "</p>";
                $table .= "<p>site: " . $info['site'] . "</p>";
                $table .= "<p>course fee: " . $info['course_fee'] . "</p>";
                $table .= "<p>university: " . $info['university'] . "</p>";
                $table .= "</div>";

                /*
                <div class="col-xs-6 col-lg-4">
              <h2>Heading</h2>
              <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
              <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
            </div><!--/.col-xs-6.col-lg-4

               $table .= "<tr>"; //CREATE NEW ROW
               $table .= "<td>". $info['id'] . "</td> "; 
               $table .= "<td>". $info['title'] . " </td>";
               $table .= "<td>". $info['start_date'] . " </td>";
               $table .= "<td>". $info['course_length'] . " </td>";
               $table .= "<td>". $info['category'] . " </td>";
               $table .= "<td>". $info['site'] . " </td>";
               $table .= "<td>". $info['course_fee'] . " </td>";
               $table .= "<td>". $info['university'] . "</td>"; 
               $table .= "</tr>"; //END ROW*/
             } //END OF WHILE LOOP
              //$table.= "</tbody></table>"; //END OF TABLE
              
          }//END OF IF STATEMENT (NESTED)
        }//END OF IF STATEMENT
       ?>  

       <h1>Search Form</h1>
       <form role="form" action = "<?php $PHP_SELF ?>" name = "login" id = "login" class = "login" method = "POST">
        <input type="hidden" name="test" value="login">
        
        <!--Set Type-->
        <div class="form-group">
          <label for = "categories">Category</label>
          <select id = "type"  name = "categories" id = "categories" class="form-control" placeholder = "Choose Type">
            <option value = "id">id</option>
            <option value = "title">title</option>
            <option value = "start_date">start date</option>
            <option value = "course_length">course length</option>
            <option value = "category">category</option>
            <option value = "site">site</option>
            <option value = "course_fee">course fee </option>
            <option value = "university"> university</option>
          </select>
        </div>

        <div class="form-group">
          <label for = "operator">Operator</label>
          <select id = "type"  name = "operator" id = "operator" class="form-control" placeholder = "Choose Operator">
            <option value = "greater-than">Greater than</option>
            <option value = "less-than">less than</option>
            <option value = "equal">=</option>
          </select>
        </div>

        <!--Set Value-->
        <div class="form-group">
          <label for="val">Value</label>
          <input type="text" class="form-control" name = "val" id="val" placeholder="Enter Value" value= "">
        </div>

        
          <button type="submit" class="btn btn-default">Submit</button>
          
        </form>

        <hr class="featurette-divider">
      </div>

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>

          <div class="row">
            <?php echo($table) ?>
          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" style="margin-top:1%"><!--NOTE: might not need margin-top-->
          <div class="list-group">
            <a href="#" class="list-group-item active">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
          </div>
        </div><!--/.sidebar-offcanvas-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; 2015 Company, Inc.</p>
      </footer>

    </div><!--/.container-->


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
