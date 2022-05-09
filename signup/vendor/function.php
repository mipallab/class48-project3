<?php
	
	require_once('config.php');

	

	function email_exists() {
		global $base_connect;
		global $email;

		$query = mysqli_query($base_connect,"SELECT * FROM users WHERE email = '$email'");

		if (mysqli_num_rows($query) == 1) {
			return true;
		}

	}


?>