<?php 
	$use = $_POST['username'];
	$pass = $_POST['password'];
	//database connection here ...

	$con  = new mysqli("localhost","root","","test");
	if ($con->connect_error) {
		die("Failed to connect : ".$con->connect_error);
	}else{
		$stmt = $con->prepare("select * registration where username = ?" );
		$stmt->bind_param("s", $use);
		$stmt->execute();
		$stmt_result = $stmt->get_result();
		if ($stmt_result->num_rows > 0) {
			$data = $stmt_result->fetch_assoc();
			if ($data['password'] === $pass) {
				echo "<h2>Login successfully</h2>";
				// code...
			}else{
				echo "<h2>Login failed</h2>";
			}
			// code...
		}else {
			echo "<h2> invalid pass or username </h2>";
		}
	}





?>