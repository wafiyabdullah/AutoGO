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
              background: url(img/Car\ Website\ -\ 1@2x.png);
              background-repeat: no-repeat;
              background-position: center right;
              background-size: cover;
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
          
          .form-container form .btn{
              flex: 1 1 7rem;
              padding: 10px 34px;
              border: none;
              border-radius: 0.5rem;
              background: #474fa0;
              color: #fff;
              font-size: 1rem;
              font-weight: 500;
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
          </style>
    </head>
    <body>
        <!-- header -->
        <header>

            <ul class="navbar">
                <li><a href="#home"> Home </a></li>
                <li><a href="userlogin.php">Our Car List</a></li>
            </ul>

            <div class="header-btn">
                <a href="userlogin.php" class="sign-in">Sign in</a>
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
                    <a href="userlogin.php" class="button">Lets Rent</a>
                </form>               
            </div>
         </section>

         <!-- footer -->
         <div class="copyright">
            <a href="adminLogin.php"><p>&copy; 2023 AutoGO</p></a>
         </div>

    </body>
</html>