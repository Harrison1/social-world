<?php
 try {
    $dbh = new PDO('mysql:host=localhost;dbname=socia204_sworld', 'socia204_harry', 'Java2016');
     
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>