<?php
	session_start();
	$connection_status = mysqli_connect("localhost" , "root" , "" , "proj");
		
		$usrName = $_SESSION['username']; // Current
		$id = $_GET['id']; // Target

		$sql = "SELECT * FROM register WHERE id = '$id'";
		$result = mysqli_query($connection_status,$sql);
		$row = mysqli_fetch_assoc($result);

		$usrN = $row['Username'];

		$date = date("D/M/d/Y h:m:s");
		

		if(isset($id))
		{
		
			$sql1 = "UPDATE friend SET recieve_status = 1, created_date = '$date' WHERE (user_name='$usrName' AND friend_name='$usrN') OR (user_name='$usrN' AND friend_name='$usrName')" ; 
	
			mysqli_query($connection_status,$sql1);

			header("Location: friend_request.php");
		}

		?>