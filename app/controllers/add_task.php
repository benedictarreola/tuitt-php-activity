<?php

	require_once("connection.php");

	$text = $_POST["text"];

	$newTask = mysqli_query($conn, "INSERT INTO tasks (name, done) VALUES ('$text', 0)");

	mysqli_close($conn);

?>