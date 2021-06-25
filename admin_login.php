<?php
    include "header.php";

    if (isset($_GET['loginFailed'])) {
        $message = "Invalid Credentials ! Please try again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    	@import url("fonts.css");

body {
    background-color: Antiquewhite;
    height: 100%;
    background: url("images/adlog.png") no-repeat center center fixed;
    background-size: cover;
}

h2 
{
    font-family: Medium 500;
    color: #1E3D58;
}

b 
{

    color: grey;
    font-family: Medium 500;
    margin-left: 10px;

}

input[type=text], input[type=password] 
{
    border: 0;
    border-bottom: 1px solid #ccc;
    box-sizing: border-box;
    background-color: transparent;
    font-family: Medium 500;
    color: black;
    font-size: 24px;
    width: 100%;
    margin: 8px 0;
    padding: 12px 1px;

}

button 
{
    font-family: Medium 500;
    background-color: #1E3D58;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    border-radius: 3px;
}


button:hover 
{
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    background-color: #1E3D58;
}

.flex-container-1 {
    display: -webkit-flex;
    display: flex;
    -webkit-flex-direction: column;
    flex-direction: column;
    width: 50%;
    max-width: 600px;
    height: auto;
    margin-top: 30px;
    margin-left: auto;
    margin-right: auto;
    background-color: #FAFAFA;
    box-shadow: 5px 5px 2px #888888;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}

.flex-item {
    width: auto;
    height: auto;
    margin: 10px;
}

.flex-container-2 {
    display: -webkit-flex;
    display: flex;
    width: 50%;
    max-width: 600px;
    height: auto;
    margin-left: auto;
    margin-right: auto;
    background-color: #FAFAFA;
    box-shadow: 5px 5px 2px #888888;
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
}

@media screen and (max-width: 1024px) {
    .flex-container-1 {width: 100%}
    .flex-container-2 {width: 100%}
}

    </style>
</head>


<body>
    <form action="./admin_login_action.php" method="post">
        <div class="flex-container-1">
            <div class="flex-item">
                <h2>Administrator Login</h2>
            </div>

            <label><b>Username</b></label>
            <div class="flex-item">
                <input type="text" name="admin_uname" required>
            </div>

            <label><b>Password</b></label>
            <div class="flex-item">
                <input type="password" name="admin_psw" required>
            </div>
        </div>

        <div class="flex-container-2">
            <div class="flex-item">
                <button type="submit">Login</button>
            </div>

            <div class="flex-item">
                <button type="button" class="cancelbtn">Cancel</button>
            </div>
        </div>
    </form>

</body>
</html>
