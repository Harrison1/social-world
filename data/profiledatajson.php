<?php
  
  include '../core/main.php';

  $myusername = $_SESSION['login_user'];

  $query = "SELECT * FROM users, personalInfo WHERE users.username= '$myusername' AND personalInfo.username= '$myusername'";

  $response = @mysqli_query($dbc, $query);

  $data = array();

  while ($row = mysqli_fetch_assoc($response)) {
  	$data[] = $row;
  }
    
  print json_encode($data);

  mysqli_close($dbc);


?>


