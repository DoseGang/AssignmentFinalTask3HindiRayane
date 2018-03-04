<!DOCTYPE html>
<?php include("database.php");
      include("Reset_UserID.php");

    session_start();

    

    function login(){
        include("database.php");
         
        $stmt = $conn->prepare(" SELECT User_Username, User_Password from user WHERE User_Username = ? and User_Password = ? "); 
        $uname = $_POST['uname'];
        $psw = $_POST['psw'];
        $stmt-> bind_param("ss",$uname,$psw);
        $stmt->execute();
        $stmt->bind_result($username,$password);
        
        
        if($stmt->fetch()){
            
            $_SESSION['login_user'] = $uname;
            header("Location: LoggedIn.php");
            
        }else {
            session_destroy();
             header("Location: Login.php?error=" . urlencode(base64_encode("Incorrect username or password. ")));
        }
        if(!empty($_POST["remember"])) {
				setcookie ("User_Username",$_POST["uname"],time()+ (10 * 365 * 24 * 60 * 60));
				setcookie ("User_Password",$_POST["psw"],time()+ (10 * 365 * 24 * 60 * 60));
			} else {
				if(isset($_COOKIE["User_Username"])) {
					setcookie ("User_Username","");
				}
				if(isset($_COOKIE["User_Password"])) {
					setcookie ("User_Password","");
				}
			}
    }


    if($_SERVER ["REQUEST_METHOD"]== "POST"){
        
       login();
    }  
    
?>







<html>
    <head>
        <meta charset="UTF-8" />
        <title>C.R Luxury</title>
        <link rel="stylesheet" href="login.css">
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
                            
    </head>

    
    <body>
        
        <h1 class = "topborder"  id = "topbordertitle">Login</h1>
        <input type = "checkbox" id="menuToggle">
        <label for="menuToggle" class="menu-icon">&#9776;</label>
        <header>
           <div id="brand">
                <?php if(isset($_GET['error'])){
    echo base64_decode(urldecode($_GET['error'])); } else if(isset($_GET['msg4'])){
    echo base64_decode(urldecode($_GET['msg4'])); }echo "Explore Me"; ?>
                
            </div>
        </header>
           
        <nav class ="menu">
        <ul>
            
            <li><a href="Home.php">HOME</a></li>
            <li><a href="Car.php">CAR</a></li>
            <li><a href="Register.php">REGISTER</a></li>
            
            
            </ul>
        
        </nav>
        <form action="" method ="post">
        
            <div class="identification">
            <label><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required value=<?php echo @$_COOKIE['User_Username']; ?> >
            <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required value=<?php echo @$_COOKIE['User_Password']; ?> >
           
            <button type="submit">Login</button> 
            
            <input type="checkbox" checked="checked" name="remember" value="remember" id="remember"> Remember me
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