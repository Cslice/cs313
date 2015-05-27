<?php

require("connectToDatabase.php");

$groupID = 1;

  $db = loadDatabase();

$group = $db->query("SELECT u.id, u.first_name, u.last_name, u.number_of_points
                     FROM user_group g 
                     INNER JOIN user u 
                     ON g.id = u.group_id
                     WHERE u.group_id = $groupID;");
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

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- Bootstrap theme -->
    <link href="../../dist/css/bootstrap-theme.min.css" rel="stylesheet">

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

      <br />
      <br />

       <img src="http://www.foxnews.com/images/236484/0_61_basketball_new_nba.jpg" alt="Basketball">


      <div class="page-header">
        <h1>Group Name</h1>
      </div>
      <div class="row">
        <div class="col-md-10">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Number of Points</th>
              </tr>
            </thead>
            <tbody>
              
                  <?php 
                  $count = 1; 
                    foreach ($group as $row)
                    {
                    //  $nbaTeamName = $db->query('SELECT name FROM team t INNER JOIN user u ON t.id = u.favorite_team_in_playoffs_id where t.id = 9;');
                
                     echo "<tr>
                              <td>$count</td>
                              <td>$row[last_name] $row[first_name]</td>
                              <td>$row[number_of_points]</td>                  
                           </tr>";
                           $count++;
                    }
                  ?>                  
            </tbody>
          </table>
        </div>
       
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
