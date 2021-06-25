<?php
    include "connect.php";
    
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }

    $client_username = mysqli_real_escape_string($conn, $_POST["cust_uname"]);
    $client_password = mysqli_real_escape_string($conn, $_POST["cust_psw"]);

    $sql0 =  "SELECT * FROM iiitv_bank_client WHERE client_username='".$client_username."' AND client_password='".$client_password."'";
    $result = $conn->query($sql0);
    $row = $result->fetch_assoc();

    if (($result->num_rows) > 0) {
        $_SESSION['loggedIn_client_id'] = $row["client_id"];
        $_SESSION['isCustValid'] = true;
        $_SESSION['LAST_ACTIVITY'] = time();
        header("location:./customer_home.php");
    }
    else {
        session_destroy();
        die(header("location:./home.php?loginFailed=true"));
    }
?>