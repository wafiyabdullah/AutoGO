<?php
session_start();

$message = "";
if (isset($_POST["email"]) && isset($_POST["password"])) {
  include 'conn.php';

  $useremail = $_POST["email"];
  $userpassword = $_POST["password"];

  $query = "SELECT * FROM userlogin WHERE user_email = '$useremail' AND user_password = '$userpassword'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);

  if ($row) {
    $_SESSION["user_id"] = $row['user_id'];
    $_SESSION["user_email"] = $row['user_email'];
    header("Location: indexAfter.php");
    exit();
  } else {
    $message = "Invalid username or password!";
  }
}

?>
<!DOCTYPE html>
<head>
<title>AutoGO</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<style>
    *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
    }
    body{
      min-height: 100vh;
      width: 100%;
      background: #474fa0;
    }
    .container{
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%);
      max-width: 430px;
      width: 100%;
      background: #fff;
      border-radius: 7px;
      box-shadow: 0 5px 10px rgba(0,0,0,0.3);
    }

    .container .form{
      padding: 2rem;
    }
    .form header{
      font-size: 2rem;
      font-weight: 500;
      text-align: center;
      margin-bottom: 1.5rem;
    }
    .form input{
      height: 60px;
      width: 100%;
      padding: 0 15px;
      font-size: 17px;
      margin-bottom: 1.3rem;
      border: 1px solid #ddd;
      border-radius: 6px;
      outline: none;
    }
    .form input:focus{
      box-shadow: 0 1px 0 rgba(0,0,0,0.2);
    }
    .form a{
      font-size: 16px;
      color: #009579;
      text-decoration: none;
    }
    .form a:hover{
      text-decoration: underline;
    }
    .form input.button{
      color: #fff;
      background:  #ffac38;
      font-size: 1.2rem;
      font-weight: 500;
      letter-spacing: 1px;
      margin-top: 1.7rem;
      transition: 0.4s;
    }
    .form input.button:hover{
      background:#fe5b3d;
    }
    .signup{
      font-size: 17px;
      text-align: center;
    }
    
</style>
<body>
  <div class="container">
    
      <div class="login form">
      <header>Login</header>
      
      <form method="post" action="">
        <input type="text" name="email" placeholder="Enter your email" required>
        <input type="password" name="password" placeholder="Enter your password" required>
        <div class="message" style="text-align: center"><?php echo $message; ?></div> <! access notification ->
        <input type="submit" class="button" value="Login">
      </form>

      <div class="signup">
        <span class="signup">Don't have an account?
          <a href="userregister.php">Signup</a>
        </span>
      </div>
    </div>

    

  </div>
</body>
</html>