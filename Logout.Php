<?php
   session_start();
   
   if(session_destroy()) {
       
      header("Location: Home.php?msg=" . urlencode(base64_encode("You have been successfully logged out!")));
   }
?>