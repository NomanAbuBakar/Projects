<?php
	session_start();
	$connection_status = mysqli_connect("localhost" , "root" , "" , "proj");

	$usrName = $_SESSION['username'];
	$pass = $_SESSION['password'];
	
	echo "<br><br><br><br>" ; // Leaving Space for "nav-bar"

		?>

<div class="container">
		<div class="row">
			<div class="col col-md-3">
			</div>
	
		</div>	
	</div>
		
		
	<!---->
	<div class="row">
		<div class="col col-md-3 col-md-offset-1" style="padding-bottom:150px; margin-top:20px;">
		
			<ul>
				<li style="padding-top:40px"> <a href="Project1.php">Home</a></li><br>
			
				<li> <a href="friend_request.php">Friends Request</a></li><br>
		
				<li> <a href="view_friends.php">View Friends</a><br></li><br>
			
				<li> <a href="search.php">Search</a></li><br>
			
				<li> <a href="Setting.php">Account Setting</a></li><br>
			
				<li> <a href="logout.php">Log out</a></li>
			</ul>

		</div>		
		<div>

	<?php

	if(isset($_POST['submit']))
	{
		$name = $_POST['search'];
		
		$sql = "SELECT * FROM register WHERE Username = '$name' OR Fname = '$name' OR Lname = '$name'";
		$result = mysqli_query($connection_status,$sql);
		?>

		<div class="container-fluid">
			<h2></h2>	
			<table class="table table-striped" style="width:850px;">
				<thead>
					<tr>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Username</th>
					<th>Action</th>
					</tr>
				</thead>
			<tbody>
	<?php
		
		while($row = mysqli_fetch_assoc($result))
		{
			$frnd_name = $row['Username'];
			
			$sql2 = "SELECT * FROM friend WHERE (user_name = '$usrName' AND friend_name = '$frnd_name') OR (user_name = '$frnd_name' AND friend_name = '$usrName')";
			$result2 = mysqli_query($connection_status , $sql2);
			$row2 = mysqli_fetch_assoc($result2);

			if($row2['send_status'] == 1 AND $row2['recieve_status'] == 1)
			{
		
		?>	
				<tr>
					<td><?= $row['FName']?></td>
					<td><?= $row['Lname']?></td>
					<td><?= $row['Username']?></td>
					<td> <b>Already Friend</b> </td>
				</tr>      
		<?php
			}
			else if($row2['send_status'] == 1 AND $row2['recieve_status'] == 0)
			{
		?>
				<tr>
					<td><?= $row['FName']?></td>
					<td><?= $row['Lname']?></td>
					<td><?= $row['Username']?></td>
					<td> <b>Request Sent</b> </td>
				</tr> 
		<?php
			}
			else 
			{
		?>
				<tr>
					<td><?= $row['FName']?></td>
					<td><?= $row['Lname']?></td>
					<td><?= $row['Username']?></td>
					<td> <a href="send_request.php?id=<?= $row['id']?>&user=<?= $usrName?>">Send Request</a> </td>
				</tr> 
		<?php
			}
		?>
	
	<?php
        }
        ?>

        		     </tbody>
			</table>
		</div>
		<?php
	}
?>

<!DOCTYPE html>
<html>
			<link rel="stylesheet" href="css/bootstrap.min.css">

<head>
	<title></title>
</head>
<body style="background-color:#DFE2DB;">

	<form class = "form-inline" action='search.php' method='POST' align='center' style=';margin-top:100px; padding:50px;'> 			     <div class="navbar navbar-inverse navbar-fixed-top">        <!-- Beautiful Navebar in "inverse" Class and Fixed, which will be not effected by scrolling and it'll be fix at the top . . .-->
			<div class="container-fluid">
			<br>
				<div class="row">
					<div class="navbar-header">
						<ul>
							<li class="nav navbar-nav" >
								<a  href="Project1.php" class="navbar-brand"><b>Friends DIARY. . . &nbsp;&nbsp;&nbsp;&nbsp;</b></a>
								<input class="form-control" type="text" name="search">
							</li>
							</ul>
					</div>

					<div class="col col-md-6 ">
							<ul class="nav navbar-nav">
								<li> 
									<button class="btn btn-default" type="submit" name="submit">SEARCH &nbsp; <span class="glyphicon glyphicon-search"></span></button>
								</li>
							</ul>
					</div>
				</div>
			</div>
		</div>
	</form>
			<script src="js/jquery.js"></script>
			<script src="js/bootstrap.min.js"></script>

</body>
</html>

	