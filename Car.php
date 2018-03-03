<!DOCTYPE html>

<?php include("database.php");
      
      
    $loggedin_address = "http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Loggedin.php";
    $loggin_address = "http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Login.Php";
    $home_address ="http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Home.php";
    $logout_address ="http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Logout.php";
    $moto_address ="http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Moto.php"; 
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
            
           
            $get_output = "SELECT * FROM gallery WHERE (Gallery_PictureID LIKE '%".$user_input."%') OR (Gallery_PictureDescription LIKE '%".$user_input."%') ";
            $get_output= htmlspecialchars($get_output);
             
            $store_output = mysqli_query($conn, $get_output);
           $row_count = mysqli_num_rows($store_output);
            if($row_count > 0){
                while ($row_of_searchmatch = mysqli_fetch_array($store_output))
                {
                     echo ("<div class='visionofart'>");
                    echo ("<a target='_blank' href=". $row_of_searchmatch['Gallery_PictureURL'] .">");
                     echo ("<img src=" . $row_of_searchmatch['Gallery_PictureURL']. " alt=". $row_of_searchmatch['Gallery_PictureDescription'] ." width='600' ");
                    echo ("</a> <div class='description'>".$row_of_searchmatch['Gallery_PictureDescription']." #".$row_of_searchmatch['Gallery_PictureID']."</div></div>");        
                  
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
                            
    </head>

    
    <body>
       <a name="top"></a>
        <h1 class = "topborder"  id = "topbordertitle">Cars</h1>
        <input type = "checkbox" id="menuToggle">
        <label for="menuToggle" class="menu-icon">&#9776;</label>
        <header>
            <div id="brand"><?php if(isset($_GET['msg5'])){
    echo base64_decode(urldecode($_GET['msg5'])); }else echo "Explore Me"; ?>
            </div>
            <div class="pagebg"></div>
            <form action="" method="GET" target="_blank" >
                <input type="text"  name="searchtext" placeholder="ID/Word of car to search. Press ENTER when done.">
                
                
            </form>
            
        </header>
            
        <nav class ="menu">
        <ul>
            
           <?php  if(isset($_SESSION['login_user'])){
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
         <button onclick="location.href ='Car.php';" id="button" title="Go to top">Back to Top</button>
        
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
                    echo ("</a> <div class='description'>".$row['Vehicule_Brand']." ".$row['Vehicule_Name']." ".$row['Vehicule_Id']."</div></div>");                  
                    
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