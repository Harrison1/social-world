<?php

require_once('connectdb/establishconnection.php');

$query = "SELECT firstname, lastname, password, email FROM users WHERE userID=1";
$queryP = "SELECT gender, birthday, birthmonth, birthyear, city, state, aboutme, profilepic, coverpic FROM personalInfo WHERE userID=1";

$response = @mysqli_query($dbc, $query);
$responseP = @mysqli_query($dbc, $queryP);


$query = "SELECT firstname FROM users WHERE userID=1";

$response = @mysqli_query($dbc, $query);

if($response) {

      echo '<h1>name</h1>';

			while($row = mysqli_fetch_array($response)) {

			   echo '<h1>'.$row['firstname'].'</h1><br>';

			}

		} else {
			echo "Couldn't complete database query<br />";

			echo mysqli_error($dbc);
		}

?>

<h1>SPACE ME</h1>

<?php

$query = "SELECT lastname FROM users WHERE userID=1";

$response = @mysqli_query($dbc, $query);



      echo '<h1>butter</h1>';

      $row = mysqli_fetch_array($response);

      echo '<h1>'.$row['lastname'].'</h1><br>';

      echo 'butter2';

?>

<h1>NAME: <span> it is <?php echo $row['lastname']; ?> </span></h1>


	

<?php
    mysqli_close($dbc);
?>