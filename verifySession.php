<?php
	session_start();

	if (isset($_SESSION[user_id]))
	{
		 $user_id = $_SESSION[user_id];
		 $admin = $_SESSION[admin];
		 $group_id = $_SESSION[group_id];
	}
	else
	{
		// Go to sign in page if user doesn't have a session cookie
		header('Location: signInPage.php');
	}
?>