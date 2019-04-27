<?php
	session_start();
	$connection_status = mysqli_connect("localhost" , "root" , "" , "proj");

	$msg_id = $_GET['id'];

	$sql = "DELETE FROM message WHERE message_id = '$msg_id'";
	mysqli_query($connection_status , $sql);
	
	header("Location: Project1.php");
	?>