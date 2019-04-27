<?php
	session_start();
	$connection_status = mysqli_connect("localhost" , "root" , "" , "proj");
		echo "<br><br><br><br>" ;
		$usrName = $_SESSION['username'];
		$id = $_GET['id'];

		$sql = "SELECT * FROM register WHERE id = '$id'";
		$result = mysqli_query($connection_status,$sql);
		$row = mysqli_fetch_assoc($result);

		$usrN = $row['Username'];

		$date = date("D/M/d/Y h:m:s");
	
		$sql2 = "SELECT * FROM friend WHERE (send_status = 0 AND recieve_status = 0) AND ((user_name = '$usrName' AND friend_name = '$usrN') OR (user_name = '$usrN' AND friend_name = '$usrName'))"; 		
		$result2 = mysqli_query($connection_status,$sql2);
		$row2 = mysqli_fetch_assoc($result2);

		if($row2)
		{	$f_id = $row2['id'];
				$sql1 = "UPDATE friend SET send_status = 1 WHERE id = '$f_id'"; 
	
				mysqli_query($connection_status,$sql1);
				header("Location: search.php");
		}
		else
		{ 
			$sql1 = "INSERT INTO friend (user_name, friend_name, send_status, recieve_status, created_date) 
					VALUES ('$usrName', '$usrN',  1, 0, '$date')";
			mysqli_query($connection_status,$sql1);

			header("Location: search.php");
		}
?>