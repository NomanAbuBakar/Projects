<?php
	session_start();
	$connection_status = mysqli_connect("localhost" , "root" , "" , "proj");
?>

	
<html>
	<head>
		<title> -- Friends Diary Registeration --</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
				<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>

	</head>
	
	<!-- 12 columns included in 1 row -->
	<body style="background-color:#ECECEA;">

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
								<h1> <b> Account Setting </b> </h1></a>
							</li>
						</ul>
					</div>

				</div>
			</div>
		</div>
	<br><br><br><br><br><br><br><br>
	<form action="Setting.php" method="post" style="margin-right: 800px">
			
			<ul class="nav nav-pills nav-justified ">  <!--"nav-stacked" will show vertical -->
				<li><a href="username.php" name=usernam><h3> <b>Change Username <b> <span class=" glyphicon glyphicon-user"></span></h3></a></li>
			</ul>
			<br>
			<ul class="nav nav-pills nav-justified ">  <!--"nav-stacked" will show vertical -->
				<li><a href="changePassword.php" name=password><h3><b>Change Password <b><span class=" glyphicon glyphicon-option-horizontal"></h3></a></li>
			</ul>
			<br>
			<ul class="nav nav-pills nav-justified ">  <!--"nav-stacked" will show vertical -->
				<li><a  name=address href="changeAddress.php"><h3><b>Change Address  <b><span class=" glyphicon glyphicon-home"></span></h3></a>
			</ul>
			<br><br>
			<ul class="nav nav-pills nav-justified ">  <!--"nav-stacked" will show vertical -->
				<li><a  name=address href="Project1.php"><h3><b>Back  <b><span class="glyphicon glyphicon-arrow-left"></span></h3></a>
			</ul>	
			</form>
		
	</div>
	<div>

	
</div>
</body>

<?php?>
</html>



