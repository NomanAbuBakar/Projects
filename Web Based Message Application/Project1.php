<?php
	session_start();
	$connection_status = mysqli_connect("localhost" , "root" , "" , "proj");

	if(!isset($_SESSION['username']))
	{
		header("Location: Project0.php");
	}
	else
	{
		$usrName = $_SESSION['username'];

		$sql = "SELECT * FROM register WHERE Username = '$usrName'";
		$result = mysqli_query($connection_status, $sql);
		$row = mysqli_fetch_assoc($result);

		$id = $row['id'];
		// So, now we got id and username of current user ...
?>

<html>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<style>
	li{
		padding:10px;
	}
	</style>
</head>	
<body  style="background-color:#DFE2DB;">
	<div class="container-fluid">
		<br><br>
		<div class="row">
			<div class="col-sm-10 col-md-offset-1" >
				<h1> Friends Diary...</h1> 
			</div>
		</div>
		
	<!-- <div class="container">
		<div class="row">
			<div class="col col-md-3"></div>
		</div>	
	</div>                      -->	
	
	<div class="row">
		<div class="col col-md-3 col-md-offset-1" style="border:solid; padding-bottom:340px; margin-top:20px;">
			<ul>
				<li style="padding-top:40px"> <a href="Project1.php">Home</a></li>

				<li> <a href="writing_msg.php">Wrting Text</a></li>
			
				<li> <a href="friend_request.php">Friends Request</a></li>
		
				<li> <a href="view_friends.php">View Friends</a></li>
			
				<li> <a href="search.php">Search</a></li>
			
				<li> <a href="Setting.php">Account Setting</a></li>
			
				<li> <a href="logout.php">Log out</a></li>
			</ul>

		</div>

		<div>
			<h2>&nbsp;&nbsp; -  Hello <?php echo "<b>". $_SESSION['username'] ."</b>"; ?></h2>
		</div>

		<div class="col col-md-7" style=" min-width: 700px;min-height:600px;max-height:600px;border:solid; padding-bottom:10px; margin-top:20px;margin-left:3px; overflow-y:scroll;">
			<ul>


				<?php
					// This will work for old messages (Seen)
					$sql1 = "SELECT * FROM message WHERE reciever_name = '$usrName' AND recieve_status = 1";
					$result1 = mysqli_query($connection_status, $sql1);

			
// Script and tutorial written by Adam Khoury @ developphp.com
// Line by line explanation : youtube.com/watch?v=T2QFNu_mivw

// This first query is just to get the total count of rows
$sql = "SELECT COUNT(message_id) FROM message WHERE reciever_name = '$usrName'";
$query = mysqli_query($connection_status, $sql);
$row = mysqli_fetch_row($query);
// Here we have the total row count
$rows = $row[0];
// This is the number of results we want displayed per page
$page_rows = 25;
// This tells us the page number of our last page
$last = ceil($rows/$page_rows);
// This makes sure $last cannot be less than 1
if($last < 1){
	$last = 1;
}
// Establish the $pagenum variable
$pagenum = 1;
// Get pagenum from URL vars if it is present, else it is = 1
if(isset($_GET['pn'])){
	$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}
// This makes sure the page number isn't below 1, or more than our $last page
if ($pagenum < 1) { 
    $pagenum = 1; 
} else if ($pagenum > $last) { 
    $pagenum = $last; 
}
// This sets the range of rows to query for the chosen $pagenum
$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
// This is your query again, it is for grabbing just one page worth of rows by applying $limit
$sql = "SELECT * FROM message WHERE reciever_name = '$usrName' ORDER BY date_time DESC $limit";
$query = mysqli_query($connection_status, $sql);
// This shows the user what page they are on, and the total number of pages
$textline1 = "Testimonials (<b>$rows</b>)";
$textline2 = "Page <b>$pagenum</b> of <b>$last</b>";
// Establish the $paginationCtrls variable
$paginationCtrls = '';
// If there is more than 1 page worth of results
if($last != 1){
	/* First we check if we are on page one. If we are then we don't need a link to 
	   the previous page or the first page so we do nothing. If we aren't then we
	   generate links to the first page, and to the previous page. */
	if ($pagenum > 1) {
        $previous = $pagenum - 1;
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Previous</a> &nbsp; &nbsp; ';
		// Render clickable number links that should appear on the left of the target page number
		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
			}
	    }
    }
	// Render the target page number, but without it being a link
	$paginationCtrls .= ''.$pagenum.' &nbsp; ';
	// Render clickable number links that should appear on the right of the target page number
	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+4){
			break;
		}
	}
	// This does the same as above, only checking if we are on the last page, and then generating the "Next"
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a> ';
    }
}

$list = '';
while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
	$id = $row["message_id"];
	$sender_name = $row["sender_name"];
	$subject = $row["subject"];
	$recieve_status = $row["recieve_status"];
	$date = $row["date_time"];
	
	if($recieve_status == 0)
	{
		$list .= '<b><a href="message.php?id='.$id.'">'.$sender_name.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$subject.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$date.'  </a></b><br>';
	}


	else 
	{
		$list .= '<b><a style="color:black;" href="message.php?id='.$id.'">'.$sender_name.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$subject.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$date.' </a></b><br>';
	}
	
}

}
?>

<!DOCTYPE html>
<html>
<head>
<style type="text/css">
body{ font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;}
div#pagination_controls{font-size:18px;}
div#pagination_controls > a{ color:#06F; }
div#pagination_controls > a:visited{ color:#06F; }
</style>
</head>
<body>
<div>

  <p><?php echo $textline2; ?></p>
  <p ><?php echo $list; ?></p>
  <div align="right"  id="pagination_controls"><?php echo $paginationCtrls; ?></div>
</div>
</body>
</html>

			</ul>

		</div>
			
			<div class="form-group">
				
				
			</div>
		</div>


</body>
</html>
