<?php

require_once('connectdb/establishconnection.php');

$query = "SELECT userID, firstname, lastname, password, email FROM users";
$queryP = "SELECT userID, gender, birthday, birthmonth, birthyear, city, state, aboutme, profilepic, coverpic FROM personalInfo";

$response = @mysqli_query($dbc, $query);
$responseP = @mysqli_query($dbc, $queryP);

if($response && $responseP) {

echo '<table align = "left" cellspacing="5" cellpadding="8">
            <td align="left"><b>id</b></td>     
			<td align="left"><b>First Name</b></td>
			<td align="left"><b>Last Name</b></td>
			<td align="left"><b>Password</b></td>
			<td align="left"><b>Email</b></td>
			<td align="left"><b>User ID Repeat</b></td>
			<td align="left"><b>Gender</b></td>
			<td align="left"><b>Birth Day</b></td>
			<td align="left"><b>Birth Month</b></td>
			<td align="left"><b>Birth Year</b></td>
			<td align="left"><b>City</b></td>
			<td align="left"><b>State</b></td>
			<td align="left"><b>About Me</b></td>
			<td align="left"><b>Profile Pic</b></td>
			<td align="left"><b>CoverPic</b></td>';

			while(($row = mysqli_fetch_array($response)) && ($rowP = mysqli_fetch_array($responseP))) {

			echo '<tr><td align="left">'. 
			$row['userID'] . '</td><td align="left">' .
			$row['firstname'] . '</td><td align="left">' .
			$row['lastname'] . '</td><td align="left">' .
			$row['password'] . '</td><td align="left">' .
			$row['email'] . '</td><td align="left">' .
			$rowP['userID'] . '</td><td align="left">' .
			$rowP['gender'] . '</td><td align="left">' .
			$rowP['birthday'] . '</td><td align="left">' .
			$rowP['birthmonth'] . '</td><td align="left">' .
			$rowP['birthyear'] . '</td><td align="left">' .
			$rowP['city'] . '</td><td align="left">' .
			$rowP['state'] . '</td><td align="left">' .
			$rowP['aboutme'] . '</td><td align="left">' .
			$rowP['profilepic'] . '</td><td align="left">' .
			$rowP['coverpic'] . '</td><td align="left">';

			echo '</tr>';	
			}

			echo '</table>';

		} else {
			echo "Couldn't complete database query<br />";

			echo mysqli_error($dbc);
		}

		mysqli_close($dbc);

?>