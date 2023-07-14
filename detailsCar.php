<?php
session_start();
include 'conn.php';

// Check if the admin is logged in
if (!isset($_SESSION["admin_name"])) {
    // Redirect to the login page or display an error message
    header("Location: loginAdmin.php");
    exit;
}

// Retrieve the car_id from the URL
$car_id = $_GET['car_id'];

// Fetch the car details from the database
$result = mysqli_query($conn, "SELECT * FROM mobil WHERE car_id = $car_id");
$row = mysqli_fetch_assoc($result);
mysqli_free_result($result);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body{
			margin: 0px;
			font-family: Arial;
		}
		.topnavAdmin{
        overflow: hidden;
        background-color: #373737;
      }

      .topnavAdmin a{
         float: right;
         color: #f2f2f2;
         text-align: center;
         padding: 14px 16px;
         font-size: 17px;
         text-decoration: none;
      }
      .topnavAdmin span{
         float: left;
         color: #f2f2f2;
         font-size: 23px;
         padding: 14px 16px;
      }
      table{
      	margin: 30px;
		margin-left: auto;
		margin-right: auto;
		font-size: 16px;
		min-width: 400px;
		overflow: hidden;
		color: black;
		float: center;
			 
		}
		table th, table td{
			padding: 15px 30px;
			border-bottom: 1px solid #ddd;
		}
		table tr{
			padding: 50px;
			margin: 30px;
		}
		table th{
			background-color: #FA101D;
			border-radius: 100px;
			color: #fff;
		}
		table h2{
			text-align: center;
		}
		.update{
			width: 150px;
		    background-color: #f1f1f1;
		    border-radius: 20px;
		    color: #000;
		    border: 2px solid #12385b;
		    font-size: 16px;
		    padding: 10px;
	   }
		.delete{
			width: 150px;
		    background-color: #f1f1f1;
		    border-radius: 20px;
		    color: #000;
		    border: 2px solid #12385b;
		    font-size: 16px;
		    padding: 10px;
		}
    </style>
</head>
<body>
    <div class="topnavAdmin">
        <a href="logoutAdmin.php">SIGN OUT</a>

        <span>ADMIN DASHBOARD</span>
    </div>
    <table>
        <tbody>
            <tr>
                <td colspan="6">
                    <img src="image/<?php echo $row['car_image']; ?>" style="width: 450px; height: 230px;">
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <h2><?php echo $row['car_name']; ?></h2>
                </td>
            </tr>
            <tr>
                <th>Class :</th>
                <td><?php echo $row['car_type']; ?></td>
                <th>Price Per Day :</th>
                <td><?php echo $row['car_price']; ?></td>
            </tr>
            <tr>
                <th>Mileage :</th>
                <td><?php echo $row['car_mileage']; ?></td>
                <th>Max Passenger :</th>
                <td><?php echo $row['car_passenger']; ?></td>
            </tr>
            <tr>
                <th>Gear :</th>
                <td><?php echo $row['car_gear']; ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button class="update">
                        <a href="update.php?car_id=<?php echo $row['car_id']; ?>" style="text-decoration:none;">Update</a>
                    </button>
                </td>
                <td colspan="3">
                    <button class="delete">
                        <a onclick="javascript:return confirm('Are you sure you want to delete this?');" href="delete.php?car_id=<?php echo $row['car_id']; ?>" style="text-decoration:none;">Delete</a>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>


