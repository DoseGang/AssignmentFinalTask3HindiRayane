<!DOCTYPE html>
<?php include("database.php");
      include("Reset_PicturesID.php");
            
    
    if(isset($_GET['carid'])){$Car_Id = $_GET['carid'];}
    $sql = "SELECT * FROM vehiculespec WHERE Vehicule_Rented =0 AND Car_Id='$Car_Id'";
    $store_result = mysqli_query($conn,$sql);
    
    
     
    
    

        

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
        
        <h1 class = "topborder"  id = "topbordertitle">Rent car</h1>
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
   
    
        
        <form  method="POST" >
        
            <div class="identification">
                <?php if(isset($msg)){
    echo $msg; } else echo "<label><b>Rent Information</b></label>"; 
                
                  

                 
            if($cardisponibilities = mysqli_fetch_array($store_result))
            {
            
                
           } else {header("location:Car.php?carnotavailable=" . urlencode(base64_encode("This vehicule isn't available anymore"))); } ?>
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

