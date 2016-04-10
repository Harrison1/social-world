<?php

  require_once('connectdb/establishconnection.php');

  $query = "SELECT users.firstname, personalInfo.gender, users.lastname FROM users INNER JOIN personalInfo ON users.userID=personalInfo.userID;";
  $queryP = "SELECT gender, birthday, aboutme FROM personalInfo WHERE userID=1";

  $response = @mysqli_query($dbc, $query);
  $responseP = @mysqli_query($dbc, $queryP);

  $data = array();
  $dataP = array();
 
  //$row = mysqli_fetch_array($response) OR die('Could not get response: ' . mysqli_error($dbc));

  while ($row = mysqli_fetch_assoc($response)) {
  	$data[] = $row;
  }

  while ($rowP = mysqli_fetch_assoc($responseP)) {
  	$dataP[] = $rowP;
  }

  //$result = array_merge($data, $dataP);

  //echo $result;
    
  print json_encode($data);

  mysqli_close($dbc);


?>


