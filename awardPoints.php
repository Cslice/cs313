<?php
    $game_list = $db->query("SELECT id, winner from game"); 
    $prediction_list = $db->query("SELECT id, game_id, prediction, points_given_flag 
    								from user_prediction"); 

   
 
   // echo "count game: " . $game_list->rowCount() . "<br />";
   //  echo "count: " . $prediction_list->rowCount() . "<br />";

    foreach($game_list as $game_row)
    {
    	$prediction_list = $db->query("SELECT id, user_id, game_id, prediction, points_given_flag
    								from user_prediction"); 
    	//echo "first loop <br />";
    	foreach($prediction_list as $prediction_row)
    	{
    		

    		// echo ($game_row[winner] != NULL) ? 'true' : 'false';
    		// echo "<br />";

    		// echo ($game_row[id] == $prediction_row[game_id]) ? 'true' : 'false';
    		// echo "<br />";

    		// echo ($game_row[winner] == $prediction_row[prediction]) ? 'true' : 'false';
    		// echo "<br />";

    		// echo ($prediction_row[points_given_flag] == NULL) ? 'true' : 'false';
    		// echo "<br />";
    		// echo "<br />";
    		// echo $prediction_row[number_of_points];
    		// echo "<br />";


    		//echo "second loop <br />";
    		if($game_row[winner] != NULL &&
    		   $game_row[id] == $prediction_row[game_id] && 
    		   $game_row[winner] == $prediction_row[prediction] &&
    		   $prediction_row[points_given_flag] == NULL)
    		{
    			
    			
    		// 	echo "number of points: " . $number_of_points;
    		// echo "<br />";

    		// 	echo "valid";
    			// Set points for correct game prediction to 1
    			$query = "UPDATE user_prediction
			    SET points_recieved_for_game=:points_recieved_for_game
				WHERE id='$prediction_row[id]'";
				$statement = $db->prepare($query);
				$statement->bindValue(':points_recieved_for_game', 1);
				$statement->execute();

				// Set awared points flag to 1
				$query = "UPDATE user_prediction
			     SET points_given_flag=:points_given_flag
				 WHERE id='$prediction_row[id]'";
				$statement = $db->prepare($query);
				$statement->bindValue(':points_given_flag', 1);
				$statement->execute();

				// Add 1 to totall points for user
				$query = "UPDATE user
			     SET number_of_points = (number_of_points + 1)
				 WHERE id=$prediction_row[user_id]";
				$statement = $db->prepare($query);
				$statement->execute();
    		}
    	}
    	//echo "end";
    }
?>