<?php
    include "validate_customer.php";
    include "header.php";
    include "customer_navbar.php";
    include "customer_sidebar.php";
    include "session_timeout.php";

    $client_id = $_SESSION['loggedIn_client_id'];

    $sql0 = "SELECT * FROM iiitv_bank_client WHERE client_id=".$client_id;
    $result0 = $conn->query($sql0);
    $row0 = $result0->fetch_assoc();

    $sql1 = "SELECT * FROM iiitv_bank_record".$client_id." WHERE transaction_id=(
                    SELECT MAX(transaction_id) FROM iiitv_bank_record".$client_id.")";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

    if ($row1["transaction_debit"] == 0) {
        $transaction = $row1["transaction_credit"];
        $type = "credit";
    }
    else {
        $transaction = $row1["transaction_debit"];
        $type = "debit";
    }

    $time = strtotime($row1["transaction_date"]);
    $sanitized_time = date("d/m/Y, g:i A", $time);

    $sql2 = "SELECT COUNT(*) FROM iiitv_bank_recipient".$client_id;
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_home_style.css">
</head>

<body>
    <div class="flex-container">
        <div class="flex-item">
            <h1 id="customer">
                Welcome, <?php echo $row0["client_name"] ?>&nbsp<?php echo $row0["client_surname"] ?>&nbsp!
                <br>AC/No: <?php echo $row0["client_account_no"]; ?>
            </h1>
            <p id="customer">
                &#9656 Balance: <?php echo number_format($row1["net_balance"]); ?>/-
                <br>&#9656 You have <?php echo $row2["COUNT(*)"]; ?> beneficiaries.
                <br>&#9656 Your last transaction (<?php echo $type; ?>) of&nbspRs.&nbsp<?php
                echo number_format($transaction); ?><br>
                on <?php echo $sanitized_time; ?>, was: "<?php echo $row1["transaction_comments"]; ?>".
            </p>
        </div>
    </div>

</body>
</html>

<?php include "easter_egg.php"; ?>
