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

    $id = $_SESSION['loggedIn_client_id'];

    $sql0 = "SELECT * FROM iiitv_bank_client WHERE client_id=".$id;
    $sql1 = "SELECT * FROM iiitv_bank_record".$id." WHERE transaction_id=(
                    SELECT MAX(transaction_id) FROM iiitv_bank_record".$id.")";

    $result0 = $conn->query($sql0);
    $result1 = $conn->query($sql1);

    if ($result0->num_rows > 0) {
        // output data of each row
        while($row = $result0->fetch_assoc()) {
            $client_name = $row["client_name"];
            $client_surname= $row["client_surname"];
            $client_gender = $row["client_gender"];
            $client_date_of_birth = $row["client_date_of_birth"];
            $client_aadhar_id = $row["client_aadhar_id"];
            $client_email = $row["client_email"];
            $client_phone = $row["client_phone"];
            $client_registered_address = $row["client_registered_address"];
            $client_city = $row["client_city"];
            $client_account_no = $row["client_account_no"];
            $client_identification= $row["client_identification"];
            $client_username = $row["client_username"];
            $client_password = $row["client_password"];
        }
    }

    if ($result1->num_rows > 0) {
        // output data of each row
        while($row = $result1->fetch_assoc()) {
            $balance = $row["net_balance"];
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     <link rel="stylesheet" href="customer_add_style.css">
</head>

<body>
    <form class="add_customer_form" action="customer_profile_action.php" method="post">
        <div class="flex-container-form_header">
            <h1 id="form_header">Your account details . . .</h1>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>First Name : <label id="info_label"><?php echo $client_name ?></label></label>
            </div>
            <div class=container>
                <label>Last Name : <label id="info_label"><?php echo $client_surname ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Account No : <label id="info_label"><?php echo $client_account_no ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Balance (INR) : <label id="info_label"><?php echo number_format($balance) ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Gender :
                    <label id="info_label">
                    <?php
                        if ($client_gender == "male") {echo "Male";}
                        elseif ($client_gender == "female") {echo "Female";}
                        else {echo "Others";}
                    ?>
                    <label>
                </label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Date of Birth : <label id="info_label"><?php echo $client_date_of_birth ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Aadhar No : <label id="info_label"><?php echo $client_aadhar_id ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Email-ID :</label><br>
                <input name="client_email" size="30" type="text" value="<?php echo $client_email ?>" required />
            </div>
            <div class=container>
                <label>Username :</label><br>
                <input name="client_username" size="30" type="text" value="<?php echo $client_username ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div  class=container>
                <label>Phone No. : <label id="info_label"><?php echo $client_phone ?></label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Address :</label><br>
                <textarea name="client_registered_address" required /><?php echo $client_registered_address ?></textarea>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Bank Branch :
                    <label id="info_label">
                        <?php
                            if ($client_city == "delhi") {echo "Delhi";}
                            elseif ($client_city == "newyork") {echo "New York";}
                            elseif ($client_city == "paris") {echo "Paris";}
                            elseif ($client_city == "riyadh") {echo "Riyadh";}
                            elseif ($client_city == "moscow") {echo "Moscow";}
                        ?>
                    </label>
                </label>
            </div>
        </div>

        <div class="flex-container">
            <div class="container">
                <button type="submit">Update</button>
            </div>

        </div>

    </form>

</body>
</html>
