<?php

  require_once('connectdb/establishconnection.php');

  $query = "SELECT gender, birthday, aboutme FROM personalInfo users WHERE userID=1";

  $response = @mysqli_query($dbc, $query);

  $pinfo = array();
 
  while ($row = mysqli_fetch_assoc($response)) {
  	$pinfo[] = $row;
  }
    print json_encode($pinfo);

    mysqli_close($dbc);

?>