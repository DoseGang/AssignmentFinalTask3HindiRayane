<!DOCTYPE html>

    <?php include("database.php");
          include("SessionCheckAdmin.php");
          include("Reset_PicturesID.php");
          
    
    if($_SERVER ["REQUEST_METHOD"]== "POST"){
            
             $id = $_POST['id'];
        $sql2 = "SELECT Gallery_PictureID FROM gallery where Gallery_PictureID=$id";
        $result = mysqli_query($conn,$sql2);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count == 0 ){
            $errormsg = " The id you entered is inexistant.";
        }
        else {
            
            $sql = "DELETE  FROM gallery WHERE Gallery_PictureID = $id";
            $retval = mysqli_query($conn,$sql);
            reset_pictures_ID();
            $msg = "Successfully deleted the picture.";
            
        }

}


?>


<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>C.R Luxury</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="removepicture.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
                            
    </head>

    
    <body>
        
        <h1 class = "topborder"  id = "topbordertitle">Remove Car</h1>
        <input type = "checkbox" id="menuToggle">
        <label for="menuToggle" class="menu-icon">&#9776;</label>
        <header>
            <div id="brand">Remove Car
            </div>
            <div class="removingpagebg"></div>
        </header>
           
        <nav class ="menu">
        <ul>
            
            <li><a href="LoggedIN.php">HOME</a></li>
            <li><a href="Logout.php">LOGOUT</a></li>
            <li><a href="Car.php">CAR</a></li>
            <li><a href="AddPictures.php">ADD PICTURES</a></li>
            
            </ul>
        
        </nav>
        <form  method="POST" action = "RemovePictures.php">
        
            <div class="identification">
           <?php 
                    if(isset($errormsg)) {echo $errormsg;} 
                else if(isset($msg)) {echo $msg;}
                else echo "<label><b>ID of the picture to Delete</b></label>";
        
        ?>
                <input type="number" placeholder="Enter ID" name="id"  required>
           
            <button type="submit">Delete</button>
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