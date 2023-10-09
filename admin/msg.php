<?php 
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "../common/connection.php";

    $outgoing_id = $_SESSION['unique_id'];
    $tid = mysqli_real_escape_string($con, $_POST['tid']);
    $incoming_id = mysqli_real_escape_string($con, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($con, $_POST['message']);
    
    if (!empty($message)) {
        $sql = "INSERT INTO messages (tid, incoming_msg_id, outgoing_msg_id, msg)
                VALUES ('$tid', '$incoming_id', '$outgoing_id', '$message')";
        
        $result = mysqli_query($con, $sql);
        
        if ($result) {
            header("Location: viewtask.php?tid=$tid");
            exit(); 
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Message cannot be empty.";
    }
} else {
    header("location: ../login.php");
    exit(); 
}
?>