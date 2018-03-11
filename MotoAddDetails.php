<!DOCTYPE html>
<?php include("database.php");
      include("SessionCheckAdmin.php");
      include("Reset_PicturesID.php");

 function isImage($url)
  {
     $params = array('http' => array(
                  'method' => 'HEAD'
               ));
     $ctx = stream_context_create($params);
     $fp = @fopen($url, 'rb', false, $ctx);
     if (!$fp) 
        return false;  

    $meta = stream_get_meta_data($fp);
    if ($meta === false)
    {
        fclose($fp);
        return false;  
    }

    $wrapper_data = $meta["wrapper_data"];
    if(is_array($wrapper_data)){
      foreach(array_keys($wrapper_data) as $hh){
          if (substr($wrapper_data[$hh], 0, 19) == "Content-Type: image") 
          {
            fclose($fp);
            return true;
          }
      }
    }

    fclose($fp);
    return false;
  }
 if($_SERVER ["REQUEST_METHOD"]== "POST"){
        $url  = $_POST['url'];
        $brand = $_POST['Brand'];
        $type = $_POST['Type'];
        $name = $_POST['Name'];
        $desc = $_POST['desc'];
        
      
                
        if(isImage($url)== TRUE){
            reset_pictures_ID();
            $sql = "INSERT INTO vehicule (Vehicule_Id, Vehicule_Brand, Vehicule_Type, Vehicule_Name, Vehicule_PictureURL,Vehicule_Description) VALUES (NULL, '$brand', '$type', '$name','$url','$desc')";
           
           
        
        if ($conn->query($sql) == TRUE) {
            
                 
                 $msg = "Please Enter Details of Vehicule";
            
        } 
      }
 }
    
                 $get_vehicule_id = "SELECT Vehicule_Id FROM vehicule WHERE Vehicule_PictureURL = '$url' ";
                 $resultid = mysqli_query($conn,$get_vehicule_id);
                 $row =mysqli_fetch_array($resultid);
                 $vehicule_id2 = $row['Vehicule_Id'];
        
        
        
        



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
            <li><a href="RemovePictures.php">REMOVE PICTURES</a></li>
            
            </ul>
        
        </nav>
        
        <form  method="POST" action= "AddPictures.php?vehicule_id2=<?php echo $vehicule_id2 ?>" >
        
            <div class="identification">
                <?php if(isset($msg)){
    echo $msg; } else echo "<label><b>Add Moto Details</b></label>"; 
                
                  
?>
                 
            
            
            
                <input type="text" placeholder="Helmet included 0/1"  maxlength="200" name="Helmet" required>
                <input type="text" placeholder="Gloves Included 0/1"  maxlength="100" 
                name="Gloves" required>
                <input type="text" placeholder="Minimum Experience" name="experience" required>
                <input type="text" placeholder="Luggage Size" name="LuggageSize" required>
                <input type="text" placeholder="License Needed" name="LicenseNeeded" required>
                <input type="text" placeholder="Vehicule Plate" name="plate" required>
                <input type="text" placeholder="Kilometers" name="kilometers" required>
                <input type="number" step="0.01" placeholder="Price per day" name="Price" required>
                
           <button type="submit" name="type" value="submit" >SUBMIT</button>
           
            </div>
        
        
        </form>
        
        
    
          
           <footer>
    
            
       <span style="color: white";>L’EXCELLENCE, C’EST AUSSI UN SERVICE.</span>
        
    </footer> 

      
    </body>

    
    
    




 






</html>
