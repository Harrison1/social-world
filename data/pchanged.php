<?php
    include '../main.php';

    $user_id = $_SESSION['user_id'];

    profile_change($user_id);

	function profile_change($user_id) {

	    if(isset($_POST['submit'])) {
			
			global $dbh; 

			$query = $dbh->prepare("UPDATE personalInfo SET first_name = :firstname, last_name = :lastname, gender = :gender, birthday = :birthday, birthmonth = :birthmonth, birthyear = :birthyear, city = :city, state = :state, aboutme = :aboutme WHERE userID = :user_id");
			$query->bindParam(':firstname', $_POST['first_name']);
			$query->bindParam(':lastname', $_POST['last_name']);
			$query->bindParam(':gender', $_POST['gender']);
			$query->bindParam(':birthday', $_POST['birthday'], PDO::PARAM_INT);
			$query->bindParam(':birthmonth', $_POST['birthmonth'], PDO::PARAM_INT);
			$query->bindParam(':birthyear', $_POST['birthyear'], PDO::PARAM_INT);
			$query->bindParam(':city', $_POST['city']);
			$query->bindParam(':state', $_POST['state']);
			$query->bindParam('aboutme', $_POST['aboutme']);
			$query->bindParam('user_id', $user_id); 

			$query->execute();

			$dbh = null;

			header('Location: ../profilepage.php');
		}	

	}

?>
