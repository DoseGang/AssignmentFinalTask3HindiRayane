<!DOCTYPE html>
<?php include("database.php");
      include("SessionCheck.php");
      include("Reset_PicturesID.php");
   
if($_SERVER ["REQUEST_METHOD"]== "POST"){
        $getuser_Id = "SELECT User_Id from user WHERE User_Username ='$login_session'";
        $storeuser_id = mysqli_query($conn,$getuser_Id);
        $storeuser_id2 = mysqli_fetch_array($storeuser_id);
        $user_id = $storeuser_id2['User_Id'];
        $carstate = $_POST['State'];
        $fuelstate = $_POST['Fuel'];
        $endingdate = $_POST['Edate'];
        
            



     
}




?>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>C.R Luxury</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="pictures.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
                            
    </head>

    
    <body>
       <a name="top"></a>
        <h1 class = "topborder"  id = "topbordertitle">Recipe</h1>
        <input type = "checkbox" id="menuToggle">
        <label for="menuToggle" class="menu-icon">&#9776;</label>
        <header>
            <div id="brand"><?php if(isset($_GET['msg5'])){
    echo base64_decode(urldecode($_GET['msg5'])); }else echo "Returning your car ? Here is the final bill"; ?>
            </div>
            <div class="pagebg"></div>
            <form action="" method="GET" target="_blank" >
                <input type="text"  name="searchtext" placeholder="ID/Word of car to search. Press ENTER when done.">
                
                
            </form>
            
        </header>
            
         <nav class ="menu">
                <ul>
            
            <li><a class="active" href="LoggedIn.php">HOME</a></li>
            <li><a href="Logout.php">LOGOUT</a></li>
            <li><a href="Car.php">CARS</a></li>
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
       
        
        
       <?php 
       
         if(isset($_GET['searchtext'])){search_keywords_id();} 
        
        
    $sql3 = "SELECT * FROM reservation WHERE User_Id='$user_id' AND Reservation_State='1'";
    $storereservation = mysqli_query($conn,$sql3);
        
        
 
              if($table= mysqli_fetch_array($storereservation)){
      $Startingdate = $table['Reservation_DateStart']; 
      $Startingdate2 = strtotime("$Startingdate");
      $Endingdate = $table['Reservation_DateEnd'];
      $Endingdate2 = strtotime("$Endingdate");
      $timeDiff = abs($Endingdate2 - $Startingdate2);
      $numberofdays = $timeDiff/86400;
      $numberofdays = floatval($numberofdays);
      $assuranceprice =   $table['Reservation_Price'];
      $assuranceprice = floatval($assuranceprice);
      $fuellevel =   $table['Reservation_FuelLevel'];
      $fuellevel = floatval($fuellevel); 
      $reservationprice =   $table['Reservation_Price'];
      $reservationprice = floatval($assuranceprice);
      if($table['Reservation_Assurance']==0){$assurance = $numberofdays*$carstate;}else $assuranceprice = $numberofdays*10;
      
      $fuellevel = 15*$table['Reservation_FuelLevel'];
      $rentprice = $reservationprice;
    
                  
                  
      $total = $assuranceprice + $reservationprice +$fuellevel ;
       $query = "UPDATE reservation SET Reservation_FuelLevel='$fuelstate',Reservation_CarState='$carstate', Reservation_DateEnd='$endingdate' , Reservation_State='0', Reservation_Price='$total' WHERE User_Id = '$user_id' ";
                  
                if($conn->query($query) == TRUE)  {         
                  $reservationid = $table['Reservation_Id'];
                  echo("<table><tr>");
                    echo("Thank you for returning your car.");
                   echo(" 
                </tr>

  <tr>
    <td>From the</td>
    <td>");echo($table['Reservation_DateStart']);echo("</td>
  </tr>
  <tr>
    <td>To the</td>
    <td>");echo($table['Reservation_DateEnd']);echo("</td>
  </tr>
  <tr>
    <td>Picking Point</td>
    <td>");
       echo($table['Reservation_PickingPoint']);echo("</td>
  </tr>
  <tr>
    <td>Return Point</td>
    <td>");echo($table['Reservation_ReturnPoint']);echo("</td>
    
  </tr>
  <tr>
    <td>Assurance Price</td>
    <td>");echo($assuranceprice);echo("€</td>
    
  </tr>
  <tr>
    <td>Reservation Price With Fuel and Car state included</td>
    <td>");echo($rentprice);echo("€</td>
    
  </tr>
  <tr>
    <td>Total</td>
    <td>");echo($total);echo("€</td>
    
  </tr>
  
 
 </table>");
                                   
            }   
            
              }else header("location:Car.php?carnotavailable=" . urlencode(base64_encode("You have no reservation to return.")));
            
                    
        
              ?>
        
        
      
                
            
           <footer>
    
            
       <span style="color: white";>L’EXCELLENCE, C’EST AUSSI UN SERVICE.</span>
        
    </footer> 
        
      
    </body>