<?php
session_start();

// Unset specific session variables
unset($_SESSION["user_id"]);
unset($_SESSION["email_name"]);

// Destroy the session
session_destroy();

// Redirect to the admin login page
header("Location: index.php");
exit;
?>
