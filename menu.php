<?php 
    require("connectToDatabase.php");
    // Check for session cookie and extracts user data out of cookie
    require("verifySession.php");

    $db = loadDatabase();

    $first_name_list = $db->query("Select first_name from user 
                                   WHERE id = $user_id");

    foreach($first_name_list as $row)
    {
      $first_name = $row[first_name];
    }
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

    <title>Theme Template for Bootstrap</title>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="justified-nav.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body role="document">

    <div class="container theme-showcase" role="main">

      

      <div class="page-header">
        <h1><?php echo $first_name?></h1>
        <br />
        <h1>NBA Playoffs</h1>
      </div>
    


      <img class="baltimorePicture" src="http://www.nbaplayoffsbracket.com/img/nbaplayoffs.svg" alt="NBA Playoffs">

    <div class="page-header">
      <a href="userPredictionTable.php"><button type="button" class="btn btn-lg btn-info">View Your Predictions</button></a>
      <a href="playoffBracket.php"><button type="button" class="btn btn-lg btn-warning">View Playoff Bracket</button></a>
      <a href="groupTable.php"><button type="button" class="btn btn-lg btn-danger">View People In Your Group</button></a>
      <a href="endSession.php"><button type="button" class="btn btn-lg btn-danger">Sign Out</button></a>
    </div>

   
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
