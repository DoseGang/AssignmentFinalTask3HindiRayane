<?php
      include("database.php");
      include("Reset_UserID.php");
      include("Reset_Information_Id.php");
      include("SessionCheck.php");

    @$user_check = $_SESSION['login_user'];
    $ses_sql = "SELECT * from user WHERE User_Username='$user_check' ";

	$vehiculeid = $_POST['vehid'];

    $query = "DELETE * FROM vehicule JOIN vehiculespec ON vehicule.Vehicule_Id =  vehiculespec.Vehicule_Id JOIN car ON vehicule.Vehicule_Id = car.Vehicule_Id WHERE Vehicule_Id ='$vehiculeid' ";

    echo ("Deleted !");

    mysqli_query($conn,$query);
    echo ("Deleted !");

if(mysqli_query($conn,$query)) {
    //$user_check = $_SESSION['User_Username'];
    echo ("Deleted !");
    //header('Location:Loggedin.php');
} 

?>