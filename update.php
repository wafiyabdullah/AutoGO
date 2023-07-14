<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #FFF;
            color: black;
        }
        .topnavAdmin {
            overflow: hidden;
            background-color: #373737;
        }
        .topnavAdmin a {
            float: right;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            font-size: 17px;
            text-decoration: none;
        }
        .topnavAdmin span {
            float: left;
            color: #f2f2f2;
            font-size: 23px;
            padding: 14px 16px;
        }
        table {
            margin-left: 25%;
        }
        form {
            width: 90%;
            margin: 40px;
        }
        form input[type=text],
        form input[type=file],
        form input[type=select] {
            border-radius: 20px;
            padding: 10px;
            text-align: center;
        }
        form input[type=submit] {
            text-align: center;
            background-color: #f1f1f1;
            padding: 13px;
            width: 200px;
            cursor: pointer;
            border-radius: 50px;
        }
        input:read-only {
            background-color: #fff;
        }
        h2 {
            text-align: center;
        }
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        
    </style>
</head>
<body>
<div class="topnavAdmin">
        <a href="logoutAdmin.php">SIGN OUT</a>
        <span>ADMIN DASHBOARD</span>
    </div>
    <h2>Update Car Details Form</h2>
    <?php
    include 'conn.php';
    echo '<table><tr><td>';

    $car_id = $_GET['car_id'];
    $result = mysqli_query($conn, "SELECT * FROM mobil WHERE car_id = $car_id");
    $row = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    mysqli_close($conn);
    ?>

    <form action="updateProcess.php?car_id=<?= $row['car_id']; ?>" method="post" enctype="multipart/form-data">
        <b>ID : </b>
        <input type="text" name="car_id" value="<?= $row['car_id']; ?>" readonly="readonly"><br><br>
        <b>Name : </b>
        <input type="text" name="car_name" value="<?= $row['car_name']; ?>"><br><br>
        <b>Class : </b>
        <input type="text" name="car_type" value="<?= $row['car_type']; ?>"><br><br>
        <b>Price : </b>
        <input type="text" name="car_price" value="<?= $row['car_price']; ?>"><br><br>
        <b>Mileage : </b>
        <input type="text" name="car_mileage" value="<?= $row['car_mileage']; ?>"><br><br>
        <b>Max Passenger : </b>
        <input type="text" name="car_passenger" value="<?= $row['car_passenger']; ?>"><br><br>
        <b>Gear : </b>
        <input type="text" name="car_gear" value="<?= $row['car_gear']; ?>"><br><br>

        <br><br>
        <input type="submit" name="submit" value="UPDATE">
    </form>
    </td></tr></table>
    
</body>
</html>
