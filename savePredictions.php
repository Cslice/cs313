<?php
	require("connectToDatabase.php");
	require("verifySession.php");
    $db = loadDatabase();

	$data = $_POST;
	//var_dump($data);
	$game_id = "";
	$prediction = "";


	foreach($data as $key => $value)
	{
		if($value != "empty")
		{
			//echo $key . " " . $value . "<br/>";

			$game_id = $key;
			$prediction = $value;

		// $query = 'UPDATE user_prediction
		// 	  SET prediction = :prediction
		// 	  WHERE user_id = :user_id 
		// 	  AND game_id = :game_id;';

			  $query = 'INSERT INTO user_prediction 
				(
				user_id                               ,  
				game_id                              ,
				prediction                                                      
				)								  
				VALUES
				(
				:user_id                               ,  
				:game_id                              ,
				:prediction        																	
				)';

				$statement = $db->prepare($query);

				$statement->bindValue(':prediction', $prediction);
				$statement->bindValue(':user_id', $user_id);
				$statement->bindValue(':game_id', $game_id);

				$statement->execute();
	  			header('Location: userPredictionTable.php');


				//$user_id = $db->lastInsertId();
		}


	}
?>