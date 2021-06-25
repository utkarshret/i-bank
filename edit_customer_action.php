<?php
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }

    include "validate_admin.php";
    include "connect.php";
    include "header.php";
    include "user_navbar.php";
    include "admin_sidebar.php";
    include "session_timeout.php";

    if (isset($_GET['client_id'])) {
        $_SESSION['client_id'] = $_GET['client_id'];
    }

    $client_name = mysqli_real_escape_string($conn, $_POST["client_name"]);
    $client_surname = mysqli_real_escape_string($conn, $_POST["client_surname"]);
    $dob = mysqli_real_escape_string($conn, $_POST["dob"]);
    $client_aadhar_id = mysqli_real_escape_string($conn, $_POST["client_aadhar_id"]);
    $client_email = mysqli_real_escape_string($conn, $_POST["client_email"]);
    $client_phone = mysqli_real_escape_string($conn, $_POST["client_phone"]);
    $client_registered_address = mysqli_real_escape_string($conn, $_POST["client_registered_address"]);
    $client_city = mysqli_real_escape_string($conn, $_POST["client_city"]);
    $client_account_no = mysqli_real_escape_string($conn, $_POST["client_account_no"]);
    $client_identification = mysqli_real_escape_string($conn, $_POST["client_identification"]);
    $client_username = mysqli_real_escape_string($conn, $_POST["client_username"]);
    $client_password = mysqli_real_escape_string($conn, $_POST["client_password"]);

    $sql0 = "UPDATE iiitv_bank_client SET client_name = '$client_name',
                                 client_surname = '$client_surname',
                                 client_date_of_birth = '$dob',
                                 client_aadhar_id = '$client_aadhar_id',
                                 client_email = '$client_email',
                                 client_phone = '$client_phone',
                                 client_registered_address = '$client_registered_address',
                               client_city = '$client_city',
                                 client_account_no = '$client_account_no',
                                 client_identification = '$client_identification',
                                 client_username = '$client_username',
                                 client_password = '$client_password'
                            WHERE client_id=".$_SESSION['client_id'];

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="action_style.css">
</head>

<body>
    <div class="flex-container">
        <div class="flex-item">
            <?php
                if (($conn->query($sql0) === TRUE)) { ?>
                    <p id="info"><?php echo "Values Updated Successfully !"; ?></p>
                <?php
                }
                else { ?>
                    <p id="info"><?php echo "Error: " . $sql0 . "<br>" . $conn->error . "<br>"; ?></p>
                <?php
                }
            ?>
        </div>
        <?php $conn->close(); ?>

        <div class="flex-item">
            <a href="./manage_customers.php" class="button">Go Back</a>
        </div>

    </div>

</body>
</html>
