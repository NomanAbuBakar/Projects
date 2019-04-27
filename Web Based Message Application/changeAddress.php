<?php
	session_start();
	$connection_status = mysqli_connect("localhost" , "root" , "" , "proj");
			
			$usr=$_SESSION['username']; // Mojooda Username
			$pass=$_SESSION['password']; // Mojooda Password

			$sql = "SELECT * FROM register WHERE Username = '$usr' AND Password = '$pass'";
			$result = mysqli_query($connection_status,$sql);
			$row = mysqli_fetch_assoc($result);  // I've Locked the tageted record . . . 

			$id = $row['id'];				// Preserved Name and Id as they are playing the primary key role in our database . . . 
			
?>
<!DOCTYPE html>
<html>
			<link rel="stylesheet" href="css/bootstrap.min.css">
			<script src="js/jquery.js"></script>
			<script src="js/bootstrap.min.js"></script>
<head>
	<title></title>
</head>
<body style="background-color:#DFE2DB;">

 <div class= 'container-fluid'>
		    <form class = "form-inline" action='changeAddress.php' method='POST' align='center' style='border:solid;margin-top:100px; padding:70px;'> 
		   
		    
				<div class="row">
					<div class="col col-sm-4"></div>
					
						<label  class="col-sm-1 control-label">Enter New Address</label>
						<div class="col-sm-3">
						<input class="form-control" type="text" name="addrs"><br>
						</div>

				</div>		

				<br>

				<div class="row">
					<div class="col col-sm-4"></div>
					
						<label  class="col-sm-1 control-label">Enter Password</label>
						<div class="col-sm-3">
						<input class="form-control" type="password" name="password"><br>
						</div>

				</div>	
		  	    <br><br>

		  	    <div class="row">
					<div class="col col-md-5" ></div>
					
					<div class="col-md-1">
					<input class="btn btn-primary btn-lg" type="submit" name="submit" value="Change Address"/><br><br>
					<input class="btn btn-primary btn-lg" type="submit" name="submit1" value="Back"/>

					
					</div>
					</div>
					</div>


		 
</html>
		 	 
<?php
		 if(isset($_POST['submit1']))
		 {
		 	header("Location: Setting.php");
		 }	

		 if(isset($_POST['submit']))	
		 {
		 	$newAdd = $_POST['addrs'];
		 	$newpass = $_POST['password'];


		 		if($newpass == $pass)
		 		{
		 			$sql = "UPDATE register SET Address1 = '$newAdd' WHERE Username = '$usr' AND id = '$id'" ;
		 			mysqli_query($connection_status,$sql);
		 			header("Location: Project0.php");
		 			
		 		}
		 		else
		 		{
		 			echo "<h3 align='center'>Password is Wrong!</h3>";
		 		}
		 }
	
		 
?>
?>
		 
		 
		 	