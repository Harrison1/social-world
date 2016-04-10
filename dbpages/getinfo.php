<!DOCTYPE html>
  <html>
    <head>
      <!--Include Files-->
      <?php include('headincludefiles.html'); ?>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    </head>

    <body style="background-color: #f5f8fa;" ng-app="socialworldapp" ng-controller="ProfileController" ng-cloak>
      <main>
      <!-- navbar -->
      <?php require_once('navbar.html'); ?>

      <div class="container">


      <h1>Social World</h1>

<?php

  require_once('getdbinfo.php');

  // $query = "SELECT firstname, lastname, password, email FROM users WHERE userID=1";
  // $queryP = "SELECT gender, birthday, birthmonth, birthyear, city, state, aboutme, profilepic, coverpic FROM personalInfo WHERE userID=1";

  // $response = @mysqli_query($dbc, $query);
  // $responseP = @mysqli_query($dbc, $queryP);
  // $row = mysqli_fetch_array($response) OR die('Could not get response: ' . mysqli_error($dbc));
  // $rowP = mysqli_fetch_array($responseP) OR die('Could not connect to responseP: ' . mysqli_error($dbc));;

  // mysqli_close($dbc);

?>

<h1>First NAME: <span> it is <?php echo $row['firstname']; ?> </span></h1>

<h1>Last NAME: <span> it is <?php echo $row['lastname']; ?> </span></h1>

<h1>Password: <span> it is <?php echo $row['password']; ?> </span></h1>

<h1>Email: <span> it is <?php echo $row['email']; ?> </span></h1>

<h1>Email: <span> it is <?php echo $rowP['birthday']; ?> </span></h1>

<h1>Email: <span> it is <?php echo $rowP['birthmont']; ?> </span></h1>

<h1>Email: <span> it is <?php echo $rowP['birthyear']; ?> </span></h1>

</div>

</main>

      <!-- footer -->
      <?php include('footer.html'); ?>

      <!-- included scripts -->
      <?php include('includedscripts.html'); ?>

  </body>

</html>
