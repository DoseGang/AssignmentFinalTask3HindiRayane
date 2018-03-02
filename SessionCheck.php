<?php include("database.php");

    session_start();
    $user_check = $_SESSION['login_user'];
   
    $ses_sql = mysqli_query($conn,"select * from user where User_Username='$user_check' ");
    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    $login_session = $row['User_Username'];
   

    if(!isset($_SESSION['login_user']) ) {
       
        header("Location: Login.php");
    }

?>