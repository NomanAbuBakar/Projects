<?php
	session_start();
	$connection_status = mysqli_connect("localhost" , "root" , "" , "proj");
			
		$usr=$_SESSION['username']; // Mojooda Username
		$pass=$_SESSION['password']; // Mojooda Password

		$sql = "SELECT * FROM register WHERE Username = '$usr' AND Password = '$pass'";
		$result = mysqli_query($connection_status,$sql);
		$row = mysqli_fetch_assoc($result);  // I've Locked the tageted record . . . 

		$id = $row['id'];				// Preserved Name and Id as they are playing the primary key role in our database . . . 
		$usname = $row['Username'];
?>

<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="css/bootstrap.min.css">

<head>
	<title></title>
</head>
	<body  style="background-color:#DFE2DB;">
	    <form class = "form-inline" action='username.php' method='POST' align='center' style='border:solid;margin-top:140px; padding:70px;'> 
		    <div class= 'container-fluid'>
				<div class="row">
					<div class="col col-sm-4"></div>
					
						<label  class="col-sm-1 control-label">Enter New User Name</label>
						<div class="col-sm-3">
						<input class="form-control" type="text" name="username1"><br>
						</div>
				</div>	

				<br>

				<div class="row">
					<div class="col col-sm-4"></div>
						<label  class="col-sm-1 control-label">Enter Password</label>
						<div class="col-sm-3">
							<input class="form-control" type="password" name="password1"><br>
						</div>

				</div>	

				<br><br>

			 	 <div class="row">
					<div class="col col-md-5" ></div>
						<div class="col-md-1">
							<input class="btn btn-primary btn-lg" type="submit" name="submit1" value="Change Username"/><br><br>
						<input class="btn btn-primary btn-lg" type="submit" name="submit1" value="Back"/>
					</div>
				</div>
		    </div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
</html>


 <?php	 
	$sql2 = "SELECT * FROM register";
	$result2 = mysqli_query($connection_status,$sql2);
		 	
	if(isset($_POST['submit1']))
	{
		header("Location: Setting.php");
	}	

	if(isset($_POST['submit1']))
	{
		$newName = $_POST['username1']; // New Name
		 	if ($_POST['password1'] == $pass) 
		 	{
		 		$sql1 = "SELECT Username FROM register WHERE Username='$newName'";
		 		$result1 = mysqli_query($connection_status,$sql1);
				$row1 = mysqli_fetch_assoc($result1);
		 		
		 		if ($row1['Username']) 
		 		{
		 			echo "<h3 align='center'>Name has benn already benn assigned!</h3>";
				}
		 		else
		 		{
		 			$sql = "UPDATE register SET Username = '$newName' WHERE Username = '$usr' AND id = '$id'" ;
		 			mysqli_query($connection_status,$sql);
		 			header("Location: Project0.php");
		 		}
		 	}
		 	else
		 	{
		 		echo "<h3 align='center'>Incorrect Password!</h3>";
		 	}
	}
?>
		 
		 
		 	