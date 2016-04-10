<?php 
require_once("../connectdb/establishconnection.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
   // username and password sent from form 
   
   $myusername = mysqli_real_escape_string($dbc,$_POST['username']);
   $mypassword = mysqli_real_escape_string($dbc,$_POST['password']);
   
   $sql = "SELECT userID FROM users WHERE username = '$myusername' AND password = '$mypassword'"; 
   $result = mysqli_query($dbc,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $active = $row['active'];
   $count = mysqli_num_rows($result);

   // If result matched $myusername and $mypassword, table row must be 1 row
 
   if($count == 1) {
      $_SESSION['login_user'] = $myusername;
      
      header("location: ../profilepagejsontest.php");
      
   }else {
      $error = "Your Login Name or Password is invalid";
   }
}

?>
