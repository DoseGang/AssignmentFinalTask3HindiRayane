<?php include("database.php");

    session_start();
    
    $user_check = $_SESSION['login_user'];
   
    $ses_sql = mysqli_query($conn,"select * from user where User_Username='$user_check' AND User_State =1");
    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
    $login_session = $row['User_Username'];
    $login_state = $row['User_State'];

    if( $row['User_State']=0) {
        $_SESSION['message'] ='You don t have the right to access this page.';
        header("Location: LoggedIn.php");
    }
       ?> 
    

