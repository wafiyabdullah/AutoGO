<?php session_start();

include 'conn.php';

if (isset($_POST['upload'])){
	$car_image = $_FILES['image']['name'];
	$car_name= mysqli_real_escape_string($conn,$_POST['car_name']);
	$car_price=mysqli_real_escape_string($conn,$_POST['car_price']);
	$car_type=mysqli_real_escape_string($conn,$_POST['car_type']);
	$car_mileage=mysqli_real_escape_string($conn,$_POST['car_mileage']);
	$car_passenger=mysqli_real_escape_string($conn,$_POST['car_passenger']);
	$car_gear=mysqli_real_escape_string($conn,$_POST['car_gear']);

	$target = "image/".basename($car_image);

	$sql="INSERT INTO mobil (car_name, car_price, car_type, car_mileage, car_passenger, car_image, car_gear) VALUES ('$car_name', '$car_price', '$car_type', '$car_mileage', '$car_passenger', '$car_image', '$car_gear')";

	mysqli_query($conn,$sql);

	if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
		 echo '<script language="javascript">';
	     echo 'alert("Data is Succesfully Added!");';
	     echo 'window.location="homeAdmin.php";';
	     echo '</script>';

	    }else{
	     echo '<script language="javascript">';
	     echo 'alert("Data failed to Added!");';
	     echo '</script>';}
	 }
 
?>