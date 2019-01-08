<?php

	require_once("connection.php");

	$num = $_POST["num"];

	$newTask = mysqli_query($conn, "DELETE FROM tasks WHERE id='$num'");

	mysqli_close($conn);

?>