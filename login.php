<html>
    <head>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js@1.12.0"></script>
    <script src="toast.js"></script>
    <link rel="stylesheet" href="toast.css">
    </head>
<body>
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

            if(($email_pass['status'] == 'Not Active') and $pass_decode){
                header("location:otp.php");
            }else if(($email_pass['status'] == 'Active') and $pass_decode){
                header('location:home.php');
            }else{
                ?>
                <script>
                    alert("Password Not Match");
                </script>
            <?php
            header("location:index.php");
            }
        }else{
            ?>
                <script>
                    alert("email not present");
                </script>
            <?php
            header("location:index.php");
            
        }

    ?>
</body>

</html>