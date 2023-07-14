<?php
session_start();
include 'conn.php';

$car_id = $_GET['car_id'];

// Get the updated car details from the POST data
$car_name = $_POST['car_name'];
$car_price = $_POST['car_price'];
$car_type = $_POST['car_type'];
$car_mileage = $_POST['car_mileage'];
$car_passenger = $_POST['car_passenger'];

$car_gear = $_POST['car_gear'];

// Update the car details in the database
$sql = "UPDATE mobil SET car_name='$car_name', car_price='$car_price', car_type='$car_type', car_mileage='$car_mileage',
        car_passenger='$car_passenger',  car_gear='$car_gear' WHERE car_id=$car_id";

if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysqli_error($conn));
}

mysqli_close($conn);

// Redirect to the homeAdmin.php page with a success message
header("Location: homeAdmin.php?update_success=true");
exit;
?>
