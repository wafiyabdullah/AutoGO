<?php
session_start();

$message = "";
if (isset($_POST["admin_username"]) && isset($_POST["admin_password"])) {
  include 'conn.php';

  $admin_username = $_POST["admin_username"];
  $admin_password = $_POST["admin_password"];

  $query = "SELECT * FROM admin WHERE admin_username = '$admin_username' AND admin_password = '$admin_password'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);

  if ($row) {
    $_SESSION["admin_id"] = $row['admin_id'];
    $_SESSION["admin_name"] = $row['admin_name'];
    header("Location: homeAdmin.php");
    exit();
  } else {
    $message = "Invalid username or password!";
  }
}

?>

<!DOCTYPE html>

<head>
  <title>Admin Dashboard</title>
  <style>
    .message {
      color: seashell;
    }
    body{
      background-color: darkgray;
    }
    .box{
      width: 500px;
      padding: 40px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%);
      background: black;
      text-align: center; 
      border-radius: 30px;
    }
    .box h2{
      color: white;
      margin-bottom: 40px;
    }
    .box input[type = "text"],.box input[type = "password"]{
      border:0;
      background: none;
      display: block;
      margin: 20px auto;
      text-align: center;
      border: 2px solid #3498db;
      padding: 14px 10px;
      width: 200px;
      outline: none;
      color: white;
      border-radius: 24px;
      transition: 0.25s
    }
    .box input[type = "text"]:focus,.box input[type = "password"]:focus{
      width: 280px;
      border-color: #306754;
    }
    .box input[type = "submit"]{
      border:0;
      background: none;
      display: block;
      margin: 20px auto;
      text-align: center;
      background: darkgray;
      padding: 14px 40px;
      outline: none;
      color: white;
      border-radius: 24px;
      transition: 0.25s;
      cursor: pointer;
    }

  </style>
</head>

<body>
  <form class="box" action="" method="post">
    <h2>Vehicle4U</h2>
    <h2>Admin Login</h2>
    <div class="message"><?php echo $message; ?></div> //access notification
    <input type="text" name="admin_username" placeholder="Username" required>
    <input type="password" name="admin_password" placeholder="Password" required>
    <input type="submit" value="Login">
  </form>
    <a href="index.php">return to user index</a>
</body>

</html>
