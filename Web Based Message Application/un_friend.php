<?php
	session_start();
	$connection_status = mysqli_connect("localhost" , "root" , "" , "proj");
		
		$usrName = $_SESSION['username'];
		$id = $_GET['id'];

		$sql = "SELECT * FROM register WHERE id = '$id'";
		$result = mysqli_query($connection_status,$sql);
		$row = mysqli_fetch_assoc($result);

		$usrN = $row['Username'];

		$date = date("D/M/d/Y h:m:s");
		

		if(isset($id))
		{
		
			$sql1 = "UPDATE friend SET send_status=0, recieve_status = 0,  created_date = '$date' WHERE (user_name='$usrName' AND friend_name='$usrN') OR (user_name='$usrN' AND friend_name='$usrName')" ; 
	
			mysqli_query($connection_status,$sql1);

			header("Location: view_friends.php");
		}

		?>