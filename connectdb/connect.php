<?php
 try {
    $dbh = new PDO('mysql:host=localhost;dbname=db_name', 'db_user', 'db_password');
     
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>