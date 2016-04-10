<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Material Login Form</title>
    
    
    <link rel="stylesheet" href="css/reset.css">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="css/style.css">
    
  </head>

  <body>
    
<!-- Mixins-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>Welcome to Social World</h1>
  <h3>Material Login Form</h3><span>Pen <i class='fa fa-code'></i> by <a href='http://andytran.me'>Andy Tran</a></span>
</div>
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <form action = "login.php" method = "POST">
      <div class="input-container">
        <input type="text" id="username" name="username" required="required" />
        <label for="username">Email</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="password"  name="password" required="required"/>
        <label for="password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button type = "submit"><span>Go</span></button>
      </div>
      <div class="footer"><a href="#">Forgot your password?</a></div>
    </form>
  </div>
  <div class="card alt">
    <div class="toggle"></div>
    <h1 class="title">Register
      <div class="close"></div>
    </h1>
    <form action = "signup.php" method = "POST">
      <div class="input-container">
        <input type="text" id="email"  name="email" required="required"/>
        <label for="email">Email</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="passwordS" name="passwordS" required="required"/>
        <label for="passwordS">Password</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="repeatPassword" name="repeatPassword" required="required"/>
        <label for="repeatPassword">Repeat Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button><span>Next</span></button>
      </div>
    </form>
  </div>
</div>
<!-- Portfolio--><a id="portfolio" href="http://andytran.me/" title="View my portfolio!"><i class="fa fa-link"></i></a>
<!-- CodePen--><a id="codepen" href="http://codepen.io/andytran/" title="Follow me!"><i class="fa fa-codepen"></i></a>
    
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
    
  </body>
</html>
