<?php
define('db_user','root');
define('db_password','');
define('db_host','localhost');
define('db_name','car');

$conn = mysqli_connect (db_host, db_user, db_password, db_name);

if (!$conn) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>