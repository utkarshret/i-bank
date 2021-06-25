<?php
    include "validate_customer.php";
    include "header.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";
    include "session_timeout.php";

    $client_name = mysqli_real_escape_string($conn, $_POST["client_name"]);
    $client_surname = mysqli_real_escape_string($conn, $_POST["client_surname"]);
    $client_account_no = mysqli_real_escape_string($conn, $_POST["client_account_no"]);
    $client_email = mysqli_real_escape_string($conn, $_POST["client_email"]);
    $client_phone = mysqli_real_escape_string($conn, $_POST["client_phone"]);

    $id = $_SESSION['loggedIn_client_id'];
    $sql0 = "SELECT client_id FROM iiitv_bank_client WHERE client_name='".$client_name."' AND
                                                client_surname='".$client_surname."' AND
                                                client_account_no='".$client_account_no."' AND
                                                client_email='".$client_email."' AND
                                                client_phone='".$client_phone."'";
    $result = $conn->query($sql0);

    $success = 0;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $recipient_id = $row["client_id"];

        if ($id != $recipient_id) {
            $sql1 = "INSERT INTO iiitv_bank_recipient".$id." VALUES(
                        NULL,
                        '$recipient_id',
                        '$client_email',
                        '$client_phone',
                        '$client_account_no'
                    )";

            if (($conn->query($sql1) === TRUE)) {
                $success = 1;
            }
        }
        else {
            $success = -1;
        }
    }
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
            if ($success == 1) { ?>
                <p id="info"><?php echo "Beneficiary successfully added !\n"; ?></p>
            <?php } ?>

            <?php
            if ($success == 0) { ?>
                <p id="info"><?php echo "Beneficiary successfully added !\n"; ?></p>
            <?php } ?>

            <?php
            if ($success == -1) { ?>
                <p id="info"><?php echo "Can't add self as beneficiary !\n"; ?></p>
            <?php } ?>
        </div>

        <div class="flex-item">
            <a href="./beneficiary.php" class="button">Go Back</a>
        </div>
    </div>

</body>
</html>
