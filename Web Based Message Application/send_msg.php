<?php
	session_start();
	$connection_status = mysqli_connect("localhost" , "root" , "" , "proj");
	echo "<br><br><br><br>" ;

	$usrName = $_SESSION['username'];

	if(isset($_POST['submit']))
	{
		$re_name = $_POST['reciever'];
		$subject = $_POST['subject'];
		$msg = $_POST['msg'];
	
	//$sql = "SELECT * FROM message WHERE message_id='$id'";
	//$result = mysqli_query($connection_status, $sql);
	//$row = mysqli_fetch_assoc($result);
	
	$date = date("Y:m:d h:i:s");

	$sql1 = "INSERT INTO message(sender_name, reciever_name, send_status, recieve_status, message, subject, date_time)
			VALUES('$usrName', '$re_name', 1 , 0 , '$msg', '$subject', '$date' )";
			mysqli_query($connection_status, $sql1);
			header("Location: Project1.php");
}

?>