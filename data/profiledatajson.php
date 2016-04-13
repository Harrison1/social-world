<?php
  include '../main.php';

  $user_id = $_SESSION['user_id'];

  profileData($user_id);

  function profileData($id) {
        global $dbh;
        $query = $dbh->prepare("SELECT * FROM personalInfo WHERE personalInfo.userID= ?");
        $query->bindvalue(1,$id);
        $query->execute();

        $results=$query->fetchAll(PDO::FETCH_ASSOC);

        print json_encode($results);

        $dbh = null;
  }

?>


