<?php 
	include '../sign.php';

	$check = new Main;

	if(isset($_POST['signup'])) {
		@$email = trim($_POST['email']);
		@$password = trim($_POST['passwordS']);
		@$rpassword = trim($_POST['repeatPassword']);
		
		if(empty($email) || empty($password) || empty($rpassword) || !($password==$rpassword)) {
				echo "<div class='error'>Try again</div>";
			} else {
				//$password = md5($password);
	  			$check->add_user($email,$password);
	  			$check->signup($email,$password);
			}
	}

?>