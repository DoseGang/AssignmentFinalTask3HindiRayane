<!DOCTYPE html>
<?php include("database.php");
      include("SessionCheck.php");
      include("Reset_PicturesID.php");
            
    
    if(isset($_GET['carid'])){$Car_Id = $_GET['carid'];}
    $sql = "SELECT * FROM vehiculespec WHERE Vehicule_Rented =0 AND Car_Id='$Car_Id'";
    $store_result = mysqli_query($conn,$sql);

    
    
    $ses_sql = mysqli_query($conn,"select User_Id from user where User_Username='$user_check' ");
    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    $User_Id = $row['User_Id'];

    $ses_sql2 = mysqli_query($conn,"select VehiculeSpec_Id from vehiculespec where Car_Id='$Car_Id' ");
    $row2 = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    $Car_Id = $row2['Car_Id'];

    
    
    
    
    




?>

<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>C.R Luxury</title>
        <link rel="stylesheet" href="CarRent.css">
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
    <?php      
            if($cardisponibilities = mysqli_fetch_array($store_result))
            {
            
                
           } else {header("location:Car.php?carnotavailable=" . urlencode(base64_encode("This vehicule isn't available anymore"))); } ?>
    
        
        <form  method="POST" >
        
            <div class="identification">
                
                
                  <label><b>Departure Date</b></label>
                  <input type="date" placeholder="Starting date"  data-date-inline-picker="true" name="Sname" /> 
                  <label><b>Ending Date</b></label>
                  <input type="date" placeholder="Starting date"  data-date-inline-picker="true" name="Ename" /> 
                  <label><b>Pickup Point</b></label>
                                <?php 
                $parking = mysqli_query($conn,"SELECT * from flotte WHERE Flotte_Size < 50 ");
                if(mysqli_num_rows($parking)){
                echo "<select name='Flotte_NamePickup' required>";
                
                while($parkingtable = mysqli_fetch_array($parking)){
                    
                       echo"<option value='".$parkingtable['Flotte_Name']."'>".$parkingtable['Flotte_Name']."</option>";
                    } echo "</select>"; 
                }?>
                <label><b>Return Point</b></label>
                <?php $parking = mysqli_query($conn,"SELECT * from flotte WHERE Flotte_Size < 50 ");
                if(mysqli_num_rows($parking)){
                    echo "</select>"; 
                echo "<select name='Flotte_NameReturn' required>";
               
                while($parkingtable = mysqli_fetch_array($parking)){
                    
                       echo"<option value='".$parkingtable['Flotte_Name']."'>".$parkingtable['Flotte_Name']."</option>";
                    } 
                    echo "</select>"; 
} 
               
        ?>        
                
                  <label><b>Tick this box for the car insurance. Are taken in consideration accidents,theft,degradations. ( 10€/day, see more at the agency)</b></label> 
                
                 <input type="checkbox" value="1" id="squaredThree" name="check" checked />
                 <button type="submit" name="rentthiscar" value="rentthiscar" >Rent this car !</button>
                    
                      
                    
        

          
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

