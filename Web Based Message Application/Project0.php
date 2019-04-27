<?php
	session_start();
	$connection_status = mysqli_connect("localhost" , "root" , "" , "proj");
	if(isset($_POST['submit']))
	{	
		$username = $_POST["username"];
		$password = $_POST['password'];
				
		$sql = "SELECT * FROM register WHERE Username = '$username' AND Password = '$password'";	
		$result = mysqli_query($connection_status , $sql);
		$record = mysqli_fetch_array($result);
		
		$_SESSION['username'] = $record['Username'];
		$_SESSION['password'] = $record['Password'];
			
		if ($record['Username'] == $username and $record['Password']==$password) 
		{
			echo "Login SuccessFully and WELCOME . . . ".$_SESSION['username'];
			header("Location: Project1.php");
			}
		else
		{
			echo "Wrong Username or Password!";
		}
	}	
?>

<html>
	<head>
		<link rel="stylesheet" href="css/bootstrap.min.css">
	</head>	
	
	<body>
		<div class="container-fluid">
			<br><br><br><br><br><br><br>	
			<div class="row">
				<div class="col-sm-3"> </div>
				<div class="col-sm-9">
					<h1> Friends Diary...</h1> <br><br>
				</div>	
				<div class="col-xs-2"> </div>
				<div class="col-sm-3">
					<h4  class="text-center">Sign Up! To create a free account!</h4> <br><br>
				</div>
			</div>	
				
			<form class="form" action="Project0.php" method="post">
				<div class="row">
					<div class="col col-sm-2"></div>
					<label  class="col-sm-1 control-label">Username:</label>
					<div class="col-sm-3">
						<input class="form-control" type="text" name="username"><br>
					</div>
				</div>		

				<div class="row">
					<div class="col col-md-2"></div>
					<label class="col-md-1 control-label">Password:</label>
					<div class="col-md-3">
					<input class="form-control" type="password" name="password"/>
					</div>
				</div>				
				
				<br><br><br>
				
				<!--Sign Up Button-->
				<div class="row">
					<div class="col col-md-3"></div>	
					<div class="col-md-1">
					<input class="btn btn-default btn-lg" type="submit" name="submit" value="Log In"/>
					</div>
				
			</form>
					<form action="Project.php" method = "post">
						<input class="btn btn-default btn-lg" type="submit" name="submit1" value="Sign In"/>
					</form>
		</div>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</body>
</html>