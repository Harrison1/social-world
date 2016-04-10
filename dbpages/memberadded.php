<html>
<head>
<title>Add Member</title>
</head>
<body>
<?php
	if(isset($_POST['submit'])) {

		$data_missing = array();

		if(empty($_POST['id'])) {
			$data_missing[] = 'id';
		} else {
			$id = trim($_POST['id']);
		}

		if(empty($_POST['first_name'])) {
			$data_missing[] = 'First Name';
		} else {
			$f_name = trim($_POST['first_name']);
		}

		if(empty($_POST['last_name'])) {
			$data_missing[] = 'Last Name';
		} else {
			$l_name = trim($_POST['last_name']);
		}

		if(empty($_POST['street'])) {
			$data_missing[] = 'Street';
		} else {
			$street = trim($_POST['street']);
		}

		if(empty($_POST['city'])) {
			$data_missing[] = 'City';
		} else {
			$city = trim($_POST['city']);
		}

		if(empty($_POST['state'])) {
			$data_missing[] = 'State';
		} else {
			$state = trim($_POST['state']);
		}

		if(empty($_POST['zip'])) {
			$data_missing[] = 'Zip';
		} else {
			$zip = trim($_POST['zip']);
		}

		if(empty($_POST['phone_number'])) {
			$data_missing[] = 'Phone Number';
		} else {
			$p_number = trim($_POST['phone_number']);
		}

		if(empty($data_missing)) {

			require_once('../db/connectdb.php');

			$query = "INSERT INTO members(id, first_name, last_name, street, city, state, zip, phone_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

			$stmt = mysqli_prepare($dbc, $query);

			mysqli_stmt_bind_param($stmt, "isssssii", $id, $f_name, $l_name, $street, $city, $state, $zip, $p_number);

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
			
		} else {
			echo 'You Need to enter the following date<br />';
			foreach($data_missing as $missing) {
				echo "$missing<br />";
			}
	    }

	}
?>

<form action="memberadded.php" method="post" >

<b>Add a Member</b>

<p>id: <input type="text" name="id" size="11" value"" /></p>
<p>First Name: <input type="text" name="first_name" size="30" value="" /></p>
<p>Last Name: <input type="text" name="last_name" size="30" value="" /></p>
<p>Street: <input type="text" name="street" size="30" value="" /></p>
<p>City: <input type="text" name="city" size="30" value="" /></p>
<p>State: <input type="text" name="state" size="30" maxlength="2" value="" /></p>
<p>Zip: <input type="text" name="zip" size="30" maxlength="5" value="" /></p>
<p>Phone Number: <input type="text" name="phone_number" size="30" value="" /></p>
<p><input type="submit" name="submit" value="send" /></p>

</form>

</body>
</html>
