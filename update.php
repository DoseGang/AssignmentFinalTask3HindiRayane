<?php
	include("database.php");
      include("Reset_UserID.php");
      include("Reset_Information_Id.php");   

          session_start();
    @$user_check = $_SESSION['login_user'];
    $ses_sql = mysqli_query($conn,"SELECT * FROM user where User_Username='$user_check' ");

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

$sql = "UPDATE user SET User_Username = '$username', User_Password = '$password', User_Email = '$email', User_FirstName = '$firstname', User_SecondName = '$secondname', User_Adresse = '$address', User_License = '$license', User_MobileNumber = '$mobile', User_DateOfBirth = '$date', User_Country = '$country', User_City = '$city' WHERE User_Username = '$user_check'";

mysqli_query($conn,$sql);

/* $register_user = $conn->prepare("UPDATE user SET User_Username = '$username', User_Password = '$password', User_Email = '$email', User_FirstName = '$firstname', User_SecondName = '$secondname', User_Adresse = '$address', User_License = '$license', User_MobileNumber = '$mobile', User_DateOfBirth = '$date', User_Country = '$country', User_City = '$city' WHERE User_Password = '$password'");
           //$register_user->bind_param("sssssssssss",$uname,$psw,$fname,$sname,$adresse,$dateofbirth,$license,$mobilenumber,$country,$city,$email);*/

if(mysqli_query($conn, $sql)) {
	$user_check = $_SESSION['User_Username'];
	header('Location: http://localhost/AssignmentFinalTask3HindiRayane/LoggedIn.php');
}
else echo "fail";

?>