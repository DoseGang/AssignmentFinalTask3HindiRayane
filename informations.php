<!DOCTYPE html>
<?php include("database.php");
      include("Reset_UserID.php");
      include("Reset_Information_Id.php");    
      
    $loggedin_address = "http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Loggedin.php";
    $loggin_address = "http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Login.Php";
    $home_address ="http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Home.php";
    $logout_address ="http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Logout.php";
    $moto_address ="http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Moto.php"; 
    $register_address ="http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Register.php"; 
    $car_address ="http://localhost/AssignmentFinalTask3HindiRayane/AssignmentFinalTask3HindiRayane/Car.php";
    session_start();
    @$user_check = $_SESSION['login_user'];
    $ses_sql = mysqli_query($conn,"select User_ID, User_Username, User_Password, User_Email, User_FirstName, User_SecondName, User_Adresse, User_License, User_MobileNumber, User_DateOfBirth, User_Country, User_City from user where User_Username='$user_check' ");

    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    $login_id = $row['User_ID'];
    $login_username = $row['User_Username'];
    $login_password = $row['User_Password'];
    $login_email = $row['User_Email'];
    $login_firstname = $row['User_FirstName'];
    $login_secondname = $row['User_SecondName'];
    $login_address = $row['User_Adresse'];
    $login_license = $row['User_License'];
    $login_mobile = $row['User_MobileNumber'];
    $login_date = $row['User_DateOfBirth'];
    $login_country = $row['User_Country'];
    $login_city = $row['User_City'];
?>

<html>
    <head>
        <meta charset="UTF-8" />
        <title>C.R Luxury</title>
        <link rel="stylesheet" href="Register.css">
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
                            
    </head>

    
    <body>
        
        <h1 class = "topborder"  id = "topbordertitle">Informations</h1>
        <input type = "checkbox" id="menuToggle">
        <label for="menuToggle" class="menu-icon">&#9776;</label>
        <header>
           <div id="brand">
                <?php if(isset($_GET['error'])){
    echo base64_decode(urldecode($_GET['error'])); } else if(isset($_GET['msg4'])){
    echo base64_decode(urldecode($_GET['msg4'])); }echo "Welcome, "; echo  $login_username ;?>
                
            </div>
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
        <form action="update.php" method ="post">
        
            <div class="identification">
            <label><b>Username</b></label>
            <input type="text" name="uname" required value="<?php echo  $login_username ;?>">
            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="upsw" required value="<?php echo  $login_password;?>">
            <label><b>E-Mail</b></label>
            <input type="email" placeholder="Enter E-Mail Adress" name="uemail" required value="<?php echo  $login_email;?>">
            <label><b>First Name</b></label>
            <input type="text" placeholder="Enter First Name" name="fname" required value="<?php echo  $login_firstname;?>">
            <label><b>Second Name</b></label>
            <input type="text" placeholder="Enter Second Name" name="sname" required value="<?php echo  $login_secondname;?>">
            <label><b>Address</b></label>
            <input type="text" placeholder="Enter Adress" name="uaddress" required value="<?php echo  $login_address;?>">
            <label><b>License</b></label>
            <input type="text" placeholder="Enter License" name="ulicense" required value="<?php echo  $login_license;?>">
            <label><b>MobileNumber</b></label>
            <input type="tel" placeholder="Enter Mobile Number" name="umobile" required value="<?php echo  $login_mobile;?>">
            <label><b>DateOfBirth</b></label>
            <input type="date" placeholder="Enter Date Of Birth" name="udate" required value="<?php echo  $login_date;?>">
            <label><b>Country</b></label>
            <input type="text" placeholder="Enter Country" name="ucountry" required value="<?php echo  $login_country;?>">
            <label><b>City</b></label>
            <input type="text" placeholder="Enter City" name="ucity" required value="<?php echo  $login_city;?>">
                
            <button type="submit" name="submit" value="Update" >Update</button>
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