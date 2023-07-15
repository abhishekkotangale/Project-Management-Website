<?php 

    include 'common/connection.php';

    
        $email = $_POST['email'];
        $password = $_POST['password'];


        $email_search = "select * from user where email = '$email'";
        $query = mysqli_query($con , $email_search);

        $email_count = mysqli_num_rows($query);

        if($email_count){
            $email_pass = mysqli_fetch_assoc($query);

            $db_pass = $email_pass['password'];

            $_SESSION['username'] = $email_pass['username'];

            $pass_decode = password_verify($password,$db_pass);

            if($pass_decode){
                header("location:home.php");
            }else{
                echo "password not match";
            }
        }else{
            echo "email incorrect";
        }

    ?>