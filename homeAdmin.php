<?php
session_start();
include 'conn.php';

// Check if the admin is logged in
if (!isset($_SESSION["admin_name"])) {
    // Redirect to the login page or display an error message
    header("Location: loginAdmin.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard</title>
  
  <style>
    html{
      height: 100%;
    }
    body {
      margin: 0;
      padding: 0;
      min-height: 100%;
      display: flex;
      flex-direction: column;
      font-family: Arial, sans-serif;
    }

    .tab-container {
      display: flex;
      height: 87.2vh;
    }

    .tab-links {
      width: 200px;
      background-color: #f1f1f1;
    }

    .tab-link {
      display: block;
      width: 100%;
      padding: 30px;
      border: none;
      background-color: inherit;
      text-align: left;
      cursor: pointer;
    }

    .tab-link:hover {
      background-color: #ddd;
    }

    .tab-link.active {
      background-color: #ccc;
    }

    .tab-content {
      flex-grow: 1;
      padding: 20px;
    }

    .tab {
      display: none;
    }

    .tab.active {
      display: block;
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
    table,th,td{
      border: 1px solid black;
      border-collapse: collapse;
    }
		 .table-all {
		 	margin-left: auto;
		  margin-right: auto;
			font-size: 16px;
			min-width: 400px;
			color: black;
			text-align: center;
		 }
		 .table-all td a{
		 	text-decoration: none;
		 	color: #FA101D;
		 	font-family: monospace;
		 }
		 .table-all th, .table-all td{
			padding: 12px 15px;
		}
     .main h2{
      	color: #373737;
      	font-size: 23px;
      	text-align: center;
      	
      }
      .table-all {
       margin: 30px;
			 margin-left: auto;
		   margin-right: auto;
       min-width: 400px;
			 font-size: 16px;
			 color: black;
			 float: center;
		}
    .table-all th, .table-all td{
			padding: 12px 15px;
		}
	   form{
	    width: 60%;
	    margin-left: auto;
	    margin-right: 40px;
	   }
	   form div{
	    margin-top: 5px;
	    padding: 20px;
	   }
	   form input[type=text], input[type=file], input[type=select]{
	    border-radius: 20px;
	    padding: 10px;
	    text-align: center;
	   }
	   .button button[type=submit]{
	    text-align: center;
	    background-color: #f1f1f1;
	    padding: 13px;
	    width: 200px;
	    cursor: pointer;
	    border-radius: 50px;
	   }
       footer {
        overflow: hidden;
        background-color: #ccc;
        text-align: center;
        margin-top: auto;
        }

        .container {
        max-width: 960px;
        margin: 0 auto;
        }

    </style>
</head>
<body>
<div class="topnavAdmin">
        <a href="logoutAdmin.php">SIGN OUT</a>
        <span>ADMIN DASHBOARD</span>
    </div>

  <div class="tab-container">
    <div class="tab-links">
      <button class="tab-link active" onclick="openTab(event, 'tab1')">HOME</button>
      <button class="tab-link" onclick="openTab(event, 'tab2')">ADMIN</button>
      <button class="tab-link" onclick="openTab(event, 'tab3')">NEW CAR</button>
      <button class="tab-link" onclick="openTab(event, 'tab4')">BOOKING</button>
      <button class="tab-link" onclick="openTab(event, 'tab5')">REGISTERED USER</button>
      
    </div>
    <div class="tab-content">
     <!---------------------------------------------------------------->
     <div id="tab1" class="tab active">
    <div class="main">
        <?php
        if($_SESSION["admin_name"]){
            echo "<p style='text-align: center'>Welcome Admin: " . $_SESSION["admin_name"] . "</p>";
        }
        ?>
        <br><br>
        <p id="carList"><h2>List of Available Cars</h2></p>
        <table class="table-all">
            <tr>
                <th style="width: 30%">Car ID</th>
                <th>Car Name</th>
            </tr>
            <?php
            $result = mysqli_query($conn, "SELECT car_id, car_name FROM mobil");
              
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['car_id'] . "</td>";
                echo "<td><a href='detailsCar.php?car_id=" . $row['car_id'] . "'>" . $row['car_name'] . "</a></td>";
                echo "</tr>";
            }

            ?>
        </table>
    </div>
</div>

       <!---------------------------------------------------------------->
      <div id="tab2" class="tab">
          <div class="main">
          <?php
            if($_SESSION["admin_name"]){
                echo "<p style='text-align: center'>Welcome Admin: " . $_SESSION["admin_name"] . "</p>";
            }
            ?>
          <br><br><br><h2>List of Access Admin</h2><br>
          <table class="table-all">
                  <tr style="background-color:  #f1f1f1 ">
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Address</th>
                  </tr>
           
                  <?php
                  $result = mysqli_query($conn, "SELECT * FROM admin");

                  while ($row = mysqli_fetch_array($result)) {
                      echo "<tr>";
                      echo "<td>" . $row['admin_name'] . "</td>";
                      echo "<td>" . $row['admin_phone'] . "</td>";
                      echo "<td>" . $row['admin_email'] . "</td>";
                      echo "<td>" . $row['admin_address'] . "</td>";
                      echo "</tr>";
                  }

                  mysqli_free_result($result);
                  ?>
  
          </table>
          </div>
      </div>
       <!---------------------------------------------------------------->
      <div id="tab3" class="tab">
      <?php
          if($_SESSION["admin_name"]){
              echo "<p style='text-align: center'>Welcome Admin: " . $_SESSION["admin_name"] . "</p>";
          }
          ?>
        <h2 style="text-align: center">Add New Car Form</h2>
        <div id="content">
      
        <form method="POST" action="addcarprocess.php" enctype="multipart/form-data">
            <input type="hidden" name="size" value="1000000">
          <div>
            <br>Name :
            <input type="text" name="car_name" required="required"><br>
            <br>Price :
            <input type="text" name="car_price" required="required" value= "MYR / day"><br>
            <br>Type :
            <select name="car_type">
              <option value="default">Please select a type</option>
              <option value="sedan">Sedan</option>
              <option value="hatchback">Hatchback</option>
              <option value="suv">SUV</option>
              <option value="electric">Electric</option>
            </select><br>
            <br>Mileage :
            <input type="text" name="car_mileage" required="required"><br>
            <br>Max Passenger :
            <input type="text" name="car_passenger" required="required"><br>
            <br>Image : 
            <input type="file" name="image"><br>
            <br>Gear :
            <select name="car_gear">
              <option value="default">Please select a gear</option>
              <option value="Automatic">Automatic</option>
              <option value="Manual">Manual</option>
            </select><br>
          </div>
            <div class="button">
            <button type="submit" name="upload">Add New Car</button>
          </div>
        </form>
        </div>
        
      </div>
      <!---------------------------------------------------------------->
      <div id="tab4" class="tab">
      <?php
          if($_SESSION["admin_name"]){
              echo "<p style='text-align: center'>Welcome Admin: " . $_SESSION["admin_name"] . "</p>";
          }
          ?>
        <h2 style ="text-align: center">Booking details</h2>
        
          <div class="main">
        
          <table class="table-all">
                  <tr style="background-color:  #f1f1f1 ">
                      <th>User Id</th>
                      <th>Booking Number</th>
                      <th>Number Phone</th>
                      <th>Car</th>
                      <th>Location</th>
                      <th>Pickup Date</th>
                      <th>Return Date</th>
                  </tr>
           
                  <?php
                  $result = mysqli_query($conn, "SELECT * FROM userbooking");

                  while ($row = mysqli_fetch_array($result)) {
                      echo "<tr>";
                      echo "<td>" . $row['booking_id'] . "</td>";
                      echo "<td>" . $row['Booking_Num'] . "</td>";
                      echo "<td>" . $row['user_number'] . "</td>";
                      echo "<td>" . $row['car_name'] . "</td>";
                      echo "<td>" . $row['location'] . "</td>";
                      echo "<td>" . $row['Pdate'] . "</td>";
                      echo "<td>" . $row['Rdate'] . "</td>";
                      echo "</tr>";
                  }

                  mysqli_free_result($result);
                  ?>
  
          </table>
          </div>
      

      </div>
      <!---------------------------------------------------------------->
      <div id="tab5" class="tab">
      <?php
          if($_SESSION["admin_name"]){
              echo "<p style='text-align: center'>Welcome Admin: " . $_SESSION["admin_name"] . "</p>";
          }
          ?>
        <h2 style ="text-align: center">Register User</h2>
        <div class="main">
  
          <table class="table-all">
                  <tr style="background-color:  #f1f1f1 ">
                      <th>User Id</th>
                      <th>User Email</th>
                  </tr>
           
                  <?php
                  $result = mysqli_query($conn, "SELECT * FROM userlogin");

                  while ($row = mysqli_fetch_array($result)) {
                      echo "<tr>";
                      echo "<td>" . $row['user_id'] . "</td>";
                      echo "<td>" . $row['user_email'] . "</td>";
                      echo "</tr>";
                  }

                  mysqli_free_result($result);
                  ?>
  
          </table>
          </div>     
      </div>
    </div>
  </div>

  <footer>
  <div class="container">
    <p>&copy; 2023 AutoGO</p>
  </div>
    </footer>


  <script>
        function openTab(evt, tabId) {
      // Get all elements with class "tab" and hide them
      var tabs = document.getElementsByClassName("tab");
      for (var i = 0; i < tabs.length; i++) {
        tabs[i].style.display = "none";
      }

      // Remove the "active" class from all tab links
      var tabLinks = document.getElementsByClassName("tab-link");
      for (var i = 0; i < tabLinks.length; i++) {
        tabLinks[i].classList.remove("active");
      }

      // Show the selected tab and add the "active" class to the corresponding tab link
      document.getElementById(tabId).style.display = "block";
      evt.currentTarget.classList.add("active");
    }

    // Set the first tab as active by default
    document.getElementsByClassName("tab-link")[0].click();

    </script>
</body>
</html>