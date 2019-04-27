<?php
	session_start();
	$connection_status = mysqli_connect("localhost" , "root" , "" , "proj");
	if(isset($_POST['submit'])){

		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		$vpassword = $_POST["vpassword"];
		$dob = $_POST["dob"];
		$address1 = $_POST["st_add1"];
		$address2 = $_POST["st_add2"];
		$city = $_POST["city"];
		$state = $_POST["province"];
		$zip = $_POST["pzcode"];
		$country = $_POST["country"];
	
		/*$sql = "INSERT INTO register ('Fname', 'Lname', 'Username', 'Password', 'V_Password', 'DOB', 'Address1', 'Address2', 'City', 'State', 'Zip_Code', 'Country') VALUES ($fname , $lname , $username , $password , $vpassword , $dob , $address1 , $address2 , $city , $state , $zip , $country)";
		 $sql = "INSERT INTO register ". "(Fname,Lname, Username, Password,V_Password) ". "VALUES('$emp_name','$emp_address',$emp_salary, NOW())";
*/

		 $sql = "INSERT INTO register (Fname, Lname, Username, Password, V_Password, DOB, Address1, Address2, City, State, Zip_Code, Country) 
		 			  VALUES ('$fname','$lname','$username','$password' , '$vpassword' , '$dob' , '$address1' ,'$address2','$city' , '$state' ,$zip , '$country')";
		// $sql = "INSERT INTO MyGuests (firstname, lastname, email)
		// 		VALUES ('John', 'Doe', 'john@example.com')";

        if($password == $vpassword)
        {
			$status = mysqli_query($connection_status , $sql);
		
			if($status) // This function will tell that row is afftected if any row in the database has been affected by your any query . . . Update , Insert , Delete whatever
			{
				echo "Successfully Registered!";
			}
			else
			{
				echo "Failed!";
			}
			}
		else
		{
			echo "Password does not verify!" ;
		}
	}

	?>
	
<html>
	<head>
		<title> -- Friends Diary Registeration --</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
				<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>

	</head>
	
	<!-- 12 columns included in 1 row -->
	<body>
	
	<div class="container-fluid">
			
		<div class="row">
			<div class="col-sm-1"></div>
			
			<div class="col-sm-10">
				<h1> Friends Diary...</h1> <br>
			</div>
			
		</div>
		
		
		<form action="Project.php" method="post">
			<div class="row">
				<div class="col-sm-1"></div>
				
				<label class="col-sm-1 control-label">First Name*:</label>
				
					<div class="col-sm-3">
						<input class="form-control"  type="text" name="fname" > 
					</div>
			</div>	

		<br>
		
			<div class="row">
				<div class="col-sm-1"></div>
				
				<label class="col-sm-1 control-label">Last Name*:</label>
				
					<div class="col-sm-3">
						<input class="form-control"  type="text" name="lname" > 
					</div>
			</div>	

		<br>
			
			<div class="row">
				<div class="col-sm-1"></div>
				
				<label class="col-sm-1 control-label">Username*:</label>
				
					<div class="col-sm-3">
						<input class="form-control"  type="text" name="username" > 
					</div>
			</div>	
			
		<br>
		
			<div class="row">
				<div class="col-sm-1"></div>
				
				<label class="col-sm-1 control-label">Password*:</label>
				
					<div class="col-sm-3">
						<input class="form-control"  type="password" name="password"> 
					</div>
			</div>

		<br>

			<div class="row">
				<div class="col-sm-1"></div>
				
				<label class="col-sm-1 control-label">Verify Password*:</label>
				
					<div class="col-sm-3">
						<input class="form-control"  type="password" name="vpassword" > 
					</div>
			</div>	

		<br>

			<div class="row">
				<div class="col-sm-1"></div>
				
				<label class="col-sm-1 control-label">Date of Birth:</label>
				
					<div class="col-sm-3">
						<input class="form-control"  type="date" name="dob" > 
					</div>				

			</div>

		<br>		

			<div class="row">
				<div class="col-sm-1"></div>
				
				<label class="col-sm-1 control-label">Address</label>
				
					<div class="col-sm-8">
						<input class="form-control"  type="text" placeholder="Street Address" name="st_add1" > <br>
						<input class="form-control"  type="text" placeholder="Street Address 2" name="st_add2" >
					</div>
			</div>
			 
		<br>
		
			<div class="row">
				<div class="col-sm-2"></div>
				
					<div class="col-sm-4">
						<input class="form-control"  type="text" placeholder="City" name="city" >
					</div>
				
					<div class="col-sm-4">
						<input class="form-control"  type="text" placeholder="State/Province" name="province" >
					</div>
				</div>
				
		<br>
	  
			<div class="row">
				<div class="col-sm-2 "></div>
				
					<div class="col-sm-4">
						<input class="form-control"  type="text" placeholder="Postal/Zip Code" name="pzcode" >
					</div>
					
					<div class="col-sm-4">
						<input class="form-control"  type="text" placeholder="Enter Country" name="country" >
					</div>
			</div>

		<br>
		
			<div class="row">
				<div class="col-sm-2 "></div>
				
					<div class="col-sm-5">
						<input class="btn btn-default btn-lg" type="submit" value="Create Account" name="submit"/>
					</div>
			</div>	
		</form>
	</div>
	

	

</body>

<?php?>
</html>



