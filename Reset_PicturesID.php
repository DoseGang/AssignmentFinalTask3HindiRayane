
<?php       
            function reset_pictures_ID(){
            include("database.php");
            $reset_user_id = "SET @count = 0";
            $reset_auto_increment="UPDATE gallery SET Gallery_PictureID = @count:= @count + 1";
            $reset_user_id_result = mysqli_query($conn,$reset_user_id);
            $reset_auto_increment = mysqli_query($conn,$reset_auto_increment); 
            }
?>