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
        
        
        
        if(isImage($url)== TRUE){
        reset_pictures_ID();
        $sql = "INSERT INTO Vehicule (Vehicule_Id, Vehicule_Brand, Vehicule_Type, Vehicule_Name, Vehicule_PictureURL) VALUES (NULL, '$brand', '$type', '$name','$url')";
        
        if ($conn->query($sql) === TRUE) {
            
                 $msg = "You have added a vehicule.";
            
        } 
        }else $msg = "You aren't adding a picture.";
        
}

?>

<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>C.R Luxury</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="addpicture.css">
                            
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
        
        <form  method="POST" action = "<?php $_PHP_SELF ?>">
        
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
           
            <button type="submit">Submit</button>
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