<?php
    include "connect.php";
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }

    $admin_username = mysqli_real_escape_string($conn, $_POST["admin_uname"]);
    $admin_password = mysqli_real_escape_string($conn, $_POST["admin_psw"]);

    $sql0 =  "SELECT * FROM iiitv_bank_admin WHERE admin_username='".$admin_username."' AND admin_password='".$admin_password."'";
    $result = $conn->query($sql0);

    if (($result->num_rows) > 0) {
        $_SESSION['isAdminValid'] = true;
        $_SESSION['LAST_ACTIVITY'] = time();
        header("location:./admin_home.php");
    }
    else {
        session_destroy();
        die(header("location:./admin_login.php?loginFailed=true"));
    }
?>
