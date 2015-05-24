/*SELECT u.id, u.first_name, u.last_name, u.number_of_points,
                     u.user_image_url, t.name as 'team_name' 
                     FROM user_group g 
                     INNER JOIN user u 
                     ON g.id = u.group_id
                     INNER JOIN team t 
                     ON t.id = u.favorite_team_in_playoffs_id;*/

SELECT u.id, u.user_id, u.game_id, u.prediction, 
       u.points_recieved_for_game, g.team1_id, g.team2_id, 
       g.game_in_series, g.winner, g.favored_team
                     FROM game g 
                     INNER JOIN user_prediction u
                     ON g.id = u.game_id 
                     INNER JOIN team as t
                     ON t.id = g.team1_id;