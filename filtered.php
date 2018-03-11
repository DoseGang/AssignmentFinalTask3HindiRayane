<!DOCTYPE html>

<?php include("database.php");
      
      
    $loggedin_address = "http://localhost/AssignmentFinalTask3HindiRayane/Loggedin.php";
    $loggin_address = "http://localhost/AssignmentFinalTask3HindiRayane/Login.Php";
    $home_address ="http://localhost/AssignmentFinalTask3HindiRayane/Home.php";
    $logout_address ="http://localhost/AssignmentFinalTask3HindiRayane//Logout.php";
    $moto_address ="http://localhost/AssignmentFinalTask3HindiRayane/Moto.php"; 
    $register_address ="http://localhost/AssignmentFinalTask3HindiRayane/Register.php"; 
    $car_address ="http://localhost/AssignmentFinalTask3HindiRayane/Car.php";
    session_start();
    @$user_check = $_SESSION['login_user'];
    $ses_sql = mysqli_query($conn,"select User_Username from user where User_Username='$user_check' ");
    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    $login_session = $row['User_Username'];

     $brand = $_POST['brand'];
     $capacity = $_POST['places'];
     $gearboxtype = $_POST['gearbox'];
     $luggagesize = $_POST['trunk'];
     $price = $_POST['price'];
    
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
        <h1 class = "topborder"  id = "topbordertitle">Cars</h1>
        <input type = "checkbox" id="menuToggle">
        <label for="menuToggle" class="menu-icon">&#9776;</label>
        <header>
            <div id="brand"><?php if(isset($_GET['msg5'])){
    echo base64_decode(urldecode($_GET['msg5'])); } if (isset($_GET['carnotavailable'])){echo base64_decode(urldecode($_GET['carnotavailable']));} else echo "Explore Me"; ?>
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
         <div style ="position:absolute;"><a><button class="buttontotop" onclick="location.href ='#top';"  title="Go to top">Back to Top</button></a><br><br><br>
         <a><button class="buttontotop" onclick="location.href ='filtre.php';"  title="Go to top">Filtrer</button></a></div>
        
       <?php        
               
                $get_table = "SELECT * FROM vehicule JOIN car ON vehicule.Vehicule_Id = car.Vehicule_Id WHERE Vehicule_Brand = '".$brand."' AND Car_Capacity = '".$capacity."' AND Car_LuggageSize = '".$luggagesize."' AND Car_Gearbox = '".$gearboxtype."' AND Car_Price BETWEEN '".$price."' AND '".$price."'+500";
                $store_table = mysqli_query($conn, $get_table); 

                //Creates a table for every pictures containing their data
                
                
                
        
                //We go through the data of each line of our table
        
                while ($row = mysqli_fetch_array($store_table)) //as long as we have a line in our table
                     {
                          
                  

                    
                             // <a href="page2.php?varname=<?php echo $var_value
                    echo ("<div class='visionofart'>");
                    $Vehicule_Id = $row['Vehicule_Id'];
                    $Vehicule_Url=$row['Vehicule_PictureURL'];
                    $Vehicule_Brand=$row['Vehicule_Brand'];
                    $Vehicule_Name=$row['Vehicule_Name'];
                    echo ("<a target='_blank' href='Cardetails.php?vehicule_id=$Vehicule_Id&vehicule_url=$Vehicule_Url&Vehicule_name=$Vehicule_Name&Vehicule_brand=$Vehicule_Brand'>");
                    
                    echo ("<img src=" . $row['Vehicule_PictureURL']. " alt=". $row['Vehicule_Name'] ." width='100%' ");
                    echo ("</a> <div class='description'>".$row['Vehicule_Brand']." ".$row['Vehicule_Name']."
                    <br />".$row['Vehicule_Description']."</div></div>");                  
                    
                    } 
            
             
          
              
                
              ?>
   
        
      
                
           
           <footer>
    
            
       <span style="color: white";>L’EXCELLENCE, C’EST AUSSI UN SERVICE.</span>
        
    </footer> 
        
      
    </body>

</html>