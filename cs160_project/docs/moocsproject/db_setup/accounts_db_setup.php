<?php
	// CONNECTING TO THE DATABASE
	//$mysqli_connect=mysqli_connect("localhost", "SERVER_USER","SERVER_PW","test");
	$mysqli_connect=mysqli_connect("localhost", "root","","moocs160");
	
	// CHECK DATABASE CONNECTIONS
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	// CREATE TABLE
	$sql="CREATE TABLE accounts (Name VARCHAR(255), Username VARCHAR(255), Password VARCHAR(255), Email VARCHAR(255), Type VARCHAR(255))";
	
	// INSERT INTO TABLE
	if (mysqli_query($mysqli_connect,$sql)) {
		echo "Table accounts created successfully";	
		
		$query = "INSERT INTO accounts (Name, Username, Password, Email, Type) ";
		$query .= " VALUES ('Alvin Ko', 'ako', 'ako', 'ako@sample.com', 'admin')";
		mysqli_query($mysqli_connect, $query);

		$query = "INSERT INTO accounts (Name, Username, Password, Email, Type) ";
		$query .= " VALUES ('Dave Zheng', 'dzheng', 'dzheng', 'dzheng@sample.com', 'admin')";
		mysqli_query($mysqli_connect, $query);

		$query = "INSERT INTO accounts (Name, Username, Password, Email, Type) ";
		$query .= " VALUES ('Steve Lee', 'slee', 'slee','slee@sample.com', 'admin')";
		mysqli_query($mysqli_connect, $query);

		$query = "INSERT INTO accounts (Name, Username, Password, Email, Type) ";
		$query .= " VALUES ('Nick Saric', 'nsaric', 'nsaric', 'nsaric@sample.com', 'admin')";
		mysqli_query($mysqli_connect, $query);
		
		$query = "INSERT INTO accounts (Name, Username, Password, Email, Type) ";
		$query .= " VALUES ('Chris Tseng', 'ctseng', 'ctseng', ctseng@sample.com', 'student')";
		mysqli_query($mysqli_connect, $query);
		
	} else { 
		echo "Error creating table: " . mysqli_error($mysqli_connect);
	}
	
	mysqli_close($mysqli_connect);
?>