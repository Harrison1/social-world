<?php
	session_start();
	include 'core/class/functions.php';
	include 'connectdb/connect.php';

	if(!isset($_SESSION['user_id'])) {
      header("location: login/loginpage.php");
    }
?>