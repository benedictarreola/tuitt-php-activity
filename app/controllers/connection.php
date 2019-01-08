<?php

	$host = "db4free.net";
	$username = "benatbenilde";
	$password = "potatotomato";
	$database = "todo_list_tuitt";

	$conn = mysqli_connect($host, $username, $password, $database);

	if(!$conn) {
		echo "Can't connect. Try again later <br>" . mysqli_error($conn);
	}

?>