<?php       
            function reset_information_Id(){
            include("database.php");
            $reset_information_id = "SET @count = 0";
            $reset_auto_increment="UPDATE information SET Information_Id = @count:= @count + 1";
            $reset_information_id_result = mysqli_query($conn,$reset_information_id);
            $reset_auto_increment = mysqli_query($conn,$reset_auto_increment); 
            }
?>