<?php

include '../main.php';

$user_id = $_SESSION['user_id'];

if(isset($_POST["submit"])) {
     //checking image format                                                                                                       
     $allowed = array('jpg','jpeg','gif','png'); 
     $file_name = $_FILES['cover_image']['name']; 
     $file_extn = strtolower(end(explode('.', $file_name)));
     $file_temp = $_FILES['cover_image']['tmp_name'];
     
     if (in_array($file_extn, $allowed)===true) {
        $file_path = '../coverimages/' . substr(md5(time()), 0, 10).'.'.$file_extn;
        move_uploaded_file($file_temp, $file_path);
        change_cover_image($user_id, $file_path);

     }  else {
          echo 'File had a problem uploading, it was it either too big or a wrong type';
          echo implode(', ', $allowed);
     }
}

function change_cover_image($user_id, $file_path){
        global $dbh; 
        $query = $dbh->prepare("UPDATE personalInfo SET coverpic = ? WHERE userID = ?");
        $query->bindValue(1, $file_path);
        $query->bindValue(2, $user_id);
        $query->execute();
        header('Location: ../profilepage.php');
        //echo '<script type="text/javascript">$("#scores").load("#scores");</script>';
}
?>