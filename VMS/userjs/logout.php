<?php 
// Start the session
session_start();

// Destroy all session data
session_unset();
session_destroy();

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");


// Redirect to the login page or homepage
header("Location: login.php");

exit();










?>