<?php

DEFINE ('DB_USER', 'socia204_harry');
DEFINE ('DB_PASSWORD', 'Java2016');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'socia204_sworld');

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) 
OR die('Could not connect to Social World Database: ' . mysqli_connect_error());

?>