<!DOCTYPE html>
<?php include("database.php");
      include("SessionCheck.php");
      include("Reset_PicturesID.php");
    
            
  if($_SERVER ["REQUEST_METHOD"]== "POST"){
    
        $Startingdate = $_POST['Sdate']; 
        $Startingdate2 = strtotime("$Startingdate");
        $Endingdate = $_POST['Edate'];
        $Endingdate2 = strtotime("$Endingdate");
        $timeDiff = abs($Endingdate2 - $Startingdate2);
        $numberofdays = $timeDiff/86400;
        $numberofdays = floatval($numberofdays);
        $returnpoint =$_POST['Reservation_Return'];
        $pickuppoint =$_POST['Reservation_Pickup'];
        if(isset($_POST['assurance'])){$assurance=$_POST['assurance'];}else $assurance=0;
        $User_Id = $_POST['User_Id'];
        $VehiculeSpec_Id = $_POST['VehiculeSpec_Id'];
        
       $sql1 = "SELECT Vehicule_Id from vehiculespec where VehiculeSpec_Id='$VehiculeSpec_Id'";
      $storesql1 = mysqli_query($conn,$sql1);
      $valuesql1 = mysqli_fetch_array($storesql1);
      $value = $valuesql1['Vehicule_Id'];
      
      $sqlcarprice = "SELECT Car_Price from car where Vehicule_Id ='$value'";
      $storeprice = mysqli_query($conn,$sqlcarprice);
      $valueprice = mysqli_fetch_array($storeprice);
      $value2 =   $valueprice['Car_Price'];
      $value2 = floatval($value2);
      $assuranceprice = $numberofdays*10;
      $rentprice = $numberofdays*$value2;
      $reservationprice = $assuranceprice + $numberofdays*$value2 ;
      
      
        $sql2 = "INSERT INTO `reservation` (`Reservation_Id`,`User_ID`, `VehiculeSpec_Id`,`Reservation_DateStart`, `Reservation_DateEnd`, `Reservation_PickingPoint`, `Reservation_ReturnPoint`, `Reservation_CarState`, `Reservation_FuelLevel`, `Reservation_Assurance`, `Reservation_State`,Reservation_Price) VALUES (NULL,'$User_Id','$VehiculeSpec_Id','$Startingdate', '$Endingdate', '$pickuppoint', '$returnpoint', NULL, NULL, $assurance, '1','$reservationprice')";
      
        
     
    


        
            if ( $storesql2 = mysqli_query($conn,$sql2) ) {
                
                 $msg = "Reservation Confirmed.";
                
            
        }
     
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
        <h1 class = "topborder"  id = "topbordertitle">Car Details</h1>
        <input type = "checkbox" id="menuToggle">
        <label for="menuToggle" class="menu-icon">&#9776;</label>
        <header>
            <div id="brand"><?php if(isset($_GET['msg5'])){
    echo base64_decode(urldecode($_GET['msg5'])); }else echo "Reservation Confirmation"; ?>
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
        
          $sql3 = "SELECT * FROM reservation WHERE User_Id='$User_Id' AND VehiculeSpec_Id='$VehiculeSpec_Id' AND Reservation_State='1'";
    $storereservation = mysqli_query($conn,$sql3);
        
        
 
              if( $table= mysqli_fetch_array($storereservation)){
                    
                     $reservationid = $table['Reservation_Id'];
                              
                  
                  echo("<table><tr>");
                    echo("Reservation Id $reservationid");
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
    <td>Reservation Price</td>
    <td>");echo($rentprice);echo("€</td>
    
  </tr>
  <tr>
    <td>Total</td>
    <td>");echo($reservationprice);echo("€</td>
    
  </tr>
  
 
 </table>");
                                   
            
            
              }
            
                    
        
              ?>
        
        
      
                
            
           <footer>
    
            
       <span style="color: white";>L’EXCELLENCE, C’EST AUSSI UN SERVICE.</span>
        
    </footer> 
        
      
    </body>