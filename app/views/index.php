<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE-Edge">

	<title>To Do List</title>

	<!-- Bootstrap -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

</head>
<body>
	
	<div class="row no-gutters">
		<div class="col-lg-8 offset-lg-2 p-3">
			
			<h1 class="text-center my-3">To-Do List</h1>

			<!-- START add task -->
			<form class="form row no-gutters mb-5" method="POST">
				<div class="form-group m-0 col-9">
					<input id="textNewTask" type="text" name="textNewTask" class="form-control h-100 rounded-0" placeholder="Type your new task here...">
				</div>
				<div class="col-3">
					<button id="submitNewTask" type="submit" name="submitNewTask" class="btn btn-primary btn-block rounded-0">Add Task</button>
				</div>
			</form>
			<!-- FINISH add task -->

			<div id="taskGroup">

				<?php

					require_once("../controllers/connection.php");

					$my_query = "SELECT * FROM tasks ORDER BY id DESC";
					$my_sql_query = mysqli_query($conn, $my_query);

					while($row = mysqli_fetch_assoc($my_sql_query)) {
						echo
						'<div class="row no-gutters my-2" data-id="'. $row["id"] .'">
							<div class="m-0 col-8">
								<input id="taskName" type="text" name="taskName" class="form-control h-100 rounded-0" value="'.$row["name"].'">
							</div>
							<div class="col-2">
								<button type="submit" name="updateTask" class="updateTask btn btn-success btn-block rounded-0">Update Task</button>
							</div>
							<div class="col-2">
								<button type="submit" name="deleteTask" class="deleteTask btn btn-danger btn-block rounded-0">Delete Task</button>
							</div>
						</div>';
					} 

					mysqli_close($conn);

				?>

				<!-- end of sample task -->
			</div>

		</div>
	</div>

	<!-- External JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

	<script>

		$("#submitNewTask").click( function() {
			var textNewTask = $("#textNewTask").val();

			$.ajax({
				method: "POST",
				url: "../controllers/add_task.php",
				data: {
					text: textNewTask
				},
				success: function(){
					location.reload(1);
				}
			}).done( function(){
				console.log("added " + textNewTask);
			});

		});

		$(".updateTask").click( function(){
			var taskId = $(this).parent().parent().attr("data-id");
			var newTaskName = $(this).parent().parent().children("div").children("input").val();
			console.log("clicked");

			$.ajax({
				method: "POST",
				url: "../controllers/update_task.php",
				data: {
					num: taskId,
					text: newTaskName
				},
				success: function(){
					location.reload(1);
				}
			}).done(function(){
				alert("updated");
				console.log("updated");
			});

		});

		$(".deleteTask").click(function(){
			var taskId = $(this).parent().parent().attr("data-id");

			$.ajax({
				method: "POST",
				url: "../controllers/remove_task.php",
				data: {
					num: taskId
				},
				success: function(){
					location.reload(1);
				}
			}).done(function(){
				console.log("deleted");
			});

		});

	</script>

</body>
</html>