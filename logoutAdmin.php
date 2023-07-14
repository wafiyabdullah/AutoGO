<?php
session_start();

// Unset specific session variables
unset($_SESSION["admin_id"]);
unset($_SESSION["admin_name"]);

// Destroy the session
session_destroy();

// Redirect to the admin login page
header("Location: adminLogin.php");
exit;
?>
