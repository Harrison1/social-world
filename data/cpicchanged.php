<?php
session_start();
$myusername = $_SESSION['login_user'];

$target_dir = "../coverimages/";
$target_file = $target_dir . basename($_FILES["fileToUploadC"]["name"]);
$target_file_name = basename($_FILES["fileToUploadC"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUploadC"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;


    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUploadC"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUploadC"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUploadC"]["name"]). " has been uploaded.";

        require_once('../connectdb/establishconnection.php');

        $queryp = "SELECT coverpic FROM personalInfo WHERE username='$myusername'";
        $response = @mysqli_query($dbc, $queryp);
        $coverpic = '';

         if($response){
            $row = mysqli_fetch_array($response);
            $coverpic = $row['coverpic'];
         }
        
        $query = "UPDATE personalInfo SET coverpicsave='$coverpic', coverpic='$target_file_name' WHERE username='$myusername'";
        
        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "ss", $coverpic, $target_file_name);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1) {
            echo 'Cover Image Updated';
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        } else {
            echo 'Error Occured<br />';
            echo mysqli_error();
            mysqli_stmt_close($stmt);
            mysqli_close($dbc);
        }


    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>