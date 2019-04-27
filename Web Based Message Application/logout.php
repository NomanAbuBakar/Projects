<?php
	session_start();

	session_unset();
	session_destroy();
	header("Location: Project0.php");
