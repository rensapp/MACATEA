<?php
	$conn = mysqli_connect("localhost", "root", "", "mactea");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>