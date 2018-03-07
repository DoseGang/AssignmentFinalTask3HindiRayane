<?php
    include("database.php");
      include("Reset_UserID.php");
      include("Reset_Information_Id.php");
      include("SessionCheck.php");


    @$user_check = $_SESSION['login_user'];
    $ses_sql = "SELECT * from user WHERE User_Username='$user_check' ";

$username = $_POST['uname'];
$password = $_POST['upsw'];
$email = $_POST['uemail'];
$firstname = $_POST['fname'];
$secondname = $_POST['sname'];
$address = $_POST['uaddress'];
$license = $_POST['ulicense'];
$mobile = $_POST['umobile'];
$date = $_POST['udate'];
$country = $_POST['ucountry'];
$city = $_POST['ucity'];

$query = "UPDATE user SET User_Username = '$username', User_Password = '$password', User_Email = '$email', User_FirstName = '$firstname', User_SecondName = '$secondname', User_Adresse = '$address', User_License = '$license', User_MobileNumber = '$mobile', User_DateOfBirth = '$date', User_Country = '$country', User_City = '$city' WHERE User_Username = '$user_check'";



if(mysqli_query($conn,$query) == TRUE){
    $user_check = $_SESSION['User_Username'];
    header('Location:Loggedin.php');
} 

?>