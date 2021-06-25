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

    $sql0 = "SELECT * FROM iiitv_bank_client WHERE client_id=".$_SESSION['client_id'];
    $sql1 = "SELECT * FROM iiitv_bank_record".$_SESSION['client_id']." WHERE transaction_id=(
                    SELECT MAX(transaction_id) FROM iiitv_bank_record".$_SESSION['client_id'].")";

    $result0 = $conn->query($sql0);
    $result1 = $conn->query($sql1);

    if ($result0->num_rows > 0) {
        // output data of each row
        while($row = $result0->fetch_assoc()) {
            $client_name = $row["client_name"];
            $client_surname = $row["client_surname"];
            $client_gender = $row["client_gender"];
            $dob = $row["client_date_of_birth"];
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
            $net_balance = $row["net_balance"];
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
    <form class="add_customer_form" action="./edit_customer_action.php" method="post">
        <div class="flex-container-form_header">
            <h1 id="form_header">Edit/View Customer details . . .</h1>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Customer ID : <label id="info_label"> <?php echo $_SESSION['client_id'] ?> </label></label>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>First Name :</label><br>
                <input name="client_name" size="30" type="text" value="<?php echo $client_name ?>" required />
            </div>
            <div  class=container>
                <label>Last Name :</b></label><br>
                <input name="client_surname" size="30" type="text" value="<?php echo $client_surname ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Balance : <label id="info_label"> <?php echo number_format($net_balance) ?> </label></label>
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
                <label>Date of Birth :</label><br>-_
                <input name="dob" size="30" type="text" placeholder="yyyy-mm-dd" value="<?php echo $dob ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Citizenship No :</label><br>
                <input name="client_aadhar_id" size="25" type="text" value="<?php echo $client_aadhar_id ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Email-ID :</label><br>
                <input name="client_email" size="30" type="text" value="<?php echo $client_email ?>" required />
            </div>
            <div  class=container>
                <label>Phone No. :</b></label><br>
                <input name="client_phone" size="30" type="text" value="<?php echo $client_phone ?>" required />
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
                <label>Bank Branch :</label>
            </div>
            <div  class=container>
                <select name="client_city">
                    <option value="kathmandu" <?php if ($client_city == 'kathmandu') {?> selected="selected" <?php }?>>Kathmandu</option>
                    <option value="delhi" <?php if ($client_city == 'delhi') {?> selected="selected" <?php }?>>Delhi</option>
                    <option value="newyork" <?php if ($client_city == 'newyork') {?> selected="selected" <?php }?>>New York</option>
                    <option value="paris" <?php if ($client_city == 'paris') {?> selected="selected" <?php }?>>Paris</option>
                    <option value="riyadh" <?php if ($client_city == 'riyadh') {?> selected="selected" <?php }?>>Riyadh</option>
                    <option value="moscow" <?php if ($client_city == 'moscow') {?> selected="selected" <?php }?>>Moscow</option>
                </select>
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Account No :</label><br>
                <input name="client_account_no" size="25" type="text" value="<?php echo $client_account_no ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div  class=container>
                <label>PIN(4 digit) :</b></label><br>
                <input name="client_identification" size="15" type="text" value="<?php echo $client_identification ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class=container>
                <label>Username :</label><br>
                <input name="client_username" size="30" type="text" value="<?php echo $client_username ?>" required />
            </div>
            <div  class=container>
                <label>Password :</b></label><br>
                <input name="client_password" size="30" type="text" value="<?php echo $client_password ?>" required />
            </div>
        </div>

        <div class="flex-container">
            <div class="container">
                <a href="./manage_customers.php" class="button">Go Back</a>
            </div>
            <div class="container">
                <button type="submit">Update</button>
            </div>
        </div>

    </form>

</body>
</html>
