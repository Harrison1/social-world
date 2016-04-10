<?php
    session_start();
	require_once('../connectdb/establishconnection.php');


	//if(isset($_POST['submit'])) {

		//$data = json_decode(file_get_contents("php://input"));
		$myusername = $_SESSION['login_user'];
		$postdata = file_get_contents("php://input");
		$request = json_decode($postdata);
		
		$f_name = $request->fnamekey;
		$l_name = $request->lnamekey;
		$gender = $request->genkey;
		$b_day = $request->bdaykey;
		$b_month = $request->bmonthkey;
		$b_year = $request->byearkey;
		$city = $request->citykey;
		$state = $request->statekey;
		$about = $request->aboutkey;


		//$f_name = $data->fkey;
		//$l_name = $data->lkey;

		 //$f_name = mysql_real_escape_string($data->fkey);
		 //$l_name = mysql_real_escape_string($data->lkey);

			//$f_name = $_POST['first_name'];
			//$l_name = $_POST['last_name'];

			$query = "UPDATE users, personalInfo 
						SET users.firstname='$f_name', users.lastname='$l_name', personalInfo.gender='$gender', personalInfo.birthday='$b_day',
							personalInfo.birthmonth='$b_month', personalInfo.birthyear='$b_year', personalInfo.city='$city', personalInfo.state='$state',
							personalInfo.aboutme='$about' 
						WHERE users.username='$myusername' AND personalInfo.username='$myusername'";


			$stmt = mysqli_prepare($dbc, $query);

			mysqli_stmt_bind_param($stmt, "sssiiisss", $f_name, $l_name, $gender, $b_day, $b_month, $b_year, $city, $state, $about);

			mysqli_stmt_execute($stmt);

			$affected_rows = mysqli_stmt_affected_rows($stmt);

			if($affected_rows == 1) {
				echo 'Profile Updated';
				mysqli_stmt_close($stmt);
				mysqli_close($dbc);
			} else {
				echo 'Error Occured<br />';
				echo mysqli_error();
				mysqli_stmt_close($stmt);
				mysqli_close($dbc);
			}
			
//		} 
?>
