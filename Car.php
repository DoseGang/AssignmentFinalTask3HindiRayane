<!DOCTYPE html>

<?php include("database.php");
      
      
    
    session_start();
    @$user_check = $_SESSION['login_user'];
    $ses_sql = mysqli_query($conn,"select User_Username from user where User_Username='$user_check' ");
    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    $login_session = $row['User_Username'];
    
    
    function search_keywords_id()
    {
        include("database.php");
        $user_input = $_GET['searchtext'];
        $min_length = 1;
        if(strlen($user_input) >= $min_length)
        {
            
           
            $get_output = "SELECT * FROM vehicule WHERE (Vehicule_Brand LIKE '%".$user_input."%') OR (Vehicule_Name LIKE '%".$user_input."%') ";
            $get_output= htmlspecialchars($get_output);
             
            $store_output = mysqli_query($conn, $get_output);
           $row_count = mysqli_num_rows($store_output);
            if($row_count > 0){
                while ($row_of_searchmatch = mysqli_fetch_array($store_output))
                {
                    echo ("<div class='visionofart'>");
                    echo ("<a target='_blank' href=". $row_of_searchmatch['Vehicule_PictureURL'] .">");
                    echo ("<img src=" . $row_of_searchmatch['Vehicule_PictureURL']. " alt=". $row_of_searchmatch['Vehicule_Description'] ." width='600' ");
                    echo ("</a> <div class='description'>".$row_of_searchmatch['Vehicule_Description']." #</div></div>");        
                  
                }
            }else header("Location: Car.php?msg5=" . urlencode(base64_encode("No matches found.")));
             
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
             <?php if(isset($_SESSION['login_user'])){
             echo "<li><a href="; echo"LoggedIn.php"; echo">HOME</a></li>";}else {echo "<li><a href="; echo"Home.php"; echo">HOME</a></li>";}?>
            <li><a href="Logout.php">LOGOUT</a></li>
            <li><a href="Car.php">CARS</a></li>
            <li><a href="Moto.php">MOTORCYCLES</a></li>
            
            <?php if(isset($_SESSION['login_user'])){
    $user_check = $_SESSION['login_user'];
   echo "<li><a href="; echo"Informations.php"; echo">INFORMATIONS</a></li>";
echo "<li><a href="; echo"ReturnVehicule.php"; echo">RETURN VEHICULE</a></li>";
            
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
        }
            ?>
            </ul>
        
        </nav>
                  <div style ="position:absolute;"><a><button class="buttontotop" onclick="location.href ='#top';"  title="Go to top">Back to Top</button></a><br><br><br>
         <a><button class="buttontotop" onclick="location.href ='filtre.php';"  title="Go to top">Filtrer</button></a></div>
        
       <?php 
       
         if(isset($_GET['searchtext'])){search_keywords_id();} 
        
         
                 
            
               
                $get_table = "SELECT * FROM vehicule where Vehicule_Type=1 ORDER BY Vehicule_Id ASC";
                $store_table = mysqli_query($conn, $get_table); //Creates a table for every pictures containing their data
                
                
                
        
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
    
            
        <a class="res" target="_blank"  href="https://www.instagram.com/rayanedose/" >
        <img src="instagram.png" alt="instagram" Height="35" Width="35" id="insta"></a>
        <a class="res" target="_blank"  href="https://www.facebook.com/Doseeeeee">
        <img src="logoFb.png" alt="facebook" Height="35" Width="35" id="facebook"></a>
        
    </footer> 
        
      
    </body>

    
    
    




 







</html>