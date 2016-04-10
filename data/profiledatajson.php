<?php
  session_start();
  require_once('../connectdb/establishconnection.php');

  $myusername = $_SESSION['login_user'];
  //var_dump($myusername);

  $query = "SELECT users.firstname, users.lastname, personalInfo.gender, personalInfo.birthday, personalInfo.birthmonth, personalInfo.birthyear, personalInfo.city, personalInfo.state, personalInfo.aboutme, personalInfo.profilepicpath, personalInfo.profilepic, personalInfo.profilepicsave, personalInfo.profilepicdefault, personalInfo.coverpicpath, personalInfo.coverpic, personalInfo.coverpicsave, personalInfo.coverpicdefault FROM users, personalInfo WHERE users.username= '$myusername' AND personalInfo.username= '$myusername'";

  $response = @mysqli_query($dbc, $query);

  $data = array();

  while ($row = mysqli_fetch_assoc($response)) {
  	$data[] = $row;
  }
    
  print json_encode($data);

  mysqli_close($dbc);


?>


