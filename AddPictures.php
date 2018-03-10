<!DOCTYPE html>
<?php include("database.php");
      include("SessionCheckAdmin.php");
      include("Reset_PicturesID.php");


if($_SERVER ["REQUEST_METHOD"]== "POST" ){
    
        
         if(isset($_GET['vehicule_id2'])){
            $vehicule_id2 = $_GET['vehicule_id2'];}
        if(isset($_GET['type'])){
    $type = $_GET['type'];
    if($type ==1){
        
        $capacity = $_POST['Capacity'];   
        $gearboxtype = $_POST['Gearbox'];
        $airconditioning =$_POST['AirConditioning'];
        $luggagesize =$_POST['LuggageSize'];
        $licenseneeded= $_POST['LicenseNeeded'];
        $fueltype=$_POST['FuelType'];
        $price = $_POST['Price'];
        $plate = $_POST['plate'];
        $kilometers = $_POST['kilometers'];
        $sql2 = "INSERT INTO `car` (`Car_Id`, `Vehicule_Id`, `Car_Capacity`, `Car_Gearbox`, `Car_AirConditioning`, `Car_LuggageSize`, `Car_LicenseType`, `Car_FuelType`,Car_Price) VALUES (NULL,'$vehicule_id2', '$capacity', '$gearboxtype','$airconditioning','$luggagesize','$licenseneeded','$fueltype','$price')";
    
       
    
        $sql3 = "INSERT INTO vehiculespec (VehiculeSpec_Plate,VehiculeSpec_Kilometers,Vehicule_Rented,Vehicule_Id)VALUES('$plate','$kilometers',0,'$vehicule_id2')";
        


        
            if ($conn->query($sql2) == TRUE && $conn->query($sql3) == TRUE) {
            
                    $msg = "Vehicule Added.";
                }
            }  else if($type ==0){
            $helmet = $_POST['Helmet'];
            $Gloves = $_POST['Gloves'];
            $Cylinder = $_POST['Cylinder'];
            $License = $_POST['LicenseNeeded'];
            $Plate = $_POST['plate'];
            $Kilometers = $_POST['kilometers'];
            $Price = $_POST['Price'];
            $experience =$_POST['experience'];
        $sql5 = "INSERT INTO motorcycle (Motorcycle_Id, Motorcycle_Cylinder, Motorcycle_Helmet, Motorcycle_Gloves, Motorcycle_License, Motorcycle_ExperienceMin,Motorcycle_Price,Vehicule_Id) VALUES (NULL, '$Cylinder', '$helmet',  '$Gloves', '$License', '$experience','$Price','$vehicule_id2')";
       
    
        $get_car_id = "SELECT Motorcycle_Id FROM motorcycle WHERE Vehicule_Id = '$vehicule_id2' ";
        $resultcarid = mysqli_query($conn,$get_car_id);
        $row =mysqli_fetch_array($resultcarid);
        $car_id = $row['Motorcycle_Id'];
    
       $sql6 = "INSERT INTO vehiculespec (VehiculeSpec_Plate,VehiculeSpec_Kilometers,Vehicule_Rented,Vehicule_Id)VALUES('$Plate','$Kilometers',0,'$vehicule_id2')";


        
            if ($conn->query($sql5) == TRUE && $conn->query($sql6) == TRUE ) {
            
                    $msg = "Vehicule Added.";
                }
    }
    }
}

 
    

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
            <li><a href="Car.php">CARS</a></li>
            <li><a href="Moto.php">MOTORCYCLES</a></li>
            <li><a href="RemovePictures.php">REMOVE CARS</a></li>
            
            
            </ul>
        
        </nav>
        
        <form  method="POST" action = "CarAddDetails.php">
        
            <div class="identification">
                <?php if(isset($msg)){
    echo $msg; } else echo "<label><b>Information of the Vehicule to add</b></label>"; ?>
                 
            
            
            
                <input type="text" placeholder="Enter Brand of Vehicule"  maxlength="200" name="Brand" required>
                <label class="container">
                <input type="radio" name="Type" value="0"> It's a  Motorcycle<br>
                <input type="radio" name="Type" value="1" checked> It's a car<br>
                </label>
                
                <input type="text" placeholder="Vehicule Name"  maxlength="100" 
                name="Name" required>
                 <input type="text" placeholder="Vehicule Description" name="desc" required>
                
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




 






