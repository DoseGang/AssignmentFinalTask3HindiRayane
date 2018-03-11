<!DOCTYPE html>
<?php include("database.php");
      include("SessionCheck.php");
      include("Reset_PicturesID.php");
    $loggedin_address = "http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Loggedin.php";
    $loggin_address = "http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Login.Php";
    $home_address ="http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Home.php";
    $logout_address ="http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Logout.php";
    $moto_address ="http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Moto.php"; 
            

  
       
        
        $ses_sql = mysqli_query($conn,"select User_Id from user where User_Username='$user_check' ");
    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    $User_Id = $row['User_Id'];
        $sql3 = "SELECT * FROM reservation WHERE User_Id='$User_Id' && Reservation_State= 1 ";
        $up = mysqli_query($conn,$sql3);
        $row2 = mysqli_fetch_array($up);
        
         if($_SERVER ["REQUEST_METHOD"]== "POST"){
            $carstate = $_POST['State'];
            $fuelstate = $_POST['Fuel'];
            $endingdate = $_POST['Edate'];
            $query = "UPDATE reservation SET Reservation_FuelLevel='$fuelstate',Reservation_CarState='$carstate', Reservation_DateEnd='$endingdate' , Reservation_State='0' WHERE User_Id = '$user_id' AND Reservation_State=0 ";



if(mysqli_query($conn,$query) == TRUE){
    $user_check = $_SESSION['User_Username'];
    header("location:Car.php?carnotavailable=" . urlencode(base64_encode("Thank you for returning your car.")));
} 
        }
       


?>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>C.R Luxury</title>
        <link rel="stylesheet" href="CarRent.css">
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
                            
    </head>

    
    <body>
       <a name="top"></a>
        <h1 class = "topborder"  id = "topbordertitle">Car Details</h1>
        <input type = "checkbox" id="menuToggle">
        <label for="menuToggle" class="menu-icon">&#9776;</label>
        <header>
            <div id="brand"><?php if(isset($_GET['msg5'])){
    echo base64_decode(urldecode($_GET['msg5'])); }else echo "Reservation Return"; ?>
            </div>
            <div class="pagebg"></div>
            
            
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
       
        
        
       
             <?php if($row2['Reservation_State'] == 1){ ?>
                   <form  method="POST" action="ReservationFacture.php" >
            <label><b>Please fill the returning informations. All the informations are double checked by the agency. If needed, we have all the rights to change any values.   </b></label>
            <div class="return">
                 
                  <label><b>Ending Date</b>
                  <input type="date" id="datefield2" max='1997-13-13'  placeholder="Ending date"  name="Edate" required/> 
                  </label>
                  <label><b>Car State</b></label>
                   <select name="State" required>
                      <option value="0">No accidents</option>
                      <option value="2">Small Collisions</option>
                      <option value="3">Accidented</option>
                  </select>
                  <label><b>Fuel Level</b></label>
                  <select name="Fuel" required>
                      <option value="0">Empty</option>
                      <option value="1">~25%</option>
                      <option value="2">~50%</option>
                      <option value="3">~75%</option>
                  </select>
                    
                  <select name="Parking" required>
                      <option value="0">Empty</option>
                      <option value="1">Jules Joffrin</option>
                      <option value="2">Asnieres</option>
                      <option value="3">BNF</option>
                  </select>
                  
                     
                
                <button type="submit" name="Return my car" value="returnthiscar" >Return my car</button>
                  </div>
                </form>
            <?php }else  header("location:Car.php?carnotavailable=" . urlencode(base64_encode("You have no reservation to return."))); ?>
 
        <script>   
        $(document).ready(function () {  
                var today = new Date();
var today2 = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var aa = today.getMonth()+2;
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
if(aa<10){
        aa='0'+aa
    }
today = yyyy+'-'+mm+'-'+dd;
today2 = yyyy + '-' + aa +'-'+dd;
document.getElementById("datefield").setAttribute("min",today);
document.getElementById("datefield2").setAttribute("max",today2);
document.getElementById("datefield2").setAttribute("min",today);




});</script>   
 
              
 
    
        
        
      
                
            <footer>
    
            
       <span style="color: white";>Made by Rayane HINDI, Eléonore JEANNIOT & Jean-François LE GAL.</span>
        
    </footer> 
        
      
    </body>