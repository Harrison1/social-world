<?php

  require_once('connectdb/establishconnection.php');

  $query = "SELECT firstname, lastname, password, email FROM users WHERE userID=1";
  $queryP = "SELECT gender, birthday, birthmonth, birthyear, city, state, aboutme, profilepic, coverpic FROM personalInfo WHERE userID=1";

  $response = @mysqli_query($dbc, $query);
  $responseP = @mysqli_query($dbc, $queryP);
  $row = mysqli_fetch_array($response) OR die('Could not get response: ' . mysqli_error($dbc));
  $rowP = mysqli_fetch_array($responseP) OR die('Could not connect to responseP: ' . mysqli_error($dbc));

  mysqli_close($dbc);

?>