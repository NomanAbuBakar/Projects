<?php
	session_start();
	$connection_status = mysqli_connect("localhost" , "root" , "" , "proj");
	echo "<br><br><br><br>" ;

	$usrName = $_SESSION['username'];

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

		<br><br><br><br><br>	

		<div>
		<form action="writing_msg.php" method="POST" id="msgform">
			<b>Reciever:</b> <input class=text-success type="text" name="reciever" placeholder="Enter Reciever Username"> <br><br>
			<b>Subject&nbsp;&nbsp;:</b> <input class=text-success type="text" name="subject" placeholder="Enter Subject"> <br><br>
		  
			<textarea style="height:350; width:500; overflow-y: scroll;" name="msg" form="msgform" placeholder="Enter Text Here . . . "></textarea><br><br>

			<input style="padding-left:20px; padding-right:20px; margin-left: 410px" type="submit" class="btn btn-danger" name="submit" value="Send" > <br><br>
		</form>

	<?php



	echo "<br><br><br><br><br>" ;

	if (isset($_POST['submit'])) {
		# code...
		$rec_name = $_POST['reciever'];
		$subject = $_POST['subject'];
		$msg = $_POST['msg'];
		$date = date("Y:m:d h:i:s");

		$sql = "INSERT INTO message(sender_name, reciever_name, send_status, recieve_status, message, subject, date_time)
				VALUES('$usrName', '$rec_name', 1 , 0 , '$msg', '$subject', '$date' )";
				mysqli_query($connection_status, $sql);
				header("Location: writing_msg.php");
}

	?>















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