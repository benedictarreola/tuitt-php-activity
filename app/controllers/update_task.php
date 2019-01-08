<?php

	require_once("connection.php");

	$text = $_POST["text"];
	$num = $_POST["num"];

	$sql = "UPDATE tasks SET name='$text' WHERE id=$num";
	$query = mysqli_query($conn, $sql);

	if(!$query) {
		echo "error <br>" . mysqli_error($conn);
	}

	mysqli_close($conn);

?>