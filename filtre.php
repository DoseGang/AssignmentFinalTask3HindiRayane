<!DOCTYPE html>
<?php include("database.php");
      include("SessionCheckAdmin.php");
      include("Reset_PicturesID.php");

        /*$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
        $capacity = $row['Car_Capacity'];  
        $gearboxtype = $row['Car_Gearbox'];
        $luggagesize = $row['Car_LuggageSize'];
        $price = $row['Car_Price'];*/
?>

<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>C.R Luxury</title>
        <link rel="stylesheet" href="addpicture.css">
        <link rel="stylesheet" href="style.css">
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
            <li><a href="Moto.php">MOTORCYCLES</a></li>
            <li><a href="RemovePictures.php">REMOVE CARS</a></li>
            
            
            </ul>
        
        </nav>
        
        <form  method="POST" action = "filtered.php">
        Brand :<br>
  <input type="radio" name="brand" value="ALL" checked="checked"> All<br>
  <input type="radio" name="brand" value="Audi"> Audi<br>
  <input type="radio" name="brand" value="Bentley"> Bentley<br>
  <input type="radio" name="brand" value="Rolls Royce"> Rolls Royce<br>
  <input type="radio" name="brand" value="Maybach"> Maybach<br>
  <br>
  
  Places :<br>
  <input type="radio" name="places" value="ALL" checked="checked"> All<br>
  <input type="radio" name="places" value="2"> 2<br>
  <input type="radio" name="places" value="4"> 4<br>
  <input type="radio" name="places" value="7"> 7<br>
  <input type="radio" name="places" value="8"> 8<br>
  <br>
  
  Price :<br>
  <input type="radio" name="price" value="ALL" checked="checked"> All<br>
  <input type="radio" name="price" value="0"> 0 - 500<br>
  <input type="radio" name="price" value="500"> 500 - 1000<br>
  <input type="radio" name="price" value="1000"> 1000 - 1500<br>
  <input type="radio" name="price" value="1500"> 1500 +<br>
  <br>
  
  Trunk size :<br>
  <input type="radio" name="trunk" value="ALL" checked="checked"> All<br>
  <input type="radio" name="trunk" value="small"> Small<br>
  <input type="radio" name="trunk" value="medium"> Medium<br>
  <input type="radio" name="trunk" value="large"> Large<br><br>
  
  Gearbox :<br>
  <input type="radio" name="gearbox" value="ALL" checked="checked"> All<br>
  <input type="radio" name="gearbox" value="automatic"> Automatic<br>
  <input type="radio" name="gearbox" value="manual"> Manual<br>
  <br>
  <input type="submit" value="Submit">
  <br><br><br><br><br><br>
</form>
        
        
    
           <footer>
    
            
       <span style="color: white";>L’EXCELLENCE, C’EST AUSSI UN SERVICE.</span>
        
    </footer> 


      
    </body>
</html>




 






