<?php
session_start();
include("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from Form

    $user_email = mysqli_real_escape_string($con, $_POST['user_email']);
    $user_password = mysqli_real_escape_string($con, $_POST['user_password']);
    
    $sql = "SELECT * FROM users WHERE user_email='$user_email' AND user_password='$user_password'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $rowcount = mysqli_num_rows($result);

    if ($rowcount == 1) {
        $_SESSION['mySession'] = $row['id'];
        header("location: viewContacts.php");
    } else {
        echo '<script>alert("Your Email or Password is invalid. Please re-login.");</script>';
    }
    mysqli_close($con);
}
