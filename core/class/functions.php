<?php 
	class  Main{
		//login function 
		public function login($username,$password){
			global $dbh;
	 		$query = $dbh->prepare("SELECT * from users WHERE username = ?");
			$query->bindValue(1,$username);
			//$query->bindValue(2,$password);
			$query->execute();
		    $rows = $query->fetch(PDO::FETCH_NUM);

			if(password_verify($password, $rows[3])) {
				$_SESSION['user_id'] = $rows[0];
				header('Location: ../feed.php');
				exit();			
			} else {
				  header('Location: loginpage.php');			
		    }
		}

		public function signup($username,$password) {
			global $dbh;
	 		$query = $dbh->prepare("SELECT * from users WHERE username = ?");
			$query->bindValue(1,$username);
			$query->execute();
		    $rows = $query->fetch(PDO::FETCH_NUM);

			if(password_verify($password, $rows[3])) {
				$_SESSION['user_id'] = $rows[0];
				header('Location: ../profilepage.php');
				exit();			
			} else {
				header('Location: loginpage.php');			
		    }
		}
		
		//check user is logged in or not 
		public function logged_in(){
			return (isset($_SESSION['user_id'])) ? true : false; 
		}
		//fetching posts from database
		public function posts(){
			global $dbh;
			$query = $dbh->prepare("SELECT * FROM posts, users, personalInfo WHERE users.userID = user_id_p AND personalInfo.userID = user_id_p ORDER BY post_id DESC");
			$query->execute();
			return $query->fetchAll();
		}
		//add new post if user post 
		public function add_post($user_id,$status,$file_path){
			global $dbh; 
			if(empty($file_path)){
				$file_path = 'NULL';
			}
			$query = $dbh->prepare('INSERT INTO `posts` (`post_id`, `user_id_p`, `status`, `status_image`, `status_time`) VALUES (NULL, ?, ?,?,  CURRENT_TIMESTAMP)');
			$query->bindValue(1,$user_id);
			$query->bindValue(2,$status);
			$query->bindValue(3,$file_path);
			$query->execute();
			header('Location: ../../feed.php');
			//echo '<script type="text/javascript">$("#scores").load("#scores");</script>';
		}
		//add new user
		public function add_user($email,$password){
			global $dbh; 
			$hash = password_hash($password, PASSWORD_DEFAULT);
			$query = $dbh->prepare("INSERT INTO users (userID, email, username, password) VALUES (NULL, ?, ?, ?)");
			$query->bindValue(1,$email);
			$query->bindValue(2,$email);
			$query->bindValue(3,$hash);
			$query->execute();

    		$last_id = $dbh->lastInsertId();

			$query2 = $dbh->prepare("INSERT INTO personalInfo (userID, username) VALUES (?, ?)");
			$query2->bindValue(1,$last_id);
			$query2->bindValue(2,$email);
			$query2->execute();

			session_start();

		}


		//fetch user data by user id 
		public function user_data($user_id){
			global $dbh;
			$query = $dbh->prepare('SELECT * FROM users WHERE user_id = ?');
			$query->bindvalue(1,$user_id);
			$query->execute();

			return $query->fetch();
		}

		public function personal_info($user_id){
			global $dbh;
			$query = $dbh->prepare('SELECT * FROM personalInfo WHERE userID = ?');
			$query->bindvalue(1,$user_id);
			$query->execute();

			return $query->fetch();
		}
		//timeAgo Function
		public function timeAgo($time_ago){

			$time_ago = strtotime($time_ago);
			$cur_time   = time();
			$time_elapsed   = $cur_time - $time_ago;
			$seconds    = $time_elapsed ;
			$minutes    = round($time_elapsed / 60 );
			$hours      = round($time_elapsed / 3600);
			$days       = round($time_elapsed / 86400 );
			$weeks      = round($time_elapsed / 604800);
			$months     = round($time_elapsed / 2600640 );
			$years      = round($time_elapsed / 31207680 );
			// Seconds
			if($seconds <= 60){
			    return "just now";
			}
			//Minutes
			else if($minutes <=60){
			    if($minutes==1){
			        return "one minute ago";
			    }
			    else{
			        return "$minutes minutes ago";
			    }
			}
			//Hours
			else if($hours <=24){
			    if($hours==1){
			        return "an hour ago";
			    }else{
			        return "$hours hrs ago";
			    }
			}
			//Days
			else if($days <= 7){
			    if($days==1){
			        return "yesterday";
			    }else{
			        return "$days days ago";
			    }
			}
			//Weeks
			else if($weeks <= 4.3){
			    if($weeks==1){
			        return "a week ago";
			    }else{
			        return "$weeks weeks ago";
			    }
			}
			//Months
			else if($months <=12){
			    if($months==1){
			        return "a month ago";
			    }else{
			        return "$months months ago";
			    }
			}
			//Years
			else{
			    if($years==1){
			        return "one year ago";
			    }else{
			        return "$years years ago";
			    }
			}
		}
	}
?>