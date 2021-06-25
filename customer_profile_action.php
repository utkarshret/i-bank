<?php
    /* Avoid multiple sessions warning
    Check if session is set before starting a new one. */
    if(!isset($_SESSION)) {
        session_start();
    }

    include "validate_customer.php";
    include "connect.php";
    include "header.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";
    include "session_timeout.php";

    $client_email = mysqli_real_escape_string($conn, $_POST["client_email"]);
    $client_registered_address = mysqli_real_escape_string($conn, $_POST["client_registered_address"]);
    $client_username = mysqli_real_escape_string($conn, $_POST["client_username"]);

    $sql0 = "UPDATE iiitv_bank_client SET client_email = '$client_email',
                                 client_registered_address = '$client_registered_address',
                                 client_username = '$client_username'
                            WHERE client_id=".$_SESSION['loggedIn_client_id'];;
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
            <a href="./customer_home.php" class="button">Home</a>
        </div>

    </div>

</body>
</html>
