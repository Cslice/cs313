<?php
	// Start session and then destroy it because
	// the user is logged out.
	session_start();
	session_destroy();

	// Re-direct user to sign-in page 
	header('Location: signInPage.php');
?>