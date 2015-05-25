<?php

$server = '127.0.0.1';
$database = 'nba_predictor_app';
$username = 'root';
$password = 'root';

$db = new PDO("mysql: host=$server; dbname=$database", $username, $password);
$groups = $db->query('select * from user_group');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    

    <!-- Custom styles for this template -->
    <link href="createAccountForm.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
        <h2 class="form-signin-heading">Please fill in the following information</h2>

      <form class="form-signin" method='POST' action="menu.php">
        <input type="text" name="firstName" class="form-control" placeholder="First Name" required autofocus>
        <br />

        <input type="text" name="lastName" class="form-control" placeholder="Last Name" required autofocus> 
        <br />

        <input type="text" name="username" class="form-control" placeholder="User ID" required autofocus>
        <br />
        
        <input type="password" name="password" class="form-control" placeholder="Password" required>

        <input type="text" name="groupID" class="form-control" placeholder="User ID" required autofocus>
        <br/> 
        <select>
          <?php
            foreach($groups as $row) 
            {
              echo "<option value=\"$row[group_name]\">$row[group_name]</option>";
            }
          ?>
        </select>

        <br /> 
        <br/> 


        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <br />
        <br />
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
