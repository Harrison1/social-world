<?php 
	/* Author: Aizaz Ud Din (Aizaz.dinho)*/
	/* Made By: Meralesson.com*/
	/* Edits By: Harrison McGuire*/
	include 'main.php';
	$check  = new Main;
	$get    = new Main;
	$send   = new Main;
   @$user_id = $_SESSION['user_id'];
   	//fetching user data by user_id
	$data = $get->user_data($user_id);
	$pinfo = $get->personal_info($user_id);
	// fetching posts from database
	$post = $get->posts();
	//check user submit  data
	if(isset($_POST['submit'])){
		$status  = $_POST['status'];
		//checking image if isset
		if (isset($_FILES['post_image'])===true) {
			//if image is not empty 
			 if (empty($_FILES['post_image']['name']) ===true) {
				if(!empty($status)===true){
					$send->add_post($user_id,$status);
				}
			 	 }else {
			 	 //checking image format                                                                                                       
				 $allowed = array('jpg','jpeg','gif','png'); 
				 $file_name = $_FILES['post_image']['name']; 
				 $file_extn = strtolower(end(explode('.', $file_name)));
				 $file_temp = $_FILES['post_image']['tmp_name'];
				 
				 if (in_array($file_extn, $allowed)===true) {
				 	$file_parh = 'images/posts/' . substr(md5(time()), 0, 10).'.'.$file_extn;
				   move_uploaded_file($file_temp, $file_parh);
				   $send->add_post($user_id,$status,$file_parh);

				 }else{
				  echo 'incorrect File only Allowed with less then 1mb ';
				  echo implode(', ', $allowed);
				 }
			 }
			
		}

	}
?>

<html>
	<head>
		<title>Social World News Feed</title>
		<?php include('headincludefiles.html'); ?>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>

	  <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	</head>

<body style="background-color: #f5f8fa;" >
      <main>
      <!-- navbar -->
      <?php include('navbar.html'); ?>

	<div class="wrapper">		
		<!--content -->
		<div class="content">
			<!--left-content-->
			<div class="center">
			<div id="scores">	
				<div class="posts">
					<div class="create-posts">
 					<form action="" method="post" enctype="multipart/form-data">
						<div class="c-header">
							<div class="c-h-inner">
							<p style="text-align: center; color: #fff; font-size: 22px; margin: 0;">Post Something New</p>
							</div>
						</div>
						<div class="c-body">
							<div class="body-left">
								<div class="img-box">
									<img src="<?php echo $pinfo['profilepic'];?>"></img>
								</div>
							</div>
							<div class="body-right">
								<textarea class="text-type" name="status" placeholder="What's on your mind?"></textarea>
							</div>
							<div id="body-bottom">
							<img src="#"  id="preview"/>
							</div>
						</div>
						<div class="c-footer">
							<input type="file"  onchange="readURL(this);" style="display:none;" name="post_image" id="uploadFile">
							<a href="#" id="uploadTrigger" name="post_image" class="waves-effect waves-light btn" style="right: 120px;"><i class="material-icons left">panorama</i>add photo</a>
							<div class="right-box">
									<input type="submit" name="submit" value="Post" class="waves-effect waves-light btnp" />
							</div>
								
							</div>
						</div>
						</div>
					
						<?php foreach($post as $row){
							//fetching all posts
							$time_ago = $row['status_time'];
						echo '
						<div class="post-show">
									<div class="post-show-inner">
										<div class="post-header">
											<div class="post-left-box">
												<div class="id-img-box"><img src="'.$row['profilepic'].'"></img></div>
												<div class="id-name">
													<ul>
														<li><a href="#">'.$row['first_name'].'</a></li>
														<li><small>'.$get->timeAgo($time_ago).'</small></li>
													</ul>
												</div>
											</div>
											<div class="post-right-box"></div>
										</div>
									
											<div class="post-body">
											<div class="post-header-text">
												'.$row['status'].'
											</div>'.( ($row['status_image'] != 'NULL') ? '<div class="post-img">
												<img src="'.$row['status_image'].'"></img></div>' : '').'
											<div class="post-footer">
												<div class="post-footer-inner">
													<ul>
														<li><a href="#">Like</a></li>
													</ul>	
												</div>
											</div>
										</div>
									</div>
								</div><br> ';	
					}	
				?>
				</div>
					</div>
					</form>	
													
			</div>

 

</div>

</main>
      <!-- footer -->
      <?php include('footer.html'); ?>

      <!-- included scripts -->
      <?php include('includedscripts.html'); ?>

<script type="text/javascript">
 //Image Preview Function
	$("#uploadTrigger").click(function(){
	   $("#uploadFile").click();
	});
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                	$('#body-bottom').show();
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

</script>
</body>
</html>