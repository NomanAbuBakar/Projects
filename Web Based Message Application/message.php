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
			
				<li> <a href="Project0.php">Log out</a></li>
			</ul>

		</div>		
		<div>

	<?php
	echo "<br><br><br><br><br>" ;

	$msg_id = $_GET['id'];
	

	$sql = "SELECT * FROM message WHERE message_id = '$msg_id'";
	$result = mysqli_query($connection_status , $sql);
	$row = mysqli_fetch_assoc($result);

	$rec_status = $row['recieve_status'];
	if($rec_status == 0)
	{
		$sql1 = "UPDATE message SET recieve_status = 1 WHERE message_id = '$msg_id'";
		mysqli_query($connection_status , $sql1);
	}

	$sql2 = "SELECT * FROM message WHERE message_id = '$msg_id'";
	$result2 = mysqli_query($connection_status , $sql2);
	$row2 = mysqli_fetch_assoc($result2);

	$sender_name = $row2['sender_name'];
	$subject = $row2['subject'];
	$msg = $row2['message'];
	$date = $row2['date_time'];

	echo "<b>Sender Name : </b>".$sender_name. "<br><br>" ."<b>Subject : </b>" .$subject. "<br><br> <pre style='width:600px; height:500px;' class = 'pre-scrollable'>".$msg. " </pre><br> <b>Date/Time : </b>" .$date. "<br><br>";
	echo"";

?>


<a href='reply_message.php?id=<?= $row2['message_id']?>&user=<?= $usrName?>' class='btn btn-default'> <?php echo "Reply";?></a>
<a href='delete_message.php?id=<?= $row2['message_id']?>&user=<?= $usrName?>' class='btn btn-default'> <?php echo "Delete Message!";?></a>




<!DOCTYPE html>
<html>
			<link rel="stylesheet" href="css/bootstrap.min.css">

<head>
	<title></title>
</head>
<body style="background-color:#DFE2DB;">

	<form class = "form-inline" action='search.php' method='POST' align='center' style=';margin-top:100px; padding:50px;'> 	
	<div class="navbar navbar-inverse navbar-fixed-top">        <!-- Beautiful Navebar in "inverse" Class and Fixed, which will be not effected by scrolling and it'll be fix at the top . . .-->
			<div class="container-fluid">
			<br>
				<div class="row">
					<div class="navbar-header">
						<ul>
							<li class="nav navbar-nav ">
								<a href="Project1.php" class="navbar-brand"><span class="glyphicon glyphicon-arrow-left"></span></a>
							</li>
						
							<li class="nav navbar-nav navbar-right text-info"  style="padding-bottom: 5px;padding-left: 70px">
								<h1> <b> Messages . . . </b> </h1></a>
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