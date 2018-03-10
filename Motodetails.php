<!DOCTYPE html>

<?php include("database.php");
     
      
    $loggedin_address = "http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Loggedin.php";
    $loggin_address = "http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Login.Php";
    $home_address ="http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Home.php";
    $logout_address ="http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Logout.php";
    $car_address ="http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Car.php"; 
    session_start();
    @$user_check = $_SESSION['login_user'];
    $ses_sql = mysqli_query($conn,"select User_Username from user where User_Username='$user_check' ");
    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    $login_session = $row['User_Username'];
    if(isset($_GET['vehicule_id'])){$Vehicule_Id = $_GET['vehicule_id'];}
    if(isset($_GET['vehicule_url'])){$Vehicule_Url = $_GET['vehicule_url'];}
    if(isset($_GET['Vehicule_name'])){$Vehicule_Name= $_GET['Vehicule_name'];}
    if(isset($_GET['Vehicule_brand'])){$Vehicule_Brand = $_GET['Vehicule_brand'];}
    
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
            }else header("Location: Moto.php?msg5=" . urlencode(base64_encode("No matches found.")));
             
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
            
               if(isset($_SESSION['login_user'])){echo "<li><a href=".$logout_address.">LOGOUT</a></li>";echo "<li><a href=".$car_address.">CARS</a></li>";
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
         <a><button class="buttontotop" onclick="location.href ='#top';"  title="Go to top">Back to Top</button></a>
        
        
       <?php 
       
         if(isset($_GET['searchtext'])){search_keywords_id();} 
        
         
                 
             
                $get_table = "SELECT * FROM motorcycle where Vehicule_Id='$Vehicule_Id' ";
                $store_table = mysqli_query($conn, $get_table); //Creates a table for every pictures containing their data
               
        
                //We go through the data of each line of our table
        
                if ($row = mysqli_fetch_array($store_table)) //as long as we have a line in our table
                    {
                     $vehiculeid = $row['Vehicule_Id'];
                              
                  echo ("<div class='visionofart'>");
                  echo ("<img src=" .$Vehicule_Url." alt=".$Vehicule_Url." width='100%'  
                </div>"); echo("<table><tr>");
                    echo("<th>".$Vehicule_Brand." ".$Vehicule_Name." </th>");
                   echo(" <th></th>
                </tr>

  
  <tr>
    <td>Helmet Included</td>
    <td>");
        if($row['Motorcycle_Helmet']==1){
            $row['Motorcycle_Helmet']= 'Yes';}else
        {
             $row['Motorcycle_Helmet']= 'No';
        }
                    
  
                    echo($row['Motorcycle_Helmet']);echo("</td>
  </tr>
  <tr>
    <td>Gloves Included</td>
    <td>");
        if($row['Motorcycle_Gloves']==1){
            $row['Motorcycle_Gloves']= 'Yes';}else
        {
             $row['Motorcycle_Gloves']= 'No';
        }
                    
  
                    echo($row['Motorcycle_Gloves']);echo("</td>
  </tr>
  <tr>
    <td>Minimum Experience in Years</td>
    <td>");echo($row['Motorcycle_ExperienceMin']."</td>
    
  </tr>
  <tr>
    <td>Licence</td>
    <td>");echo($row['Motorcycle_License']);echo("</td>
  </tr>
  <tr>
    <td>Cylinder</td>
    <td>");echo($row['Motorcycle_Cylinder']);echo("</td>
  </tr>
  </table>");
                                   
            
            
       
            
                    } 
        
              ?>
        <form method="POST" action="MotoReserve.php?vehiculeid=<?php echo $vehiculeid ?>">
            
            
            <a ><button class='buttontoRent'type='submit'  title='Rent Car'>Rent Moto</button></a>
        </form>
        
      
                
            <footer>
    
            
       <span style="color: white";>Made by Rayane HINDI, Eléonore JEANNIOT & Jean-François LE GAL.</span>
        
    </footer> 
        
      
    </body>