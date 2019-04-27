<?php
	session_start();
	$connection_status = mysqli_connect("localhost" , "root" , "" , "proj");
	echo "<br><br><br><br>" ;

		?>

<div class="container">
		<div class="row">
			<div class="col col-md-3">
			</div>
	
		</div>	
	</div>
		
		
	<!---->
	<div class="row">
		<div class="col col-md-3 col-md-offset-1" style="padding-bottom:350px; margin-top:20px;">
		
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
	
	$curr_user = $_SESSION['username'];
	$sql = "SELECT * FROM friend WHERE (send_status = 1 AND recieve_status = 0) AND (friend_name = '$curr_user')";
	
	$result = mysqli_query($connection_status , $sql);
	while($row = mysqli_fetch_assoc($result))
	{
		$friend_username = $row['user_name'];
	
	$sql2 = "SELECT * FROM register WHERE Username = '$friend_username'";
	$result2 = mysqli_query($connection_status , $sql2);
 	?>

 

			
		</div>
	<div class="container-fluid">	
			<table class="table table-striped" style="width:850px;">
				<thead>
					<tr>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>UserName</th>
					<th>Action</th>
					</tr>
				</thead>
<?php	
		
	$row2 = mysqli_fetch_assoc($result2);
			 
 ?>
					<tbody>

					<tr>
					<td><?= $row2['FName']?></td>   <!--PHP used HERE -->
					<td><?= $row2['Lname']?></td>
					<td><?= $row2['Username']?></td>
					<td> <a href="accept_request.php?id=<?= $row2['id']?>&user=<?= $usrName?>">Accept Request</a> </td>
					<td> <a href="reject_request.php?id=<?= $row2['id']?>&user=<?= $usrName?>">Reject Request</a> </td>
					<br><br>
					</tr>      
			</tbody>
			</table>
		</div>
	</body>
	<?php
}



?>


<body style="background-color:#DFE2DB;">
 	<link rel="stylesheet" href="css/bootstrap.min.css">
 			<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>


	

<!DOCTYPE html>
<html>
			<link rel="stylesheet" href="css/bootstrap.min.css">

<head>
	<title></title>
</head>
<body style="background-color:#DFE2DB;">

	<form class = "form-inline" action='search.php' method='POST' align='center' style=';margin-top:100px; padding:50px;'> 			<div class="navbar navbar-inverse navbar-fixed-top">        <!-- Beautiful Navebar in "inverse" Class and Fixed, which will be not effected by scrolling and it'll be fix at the top . . .-->
			<div class="container-fluid">
			<br>
				<div class="row">
					<div class="navbar-header">
						<ul>
							<li class="nav navbar-nav ">
								<a href="Project1.php" class="navbar-brand"><span class="glyphicon glyphicon-arrow-left"></span></a>
							</li>
						
							<li class="nav navbar-nav navbar-right text-info"  style="padding-bottom: 5px;padding-left: 70px">
								<h1> <b> Friend Requests . . . </b> </h1></a>
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