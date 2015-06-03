<?php
    require("connectToDatabase.php");
     $db = loadDatabase();
    // Check for session cookie and extracts user data out of cookie
    require("verifySession.php"); 
    require("awardPoints.php");


   

    $teams = $db->query('Select name from team;');
    $teamsArray = array();

    foreach($teams as $row)
    {
      array_push($teamsArray, $row[name]); 

    }

    $games = $db->query("Select g.id, g.team1_id, g.team2_id, g.game_date, g.winner, 
      g.round_number, g.round_id
                         FROM game g
                         INNER JOIN team as t
                         ON t.id = g.team1_id");

    $prediction_list = $db->query("Select game_id, prediction, points_recieved_for_game
                                   from user_prediction 
                                   WHERE user_id = $user_id");

    $prediction_array = array();
    $points_for_game_array = array();

    foreach ($prediction_list as $row)
    {
      $prediction_array[$row[game_id]] = $row[prediction];
      $points_for_game_array[$row[game_id]] = $row[points_recieved_for_game];

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

    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <script type="text/javascript">
    function sendSelectedOptions()
    {
      var option_list = document.getElementsByTagName("option");
      var prediction_list = new Array();
      var count = 0;
      var game_id = 0;
      var prediction = 0;

      for (i = 0; i < option_list.length; i++) 
      {
        if(option_list[i].selected && option_list[i].getAttribute("value") != "empty")
        {
          game_id = option_list[i].getAttribute("name");
         // alert(game_id);
          prediction = option_list[i].getAttribute("value");
          prediction_list[game_id] = prediction;
          //t("test");
        }
      }

     var json = JSON.stringify(prediction_list);
      alert(json);

      $.ajax({
       type: "POST",
       url: "savePredictions.php",
       //async: false,
       data: json,
       success: function(data){
          alert("success");
          return true;
       },
       complete: function() {},
       error: function(xhr, textStatus, errorThrown) {
         alert('ajax loading error...');
         return false;
       }
        });
      
    }
  

    </script>
  </head>

  <body role="document">

  <form method="POST" action="savePredictions.php">

    <div class="container theme-showcase" role="main">

      <br />
      <br />

       <img src="http://www.foxnews.com/images/236484/0_61_basketball_new_nba.jpg" alt="Basketball">

      <div class="page-header">
        <h1>You Predictions</h1>
      </div>
      <div class="row">
        <div class="col-md-10">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Team #1</th>
                <th>Team #2</th>
                <th>Date</th>
                <th>Winner</th>
                <th>Prediction</th>
                <th>Points Recieved For Game</th>
              </tr>
            </thead>
            <tbody>
                  <?php         
                  $count = 1;  

                    foreach ($games as $row)
                    {
                      $game_id = $row[id];
                      $team_1 = $teamsArray[$row[team1_id]];
                      $team_1_id = $row[team1_id];
                      $team_2 = $teamsArray[$row[team2_id]];
                      $team_2_id = $row[team2_id];
                      $game_date = $row[game_date];
                      $winner = $teamsArray[$row[winner]];

                      if(isset($prediction_array[$game_id]))
                      {
                        $prediction = $teamsArray[$prediction_array[$game_id]];
                      }
                      else
                      {
                        $prediction = NULL;
                      }
                      
                      
                      $points_recieved_for_game = $points_for_game_array[$game_id]; 
                    
      

                      echo "<tr>
                              <td>$count</td>
                              <td>$team_1</td>
                              <td>$team_2</td>
                              <td>$game_date</td>           
                              <td>$winner</td>";

                              if($prediction == NULL)
                              {
                                echo  "<td><select name='$game_id'>
                                       <option name='$game_id' value='empty'></option>  
                                       <option name='$game_id' value='$team_1_id'>
                                       $team_1</option>
                                       <option name='$game_id' value='$team_2_id'>
                                       $team_2</option></select></td>";
                              }
                              else
                              {
                                echo "<td>$prediction</td>";
                              }                        
                               echo "<td>$points_recieved_for_game</td>
                                     </tr>";
                          $count++;
                    }
                  ?>  

                  
                  <tr>
                <th>Total Points</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th><?php 
                      $points_list = $db->query("Select number_of_points from user
                                                 Where id = $user_id");

                      foreach($points_list as $row) 
                      {
                       // echo "hi";
                        echo $row[number_of_points];
                        break;
                      }
                    ?>
              </th>
              </tr>                
            </tbody>
          </table>
          <a href="menu.php"><button type="button" class="btn btn-lg btn-warning">Main Menu</button></a>
          <button type="submit"  class="btn btn-lg btn-warning">Save Predictions</button>

        </div>
       
      </div>
    </div> <!-- /container -->
<form >
      



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
