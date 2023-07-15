<?php

 $server = "localhost";
 $user = "root";
 $password = "";
 $db = "project_management";

    $con = mysqli_connect($server,$user,$password,$db);

    if($con){
        ?>
        
        <script>
            alert("connection Successful");
        </script>
        
        <?php
    }else{
        ?>
        
    <script>
        alert("connection not Successful");
    </script>
    
    <?php
    }

?>
