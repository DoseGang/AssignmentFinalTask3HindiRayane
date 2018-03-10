<?php       
            function reset_Vehicule_ID(){
            include("database.php");
            $reset_user_id = "SET @count = 0";
            $reset_auto_increment="UPDATE vehicule SET Vehicule_ID = @count:= @count + 1";
            $reset_user_id_result = mysqli_query($conn,$reset_user_id);
            $reset_auto_increment = mysqli_query($conn,$reset_auto_increment); 
            }
?>