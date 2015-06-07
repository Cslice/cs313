<?php
	require("connectToDatabase.php");
	require("verifySession.php");
    $db = loadDatabase();

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		$data = $_POST;
		$game_id = "";
		$prediction = "";

		if(count($data) != 0)
		{
			foreach($data as $key => $value)
			{
				if($value != "empty")
				{
					$game_id = $key;
					$prediction = $value;

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

					// 
					$statement = $db->prepare($query);
					$statement->bindValue(':prediction', $prediction);
					$statement->bindValue(':user_id', $user_id);
					$statement->bindValue(':game_id', $game_id);
					$statement->execute();

					// Re-direct user to predictions page
			  		header('Location: userPredictionTable.php');
				}
			}
		}
	}
?>