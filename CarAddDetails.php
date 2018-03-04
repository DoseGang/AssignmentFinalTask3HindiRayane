<!DOCTYPE html>
<?php include("database.php");
      include("SessionCheckAdmin.php");
      include("Reset_PicturesID.php");


    if(isset($_POST['type'])){$type = $_POST['type'];}
    
        
/*}*/

?>

<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>C.R Luxury</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="addpicture.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
                            
    </head>

    
    <body onload="">
        
        <h1 class = "topborder"  id = "topbordertitle">Vision Of Art</h1>
        <input type = "checkbox" id="menuToggle">
        <label for="menuToggle" class="menu-icon">&#9776;</label>
        <header>
            <div id="brand">Explore Me
            </div>
            <div class="pagebg"></div>
           
            
            
        </header>
           
        <nav class ="menu">
        <ul>
            
            <li><a href="Loggedin.php">HOME</a></li>
            <li><a href="Logout.Php">LOGOUT</a></li>
            <li><a href="Car.php">CAR</a></li>
            <li><a href="RemovePictures.php">REMOVE PICTURES</a></li>
            
            </ul>
        
        </nav>
        
        <form  method="GET" href="CarAddDetails.php">
        
            <div class="identification">
                <?php if(isset($msg)){
    echo $msg; } else echo "<label><b>URL of the picture to add</b></label>"; ?>
                 
            
            
            
                <input type="text" placeholder="Enter Brand of Vehicule"  maxlength="200" name="Brand" required>
                <label class="container">
                <input type="radio" name="Type" value="0"> It's a  Motorcycle<br>
                <input type="radio" name="Type" value="1" checked> It's a car<br>
                </label>
                
                <input type="text" placeholder="Vehicule Name"  maxlength="100" 
                name="Name" required>
                
                <input type="url" placeholder="Picture of vehicule" name="url" required>
           <button type="submit" name="type" value="submit" >SUBMIT</button>
           
            </div>
        
        
        </form>
        
        
    
           <footer>
    
            
        <a class="res" target="_blank"  href="https://www.instagram.com/rayanedose/" >
        <img src="instagram.png" alt="instagram" Height="35" Width="35" id="insta"></a>
        <a class="res" target="_blank"  href="https://www.facebook.com/Doseeeeee">
        <img src="logoFb.png" alt="facebook" Height="35" Width="35" id="facebook"></a>
        
    </footer> 


      
    </body>

    
    
    




 






</html>


