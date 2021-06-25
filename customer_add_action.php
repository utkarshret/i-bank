<?php
    include "validate_admin.php";
    include "connect.php";
    include "header.php";
    include "user_navbar.php";
    include "admin_sidebar.php";
    include "session_timeout.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="action_style.css">
</head>

<?php
$client_name = mysqli_real_escape_string($conn, $_POST["client_name"]);
$client_surname = mysqli_real_escape_string($conn, $_POST["client_surname"]);
$client_gender = mysqli_real_escape_string($conn, $_POST["client_gender"]);
$dob = mysqli_real_escape_string($conn, $_POST["dob"]);
$client_aadhar_id = mysqli_real_escape_string($conn, $_POST["client_aadhar_id"]);
$client_email = mysqli_real_escape_string($conn, $_POST["client_email"]);
$client_phone = mysqli_real_escape_string($conn, $_POST["client_phone"]);
$client_registered_address = mysqli_real_escape_string($conn, $_POST["client_registered_address"]);
$client_city = mysqli_real_escape_string($conn, $_POST["client_city"]);
$client_account_no = mysqli_real_escape_string($conn, $_POST["client_account_no"]);
$net_balance = mysqli_real_escape_string($conn, $_POST["net_balance"]);
$pin = mysqli_real_escape_string($conn, $_POST["pin"]);
$client_username = mysqli_real_escape_string($conn, $_POST["client_username"]);
$client_password = mysqli_real_escape_string($conn, $_POST["client_password"]);

$sql0 = "SELECT MAX(client_id) FROM iiitv_bank_client";
$result = $conn->query($sql0);
$row = $result->fetch_assoc();
$client_id = $row["MAX(client_id)"] + 1;


   
$sql5 = "ALTER TABLE customer AUTO_INCREMENT=".$client_id;
$conn->query($sql5);

$sql1 = "CREATE TABLE iiitv_bank_record".$client_id."(
            transaction_id INT NOT NULL AUTO_INCREMENT,
            transaction_date DATETIME,
            transaction_comments VARCHAR(255),
            transaction_debit INT,
            transaction_credit INT,
            net_balance INT,
            PRIMARY KEY(transaction_id)
        )";

$sql2 = "CREATE TABLE iiitv_bank_recipient".$client_id."(
            recipient_id INT NOT NULL AUTO_INCREMENT,
            recipient_client_id INT UNIQUE,
             recipient_email VARCHAR(30) UNIQUE,
             recipient_phone VARCHAR(20) UNIQUE,
             recipient_acc_no INT UNIQUE,
            PRIMARY KEY(recipient_id)
        )";

$sql3 = "INSERT INTO iiitv_bank_client VALUES(
           '$client_id',
            '$client_name',
            '$client_surname',
            '$client_gender',
            '$dob',
            '$client_aadhar_id',
            '$client_email',
            '$client_phone',
            '$client_registered_address',
            '$client_city',
            '$client_account_no',
            '$pin',
            '$client_username',
            '$client_password'
        )";

$sql4 = "INSERT INTO iiitv_bank_record".$client_id." VALUES(
            NULL,
            NOW(),
            'Opening Balance',
            '0',
            '$net_balance',
            '$net_balance'
        )";

?>

<body>
    <div class="flex-container">
        <div class="flex-item">
            <?php
            if (($conn->query($sql3) === TRUE)) { ?>
                <p id="info"><?php echo "Customer created successfully !\n"; ?></p>
        </div>

        <div class="flex-item">
            <?php
            if (($conn->query($sql1) === TRUE)) { ?>
                <p id="info"><?php echo "Passbook created successfully !\n"; ?></p>
            <?php
            } else { ?>
                <p id="info"><?php
                echo "Error: " . $sql1 . "<br>" . $conn->error . "<br>"; ?></p>
            <?php } ?>
        </div>

        <div class="flex-item">
            <?php
            if (($conn->query($sql4) === TRUE)) { ?>
                <p id="info"><?php echo "Passbook updated successfully !\n"; ?></p>
            <?php
            } else { ?>
                <p id="info"><?php
                echo "Error: " . $sql4 . "<br>" . $conn->error . "<br>"; ?></p>
            <?php } ?>
        </div>

        <div class="flex-item">
            <?php
            if (($conn->query($sql2) === TRUE)) { ?>
                <p id="info"><?php echo "Beneficiary created successfully !\n"; ?></p>
            <?php
            } else { ?>
                <p id="info"><?php
                echo "Error: " . $sql2 . "<br>" . $conn->error . "<br>"; ?></p>
            <?php } ?>
        </div>

            <?php
            } else { ?>
        </div>
        <div class="flex-item">
                <p id="info"><?php
                echo "Error: " . $sql3 . "<br>" . $conn->error . "<br>"; ?></p>
            <?php } ?>
        </div>
        <?php $conn->close(); ?>

        <div class="flex-item">
            <a href="./customer_add.php" class="button">Add Again</a>
        </div>

    </div>

</body>
</html>
