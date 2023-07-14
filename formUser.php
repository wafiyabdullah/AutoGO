<?php 
session_start();
include 'conn.php';

// Check if the admin is logged in
if (!isset($_SESSION["user_id"])) {
  // Redirect to the login page or display an error message
  header("Location: userlogin.php");
  exit;
}

$car_id = $_GET['car_id'];

$result = mysqli_query($conn, "SELECT * FROM mobil WHERE car_id = $car_id");
    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

?>
<!DOCTYPE html>
<html>
<head>
  <title>AutoGO</title>
  <style>

    h1 {
        text-align: center;
    }

    .form-container {
      max-width: 500px;
      margin: 0 auto;
      background-color: #f2f2f2;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-container label,
    .form-container input {
      display: block;
      margin-bottom: 10px;
    }
    .form-container label {
      font-weight: bold;
    }
    .form-container input[type="text"],
    .form-container input[type="tel"],
    .form-container input[type="date"] {
      width: 100%;
      padding: 10px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }
    .form-container input[type="submit"] {
      background-color: #474fa0;
      color: white;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 3px;
    }
    .form-container input[type="submit"]:hover {
      background-color: #fe5b3d;
    }
  </style>
</head>
<body>

    <br>
    <h1>Rent Form</h1>
    <br>

  <div class="form-container">
    <form method="post" action="">
      
      <label for="name">Email:</label>
      <input type="text" id="email" name="email" value="<?= $_SESSION['user_email'] ?>" readonly>

      <label for="name">Name:</label>
      <input type="text" id="name" name="name" value="<?= $row['car_name']; ?>" readonly>

      <label for="phone">Phone Number:</label>
      <input type="text" id="phone" name="phone" required>

      <label for="vehicle">Vehicle Type:</label>
      <input type="text" id="vehicle" name="vehicle" value="<?= $row['car_type']; ?>" readonly>

      <label for="location">Location:</label>
      <input type="text" id="location" name="location" required>

      <label for="pickup-date">Pickup Date:</label>
      <input type="date" id="pickupdate" name="pickupdate" required>

      <label for="return-date">Return Date:</label>
      <input type="date" id="returndate" name="returndate" required>

      <input type="submit" value="Submit">
    </form>
  </div>

  <?php
  
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          // Retrieve form data
          $usernumber = mysqli_real_escape_string($conn, $_POST['phone']);
          $carname = mysqli_real_escape_string($conn, $row['car_name']);
          $location = mysqli_real_escape_string($conn, $_POST['location']);
          $pdate = mysqli_real_escape_string($conn, $_POST['pickupdate']);
          $rdate = mysqli_real_escape_string($conn, $_POST['returndate']);
          $useremail = mysqli_real_escape_string($conn, $_SESSION['user_email']);
          $userid = mysqli_real_escape_string($conn, $_SESSION['user_id']);
        
          // Prepare and execute the SQL query
          $sql = "INSERT INTO userbooking (booking_id ,user_number, car_name, location, Pdate, Rdate, user_email) VALUES ( '$userid','$usernumber', '$carname', '$location', '$pdate', '$rdate', '$useremail')";
          
          if (mysqli_query($conn, $sql)) {
            echo '<script language="javascript">';
            echo 'alert("Your rent is Succesfully Added! check your email for details");';
            echo 'window.location="indexAfter.php";';
            echo '</script>';
          } else {
            echo '<script language="javascript">';
            echo 'alert("Data failed to Added!");';
            echo '</script>';
          }
        }
    
    ?>
</body>
</html>
