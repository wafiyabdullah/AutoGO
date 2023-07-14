<?php
include 'conn.php';

$car_id = $_GET['car_id'];
$delete = "DELETE FROM mobil WHERE car_id = $car_id";

if (!mysqli_query($conn, $delete)) {
    die('Error: ' . mysqli_error($conn));
}

mysqli_close($conn);

header("Location: homeAdmin.php");
exit;

?>
