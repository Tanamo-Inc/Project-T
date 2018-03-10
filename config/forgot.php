<?php
/* Reset your password form, sends reset.php password link */
require_once '../database/db.php';
$db = new db();
session_start();

// Check if form submitted with method="post"
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $db->connect()->escape_string($_POST['email']);
    $result = $db->connect()->query("SELECT * FROM admin WHERE email='$email'");

    if ($result->num_rows == 0) {

        // User doesn't exist
        $_SESSION['message'] = "User with that email doesn't exist!";
        header("location: error.php");
    } else { // User exists (num_rows != 0)
        $user = $result->fetch_assoc();

        // $user becomes array with user data

        $email = $user['email'];
        $hash = $user['hash'];
        $fname = $user['fname'];

        // Session message to display on success.php
        $_SESSION['message'] = "<p>Please check your email <span>$email</span>"
            . " for a confirmation link to complete your password reset!</p>";

        // Send registration confirmation link (reset.php)
        $to = $email;
        $subject = 'Reset Link ';
        $message_body = '
        Hello ' . $fname . ',

        You have requested password reset!

        Please click this link to reset your password:

        http://localhost/Project-T/config/reset.php?email=' . $email . '&hash=' . $hash;

        mail($to, $subject, $message_body);

        header("location: success.php");
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge"/>
    <title>Project T</title>
    <link rel="stylesheet" href="../public/css/main.css">
</head>

<body>

<div class="form">

    <h1>Reset Your Password</h1>

    <form action="forgot.php" method="post">
        <div class="wrapo">
            <label>
                Email Address<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="email"/>
        </div>
        <button class="button button-block">
            Reset
        </button>
    </form>
</div>


<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="../public/js/index.js"></script>
</body>

</html>
