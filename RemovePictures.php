<!DOCTYPE html>

    <?php include("database.php");
          include("SessionCheckAdmin.php");
          include("Reset_PicturesID.php");
        $loggedin_address = "http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Loggedin.php";
        $loggin_address = "http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Login.Php";
        $home_address ="http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Home.php";
        $logout_address ="http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Logout.php";
        $moto_address ="http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Moto.php"; 
        $register_address ="http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Register.php"; 
        $car_address ="http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Car.php";
        
function deletecar(){
    
}
          
    
    if($_SERVER ["REQUEST_METHOD"]== "POST"){
            
        $id = $_POST['id'];
        $sql2 = "SELECT * FROM vehicule WHERE Vehicule_Id=$id";
        $result = mysqli_query($conn,$sql2);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count == 0 ){
            $errormsg = " The id you entered is inexistant.";
        }
        else {
            
            $sql = "SELECT Vehicule_Type FROM Vehicule WHERE Vehicule_Id= '$id' ";
            $retval = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($retval);
            $type = $row['Vehicule_Type'];
            
            if ($type == 1){
                $delete_car = "DELETE * FROM car WHERE Vehicule_Id='$id'";
                mysqli_query($conn,$delete_car);
                $delete_vehiculespec = "DELETE * FROM vehiculespec WHERE Vehicule_Id='$id' ";
                mysqli_query($conn,$delete_vehiculespec);
                $delete_vehicule = "DELETE * FROM vehicule WHERE Vehicule_Id='$id'";
                mysqli_query($conn,$delete_vehicule);
            }else {
                $delete_motorcycle="DELETE * FROM motorcycle WHERE Vehicule_Id='$id'";
                mysqli_query($conn,$delete_motorycycle);
                $delete_vehiculespec = "DELETE * FROM vehiculespec WHERE Vehicule_Id='$id' ";
                mysqli_query($conn,$delete_vehiculespec);
                $delete_vehicule = "DELETE * FROM vehicule WHERE Vehicule_Id='$id'";
                mysqli_query($delete_vehicule);
            }
            
            
            
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
            <div id="brand">Remove Vehicule
            </div>
            <div class="removingpagebg"></div>
        </header>
           
        <nav class ="menu">
                <ul>
            
            <li><a class="active" href="LoggedIn.php">HOME</a></li>
            <li><a href="Logout.php">LOGOUT</a></li>
            <li><a href="Car.php">CAR</a></li>
            <li><a href="Moto.php">MOTORCYCLES</a></li>
            <li><a href="informations.php">MY INFORMATION</a></li>
            <li><a href="ReturnVehicule.php">RETURN VEHICULE</a></li>
            <?php $user_check = $_SESSION['login_user'];
   
    $ses_sql = mysqli_query($conn,"select * from user where User_Username='$user_check' ");
    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    $login_session = $row['User_Username'];
    $login_state = $row['User_State']; 

    if($row['User_State']==1){
            echo "<li><a href="; echo"AddPictures.php"; echo">ADD CARS</a></li>";
            echo "<li><a href="; echo"RemovePictures.php"; echo">REMOVE CARS</a></li>";
            }
            if($row['User_State']==2){
            echo "<li><a href="; echo"parking.php"; echo">PARKING</a></li>";
            
            }
            ?>
            </ul>
        
        </nav>
        <form  method="POST" action = "removed.php">
        
            <div class="identification">
           <?php 
                    if(isset($errormsg)) {echo $errormsg;} 
                else if(isset($msg)) {echo $msg;}
                else echo "<label><b>ID of the vehicule to Delete</b></label>";
        
        ?>
                <input type="number" placeholder="Enter ID" name="vehid"  required>
           
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