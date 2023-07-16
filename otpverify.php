<?php
    session_start();
    include('common/connection.php');
    $uid = $_SESSION['uid'];
    $otp = $_POST['otp'];
    $showquery = "select * from user where uid='$uid' ";
    $showData = mysqli_query($con,$showquery);
     
    $result = mysqli_fetch_array($showData);
    echo $result['otp'];
    if($otp === $result['otp']){

        
        $newupdatequery = "update user set status='Active' where uid='$uid'";
        $nquery = mysqli_query($con,$newupdatequery);
        if($nquery){
            header('location:home.php');
        }else{
            echo "not inserted";
        }
    }else{
        echo "does not match";
    }
?>