<!DOCTYPE html>
<?php include("database.php");
      include("SessionCheck.php");?>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>C.R Luxury</title>
        <link rel="stylesheet" href="home.css">
        <link rel="stylesheet" href="style.css">
                            
    </head>

    
    <body>
        
        <h1 class = "topborder"  id = "topbordertitle">C.R Luxury</h1>
        <input type = "checkbox" id="menuToggle">
        <label for="menuToggle" class="menu-icon">&#9776;</label>
        <header>
            <div id="brand"><?php if (isset($_SESSION['message'])){ echo $_SESSION['message'];}else {echo "Welcome, "; echo  $login_session ;}  ?>
            </div>
        </header>
           
        <nav class ="menu">
        <ul>
            
            <li><a class="active" href="LoggedIn.php">HOME</a></li>
            <li><a href="Logout.php">LOGOUT</a></li>
            <li><a href="Car.php">CAR</a></li>
            <li><a href="Moto.php">MOTORCYCLES</a></li>
            <?php $user_check = $_SESSION['login_user'];
   
    $ses_sql = mysqli_query($conn,"select * from user where User_Username='$user_check' AND User_State =1");
    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    $login_session = $row['User_Username'];
    $login_state = $row['User_State']; 

    if(!empty($row['User_State'])){
            echo "<li><a href="; echo"AddPictures.php"; echo">ADD PICTURES</a></li>";
            echo "<li><a href="; echo"RemovePictures.php"; echo">REMOVEPICTURES</a></li>";
            }
            ?>
            </ul>
        
        </nav>
        
         <footer>
    
            
        <a class="res" target="_blank"  href="https://www.instagram.com/rayanedose/" >
        <img src="instagram.png" alt="instagram" Height="35" Width="35" id="insta"></a>
        <a class="res" target="_blank"  href="https://www.facebook.com/Doseeeeee">
        <img src="logoFb.png" alt="facebook" Height="35" Width="35" id="facebook"></a>
        
    </footer> 
      
    </body>