/*Select g.id, g.team1_id, g.team2_id, g.game_date, g.winner, g.round_number, g.round_id,
                     u.prediction, u.points_recieved_for_game
                     FROM game g
                     INNER JOIN user_prediction u
                     ON g.id = u.game_id
                     INNER JOIN team as t
                     ON t.id = g.team1_id
                     INNER JOIN team as t2
                     ON t2.id = g.team2_id;



                     SELECT u.user_id, u.prediction, 
       u.points_recieved_for_game, g.team1_id, g.team2_id, g.winner
                     FROM game g 
                     INNER JOIN user_prediction u
                     ON g.id = u.game_id 
                     INNER JOIN team as t
                     ON t.id = g.team1_id where u.user_id = 1;






                      <?php         
                  $count = 1;  

                    foreach ($games as $row)
                    {
                     
                      echo $teamsArray[2];
                      $team_1 = $teamsArray[$row[team1_id]];
                      $team_2 = $teamsArray[$row[team2_id]];
                      $winner = $teamsArray[$row[winner]];
                    
                
                     echo "<tr>
                              <td>$count</td>
                              <td>$team_1</td>
                              <td>$team_2</td>
                              <td>$row[points_recieved_for_game]</td>           
                              <td>$winner</td>
                           </tr>";
                          $count++;
                    }
                  ?>  */

                  select id from user_group
	    								WHERE group_name = 'Test Group';