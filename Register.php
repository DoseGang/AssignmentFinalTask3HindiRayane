<!DOCTYPE html>
<?php include("database.php");
      include("Reset_UserID.php");
      include("Reset_Information_Id.php");

    session_start();

    function register(){
        include("database.php");
        
           $uname = $_POST['uname'];
           $uname2 = $_POST['uname'];
           $psw = $_POST['psw'];
           $fname =$_POST['fname'];
           $sname = $_POST['sname'];
           
           $value_selectid = 0;
        
           $check_user = $conn->prepare('SELECT User_Username FROM user WHERE User_Username = ?');
           $check_user->bind_param("s",$uname);
        
        
           $register_user = $conn->prepare("INSERT INTO `user` (`User_ID`, `User_Username`, `User_Password`, `User_FirstName`, `User_SecondName`, `User_State`, `User_Adresse`, `User_DateOfBirth`, `User_License`, `User_MobileNumber`, `User_Country`, `User_City`, `User_Email`) VALUES (NULL,?, ?, ?, ?, 0, ?, ?, ?, ?, ?,?,?)");
           $register_user->bind_param("sssssssssss",$uname,$psw,$fname,$sname,$adresse,$dateofbirth,$license,$mobilenumber,$country,$city,$email);
          
           
        
           
           
        
           $adresse =$_POST['address'];
           $dateofbirth =$_POST['dateofbirth'];
           $mobilenumber =$_POST['mobilenumber'];
           $country = $_POST['country'];
           $city = $_POST ['city'];
           $email = $_POST ['email'];
           $license = $_POST['license'];
           $infoid = NULL;
        
          
        
        
        
        
        $check_user->execute();
    if($check_user->fetch()){ 
            header("Location: Login.php?msg4=" . urlencode(base64_encode("User already created. ")));
        }
        else {
            
            $register_user->execute();
            
            
            
            reset_User_ID();
           
            
                if($register_user->fetch()){
                    
                    header("Location: Login.php?msg4=" . urlencode(base64_encode("Error")));
                } else{
                    (header("Location: Login.php?error=" . urlencode(base64_encode("User  created. "))));
                }
        
            }
    }



    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['register'])){
        register();
        }

     
    
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
        
        <h1 class = "topborder"  id = "topbordertitle">Register</h1>
        <input type = "checkbox" id="menuToggle">
        <label for="menuToggle" class="menu-icon">&#9776;</label>
        <header>
           <div id="brand">
                <?php if(isset($_GET['error'])){
    echo base64_decode(urldecode($_GET['error'])); } else if(isset($_GET['msg4'])){
    echo base64_decode(urldecode($_GET['msg4'])); }echo "Register"; ?>
                
            </div>
        </header>
           
        <nav class ="menu">
        <ul>
            
            <li><a href="Home.php">HOME</a></li>
            <li><a href="Login.php">LOGIN</a></li>
            <li><a href="Car.php">CAR</a></li>
            <li><a href="Moto.php">MOTORCYCLES</a></li>
           
            
            </ul>
        
        </nav>
        <form action="" method ="post">
        
            <div class="identification">
            <label><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required >
            <label><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
            <label><b>E-Mail</b></label>
            <input type="email" placeholder="Enter E-Mail Adress" name="email" required>
            <label><b>First Name</b></label>
            <input type="text" placeholder="Enter First Name" name="fname" required>
            <label><b>Second Name</b></label>
            <input type="text" placeholder="Enter Second Name" name="sname" required>
            <label><b>Address</b></label>
            <input type="text" placeholder="Enter Adress" name="address" required>
            <label><b>License</b></label>
            <input type="text" placeholder="Enter License" name="license" required>
            <label><b>MobileNumber</b></label>
            <input type="tel" placeholder="Enter Mobile Number" name="mobilenumber"required >
            <label><b>DateOfBirth</b></label>
            <input type="date" placeholder="Enter Date Of Birth"  data-date-inline-picker="true" name="dateofbirth"required >
            <label><b>Country</b></label>
            <input type="text" placeholder="Enter Country" name="country" >
            <label><b>City</b></label>
            <input type="text" placeholder="Enter City" name="city" >
                
            <button type="submit" name="register" value="register" >Register</button>
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