<!DOCTYPE html>
<?php include("database.php");  
           
?>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>C.R Luxury</title>
        
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="home.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
                            
    </head>

    
    <body>
        
        <h1 class = "topborder"  id = "topbordertitle">Home</h1>
        <input type = "checkbox" id="menuToggle">
        <label for="menuToggle" class="menu-icon">&#9776;</label>
        <header>
            <div id="brand">
                <?php if(isset($_GET['msg'])){
    echo base64_decode(urldecode($_GET['msg'])); } else echo "Explore Me"; ?>
                
            </div>
        </header>
           
        <nav class ="menu">
        <ul>
            
            <li><a class="active" href="Home.php">HOME</a></li>
            <li><a href="Login.php">LOGIN</a></li>
            <li><a href="Register.php">REGISTER</a></li>
            <li><a href="Car.php">CARS</a></li>
            <li><a href="Moto.php">MOTORCYCLES</a></li>
            
            
            </ul>
        
        </nav>
        
         <footer>
    
<span style="color: white";>Made by Rayane HINDI, Eléonore JEANNIOT & Jean-François LE GAL.</span>
        
    </footer> 
      
    </body>

    
    
    




 







</html>