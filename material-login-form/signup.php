<?php

	$email = trim($_POST['email']);
	$password = trim($_POST['passwordS']);
	$repeatPassword = trim($_POST['repeatPassword']);

	require_once("../connectdb/establishconnection.php");

	//$dbc->autocommit(FALSE);
	// $stmt1 = $dbc->prepare("INSERT INTO users (password, email, username) VALUES (?, ?, ?)");
	// $stmt1->bind_param('sss', $password, $email, $email);
	// $stmt1->execute();

	$query1 = "INSERT INTO users (password, email, username) VALUES (?, ?, ?)";

	$stmt1 = mysqli_prepare($dbc, $query1);

	mysqli_stmt_bind_param($stmt1, "sss", $password, $email, $email);
	mysqli_stmt_execute($stmt1);

	$affected_rows1 = mysqli_stmt_affected_rows($stmt1);

	if ($affected_rows1 == 1)
	{
		echo '1 success';
	    
	} else {
		echo 'First query failed: ' . mysqli_error();;
	}

	//$user_id = $dbc->insert_id;
	$user_id = mysqli_insert_id($dbc);

	//var_dump($user_id);

	//$stmt1->close();
	mysqli_stmt_close($stmt1);
		
	$query2 = "INSERT INTO personalInfo (userID, username) VALUES (?, ?)";

	$stmt2 = mysqli_prepare($dbc, $query2);

	mysqli_stmt_bind_param($stmt2, "is", $user_id, $email);
	mysqli_stmt_execute($stmt2);

	$affected_rows2 = mysqli_stmt_affected_rows($stmt2);

	// $stmt2 = $dbc->prepare("INSERT INTO personalInfo(userID, username) VALUES (?, ?)");

	// $stmt2->bind_param('is', $user_id, $email);
	// $stmt2->execute();
	// $affected_rowsp = mysqli_stmt_affected_rows($stmt2);

	if ($affected_rows2 == 1)
	{
		echo '2 success';
	    
	} else {
		echo mysqli_error();
		echo 'Second query failed: ' . mysqli_error();
		mysqli_close($dbc);
	}
	//$stmt2->close();
	//$dbc->close();
	mysqli_stmt_close($stmt2);

	
	session_start();
	   
   $sql = "SELECT userID FROM users WHERE username = '$email' AND password = '$password'"; 
   $result = mysqli_query($dbc,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $active = $row['active'];
   $count = mysqli_num_rows($result);

   // If result matched $email and $password, table row must be 1 row
 
   if($count == 1) {
      $_SESSION['login_user'] = $email;
      
      header("location: ../profilepagejsontest.php");
      
   }else {
      $error = "Your Login Name or Password is invalid";
   }


	//$query = "INSERT INTO users(password, email, username) VALUES (?, ?, ?)";

	//$stmt = mysqli_prepare($dbc, $query);

	// mysqli_stmt_bind_param($stmt, "sss", $password, $email, $username);
	// mysqli_stmt_execute($stmt);

	// $affected_rows = mysqli_stmt_affected_rows($stmt);
	
	//$user_id = mysqli_insert_id($stmt);
	


	// $queryp = "INSERT INTO personalInfo(username) VALUES (?)"

	// $stmtp = mysqli_prepare($dbc, $queryp);

	// mysqli_stmt_bind_param($stmtp, "s", $email);
	// mysqli_stmt_execute($stmtp);

	
	// $affected_rowsp = mysqli_stmt_affected_rows($stmtp);

	// if($affected_rows == 1 && $affected_rowsp == 1) {
	// 	echo 'Member Entered';
	// 	mysqli_stmt_close($stmt);
	// 	mysqli_stmt_close($stmtp);
	// 	mysqli_close($dbc);
	// } else {
	// 	echo 'Error Occured<br />';
	// 	echo mysqli_error();
	// 	mysqli_stmt_close($stmt);
	// 	mysqli_stmt_close($stmtp);
	// 	mysqli_close($dbc);
	// }  

?>