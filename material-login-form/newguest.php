<?php

	require_once("../connectdb/establishconnection.php");

	$firstname = 'Clydedo';
	$lastname = 'Jammerdo';
	$email = 'jammerdo@gmail.com';

	// $dbc->autocommit(FALSE);

	// $stmt1 = $dbc->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");

	// $stmt1->bind_param('sss', $firstname, $lastname, $email);
	// $stmt1->execute();
	// $affected_rows = mysqli_stmt_affected_rows($stmt1);

	// if ($affected_rows == 1)
	// {
	// 	echo '1 success';
	    
	// } else {
	// 	echo 'First query failed: ' . $dbc->error;
	// }

	// $stmt1->close();
	// $dbc->close();

	$query = "INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)";

	$stmt = mysqli_prepare($dbc, $query);

	mysqli_stmt_bind_param($stmt, "sss", $firstname, $lastname, $email);
	mysqli_stmt_execute($stmt);

	$affected_rows = mysqli_stmt_affected_rows($stmt);
	

	if($affected_rows == 1) {
		echo 'Member Entered';
		mysqli_stmt_close($stmt);
		mysqli_close($dbc);
	} else {
		echo 'Error Occured<br />';
		echo mysqli_error();
		mysqli_stmt_close($stmt);
		mysqli_close($dbc);
	}  

?>