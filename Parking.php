<!DOCTYPE html>

<?php include("database.php");
     
      
    $loggedin_address = "http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Loggedin.php";
    $loggin_address = "http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Login.Php";
    $home_address ="http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Home.php";
    $logout_address ="http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Logout.php";
    $moto_address ="http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Moto.php"; 
    session_start();

    @$user_check = $_SESSION['login_user'];
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
    echo base64_decode(urldecode($_GET['msg5'])); }else echo "Parkings"; ?>
            </div>
            <div class="pagebg"></div>
        </header>
            
        <nav class ="menu">
        <ul>
            
           <?php  if(isset($_SESSION['login_user'])) {
            echo  "<li><a href=".$loggedin_address.">HOME</a></li>"; } else echo
            "<li><a href=".$home_address.">HOME</a></li>";
            
               if(isset($_SESSION['login_user'])){echo "<li><a href=".$logout_address.">LOGOUT</a></li>";echo "<li><a href=".$moto_address.">MOTORCYCLES</a></li>"; 
             }
            
            else echo "<li><a href=".$loggin_address.">LOGIN</a></li>";  ?>
            <?php @$user_check = $_SESSION['login_user'];
   
    $ses_sql = mysqli_query($conn,"select * from user where User_Username='$user_check' AND User_State =1");
    $rowstate = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    $login_session = $rowstate['User_Username'];
    $login_state = $rowstate['User_State']; 

    if(!empty($row['User_State'])){
            echo "<li><a href="; echo"AddPictures.php"; echo">ADD PICTURES</a></li>";
            echo "<li><a href="; echo"RemovePictures.php"; echo">REMOVEPICTURES</a></li>";
            }
            ?>
            
            
            </ul>
        
        </nav>
        
       <?php 
           $parkingid = 0;

          do {
                $parkingid ++;
                $ses_sql = mysqli_query($conn,"SELECT Flotte_ID, Flotte_Name, Flotte_Size, Flotte_Available FROM flotte WHERE Flotte_ID = '$parkingid' ");

                $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
                $parkingname = $row['Flotte_Name'];
                $parkingsize = $row['Flotte_Size'];
                $parkingplaces = $row['Flotte_Available'];
                echo ("<div class='visionofart'>");
                echo ("<table><th><strong><i>PARKING N°$parkingid</i></strong></th>");
                echo ("<tr><td>Location : $parkingname</td></tr>");
                echo ("<tr><td>Places : $parkingsize</td></tr>");
                echo ("<tr><td>Places Available : $parkingplaces</tr></td></table></div>");
              }while ($parkingid < 3);

              ?>
      
                
            <footer>
    
            
       <span style="color: white";>Made by Rayane HINDI, Eléonore JEANNIOT & Jean-François LE GAL.</span>
        
    </footer> 
        
      
    </body>