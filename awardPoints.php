<?php
	require("connectToDatabase.php");
    $db = loadDatabase();

    $game_ids = $db->query("SELECT id from game"); 
    $user_predictions = $db->query("SELECT id from game"); 

    foreach($game_ids as $row)
    {
    	foreach($predictions as $row)
    	{


    	}
    }




    if (validateUsername($username) && $valid_group)
	  	{
	  		echo "valid";
		  	$query = 'INSERT INTO user 
			(
			last_name                               ,  
			first_name                              ,
			username                                , 
			password                                , 
			group_id                                ,
			number_of_points                        ,
			admin                        
			)								  
			VALUES
			(
			:last_name							    ,
			:first_name								, 
			:username								, 
			:password								, 
			:group_id								, 
			:number_of_points                       ,
			:admin										
			)';

			$statement = $db->prepare($query);

			$statement->bindValue(':last_name', $last_name);
			$statement->bindValue(':first_name', $first_name);
			$statement->bindValue(':username', $username);
			$statement->bindValue(':password', $password);
			$statement->bindValue(':group_id', $group_id);
			$statement->bindValue(':number_of_points', 0);
			$statement->bindValue(':admin', 0);

			$statement->execute();

			$user_id = $db->lastInsertId();

			session_start();
  			$_SESSION["user_id"] = $user_id;
  			$_SESSION["admin"] = 0;
  			$_SESSION["group_id"] = $group_id;
  			header('Location: menu.php');
		}
?>