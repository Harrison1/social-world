<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Social World Login</title>
    
  

        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
      <link rel="stylesheet" type="text/css" href="../css/main.css">
    
  </head>

  <body style="background-color: #f5f8fa;">
    <main>
    <div class="container">

  <h1 style="text-align: center;">Welcome to Social World</h1>
  <h3 style="text-align: center;"></h3>

    <div class="container" style="margin: 0 auto 0;" >
        <div class="row">
        <div class="col s12 m12">
          <div class="card white" style="width: 400px; margin: auto; border-radius: 1em;">
            <div class="card-content" style="border-left: 4px solid #039be5; border-top-left-radius: 1em; border-bottom-left-radius: 1em;">
              <span class="card-title" style="color:#039be5; font-size: 36px; font-weight: 400;">Login</span>
            <form name="loginForm" action = "logmein.php" method = "POST">
              <div class="row">
              <div class="input-field col s12">
                <input type="text" id="username" name="username" length="100" class="validate"/>
                <label for="username">Email</label>
              </div>
              </div>
            <div class="row">
              <div class="input-field col s12">
                <input type="password" id="password"  name="password" />
                <label for="password">Password</label>
              </div>
               </div>
               <button class="modal-action waves-effect waves-circle waves-light btn" style="color: #00E676; border: 2px solid #00E676; border-radius: 6px; width: inherit; background-color: #fff; font-size: 24px;">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
</div>

<h4 style="text-align: center;"><a href="#signupmoreinfop" class="modal-trigger">Sign Up</a></h4>

<?php include('../sizup.html'); ?>

</div> <!-- container end -->

</main>

      <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
      <script type="text/javascript" src="../js/app.js"></script>
      <script type="text/javascript" src="../js/main.js"></script>
      <script src="../js/controllers/profilecontroller.js"></script>

    
    
    
  </body>
</html>
