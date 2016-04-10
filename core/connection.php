<?php
 try {
    $pdo = new PDO('mysql:host=localhost;dbname=socia204_sworld', 'socia204_harry', 'Java2016');
     
} catch (PDOException $e) {
    print "Connetion Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
