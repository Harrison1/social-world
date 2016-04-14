<?php 
	include '../main.php';

	$check = new Main;
	if(isset($_POST['username'],$_POST['password'])) {
		@$username = $_POST['username'];
		@$password = $_POST['password'];
		
		if(empty($username) or empty($password)) {
			echo "<div class='error'>Enter a Username and Password</div>";
		} else {
  			$check->login($username,$password);
		}
	}
?>
