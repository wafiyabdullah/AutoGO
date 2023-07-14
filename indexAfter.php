<?php
session_start();
include 'conn.php';

// Check if the admin is logged in
if (!isset($_SESSION["user_id"])) {
    // Redirect to the login page or display an error message
    header("Location: userlogin.php");
    exit;
}

$sql = "SELECT * FROM mobil";
$mobile = $conn->query($sql);

?>
<!DOCTYPE html>

    <head>
    <title>AutoGO</title>
        <style>
          @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

          *{
              margin: 0;
              padding: 0;
              box-sizing: border-box;
              scroll-padding-top: 2rem;
              scroll-behavior: smooth;
              list-style: none;
              text-decoration: none;
              font-family: 'Poppins', sans-serif;
          }
          :root{
              --main-color: #fe5b3d;
              --second-color: #ffac38;
              --text-color: #444;
              --gradient: linear-gradient(#fe5b3d,#ffac38);
          }
          html::-webkit-scrollbar {
              width:0.5rem;
          }
          html::-webkit-scrollbar-track {
              background: transparent;
          }
          html::-webkit-scrollbar-thumb {
              background: var(--main-color);
              border-radius: 5rem;
          }
          section{
              padding: 50px 100px;
          }
          header{
              position: fixed;
              width: 100%;
              top: 0;
              right: 0;
              z-index: 1000;
              display: flex;
              align-items: center;
              justify-content: space-between;
              background: #eeeff1;
              padding: 15px 100px;
          }
          
          .navbar {
              display: flex;
          }
          .navbar li{
              position: relative;
          }
          .navbar a {
              font-size: 1rem;
              padding: 10px 20px;
              color: var(--text-color);
              font-weight: 500;
          }
          .navbar a::after {
              content:"";
              width: 0;
              height: 3px;
              background: var(--gradient);
              position: absolute;
              bottom: -4px;
              left: 0;
              transition: 0.5s;
          }
          .navbar a:hover::after{
              width: 100%;
          }
          
          .header-btn a{
              padding: 10px 20px;
              color: var(--text-color);
              font-weight: 500;
          }
          .header-btn .sign-in{
              background: #474fa0;
              color: #fff;
              border-radius: 0.5rem;
          }
          .header-btn .sign-in:hover{
              background: var(--main-color);
          }
          .home{
              width: 100%;
              min-height: 100vh;
              position: relative;
              background-repeat: no-repeat;
              background-position: center right;
              display: grid;
              align-items: center;
              grid-template-columns: repeat(2,1fr);
              z-index: 1;
              background: linear-gradient(-45deg, red, rgba(255, 255, 255, 0.5), blue, yellow);              
              background-size: 400% 400%;
              animation: animate 10s ease infinite;
          }
          @keyframes animate{
            0%{
                background-position: 0 50%;
            }
            5%{
                background-position: 100% 50%;
            }
            100%{
                background-position: 0 50%;
            }
          }
          .text h1 {
              font-size: 3.5rem;
              letter-spacing: 2px;
          }
          .text span {
              color: var(--main-color);
          }
          .text p{
              margin: 00.5rem 0 1rem;
          }
         
          .form-container form{
              display: flex;
              flex-wrap: wrap;
              align-items: center;
              gap: 1rem;
              position: absolute;
              bottom: 9rem;
              left: 100px;
              background: #fff;
              border-radius: 0.5rem;
          }
          
          .button {
              display: inline-block;
              padding: 10px 20px;
              background-color: #474fa0;
              color: white;
              text-decoration: none;
              border-radius: 4px;
              font-weight: bold;
            }

            .button:hover {
              background-color: #fe5b3d;
            }

          .form-container form .btn:hover {
              background: var(--main-color);
          }
          
          .copyright {
              text-align: center;
              background: #eeeff1;
          }
          .main-card{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 30px auto;
            max-width: 1300px;
            width: 95%;
            margin: auto;
          }
          .card{
            max-width: 300px;
            flex: 1 1 2100px;
            text-align: center;
            height: 402px;
            border: 1px solid lightgray;
            margin: 20px;
            border-radius: 2px;
          }
          .card .image{
            height: 50%;
            margin-bottom: 30px;
          }
          .card .image img{
            width: 100%;
            height: 100%;
            object-fit: cover;
          }
          .card .caption{
            padding-left: 1em;
            text-align: left;
            line-height: 2em;
            height: 25%;
          }
          .card .caption p{
            font-size: 1rem;
          }
          
          .card a:hover {
              background-color: #fe5b3d;
            }
          .add span{
            color: white;
          }

          </style>
    </head>
    <body>
        <!-- header -->
        <header>           
            <ul class="navbar">
                <li><a href="#home"> Home </a></li>
                <li><a href="#service"> Our Car List </a></li>
            </ul>
            <?php if($_SESSION["user_email"]){ echo "<p style='text-align: center'>Welcome user: " . $_SESSION["user_email"] . "</p>";}?>  
                    
            <div class="header-btn">
                <a href="logoutuser.php" class="sign-in">Sign out</a>
            </div>
        </header> 

         <!-- home -->
         <section class="home" id="home">
            <div class="text">
                <h1><span>Looking</span> to <br>rent a car</h1>
                <p>Choose AutoGO as your trusted vehicle rental company,and discover<br> a world of convenience and freedom on the road. Experience<br> top-notch service, a diverse fleet, and hassle-free rentals.<br>Whether you're traveling for leisure or business, AutoGO is<br> here to make your journey unforgettable.</p>
            </div>

            <div class="form-container">
                <form action="">
                    <a href="#service" class="button">Lets Rent</a>
                </form>               
            </div>
         </section>

         <!-- service -->
         <div class="main-card" id="service">
            <?php 
              while($row = mysqli_fetch_assoc($mobile)){
            ?>
          <div class="card">
            <div class="image">
                <img src="image/<?php echo $row["car_image"]; ?>" alt="">
            </div>
             <div class="caption">
                    <p class="product_name"><?php echo $row["car_name"] ?></p>
                    <p class="price"><?php echo $row["car_gear"] ?></p>
                    <p class="discount"><b><?php echo $row["car_price"] ?></b></p>
             </div>   
             <a class="button" href="formUser.php?car_id=<?php echo $row['car_id']; ?>"><span>Rent</span></a>
              </div>
        <?php 
              }
        ?>
            </div>
            <div class="afterbook">
                    <?php $message ?>
            </div>

         <!-- footer -->
         <div class="copyright">
            <p>&copy; 2023 AutoGO</p>
         </div>

    </body>
</html>