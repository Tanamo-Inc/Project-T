<?php
require_once 'database/db.php';
$db = new db();
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<!--Author:Tandoh Anthony Nwi-Ackah-->
<!--Email:tanamoinc@gmail.com-->
<!--Country:Ghana-->
<!--Date:  Feb 10,2018-->
<!--Company: Tanamo Inc.-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge"/>
    <title>Project T</title>
    <link rel="stylesheet" href="public/css/main.css">
</head>

<body>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['login'])) {


        $email = $db->connect()->escape_string($_POST['email']);

        $result = $db->connect()->query("SELECT * FROM admin WHERE email='$email'");


        if ($result->num_rows == 0) {
            //Empty user
            $_SESSION['message'] = "User with that email doesn't exist!";
            header("location: config/error.php");

        } else {
            $user = $result->fetch_assoc();

            if (password_verify($_POST['password'], $user['password'])) {

                $_SESSION['email'] = $user['email'];
                $_SESSION['fname'] = $user['fname'];
                $_SESSION['lname'] = $user['lname'];
                $_SESSION['active'] = $user['active'];


                $_SESSION['logged_in'] = true;

                header("location: config/home.php");

            } else {
                $_SESSION['message'] = "You have entered wrong password, try again!";
                header("location: config/error.php");
            }
        }

    } elseif (isset($_POST['register'])) {

        $_SESSION['email'] = $_POST['email'];
        $_SESSION['fname'] = $_POST['fname'];
        $_SESSION['lname'] = $_POST['lname'];

// Escape all $_POST variables to protect against SQL injections
        $fname = $db->connect()->escape_string($_POST['fname']);
        $lname = $db->connect()->escape_string($_POST['lname']);
        $email = $db->connect()->escape_string($_POST['email']);
        $password = $db->connect()->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
        $hash = $db->connect()->escape_string(md5(rand(0, 1000)));

// Check if user with that email already exists
        $result = $db->connect()->query("SELECT * FROM admin WHERE email='$email'") or die($db->connect()->error());

// We know user email exists if the rows returned are more than 0
        if ($result->num_rows > 0) {

            $_SESSION['message'] = 'User with this email already exists!';
            header("location: config/error.php");
        } else { // Email doesn't already exist in a database, proceed...
            // active is 0 by DEFAULT (no need to include it here)
            $sql = "INSERT INTO admin (fname, lname, email, password, hash) "
                . "VALUES ('$fname','$lname','$email','$password', '$hash')";

            // Add user to the database
            if ($db->connect()->query($sql)) {

                $_SESSION['active'] = 0; //0 until user activates their account with verify.php
                $_SESSION['logged_in'] = true; // So we know the user has logged in
                $_SESSION['message'] = "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

                // Send registration confirmation link (verify.php)
                $to = $email;
                $subject = 'Verification';
                $message_body = '
        Hello ' . $fname . ',

        Thank you for signing up!

        Please click this link to activate your account:

        http://localhost/Project-T/config/verify.php?email=' . $email . '&hash=' . $hash;

                mail($to, $subject, $message_body);

                header("location: config/home.php");
            } else {
                $_SESSION['message'] = 'Registration failed!';
                header("location: config/error.php");
            }
        }
    }
}

?>

<div class="form">

    <ul class="gtap">
        <li class="tab"><a href="#ss">Sign Up</a></li>
        <li class="tab active"><a href="#login">Log In</a></li>
    </ul>

    <div class="loss">

        <div id="login">
            <h1>Log In to Project T.</h1>

            <form action="index.php" method="post" autocomplete="off">

                <div class="wrapo">
                    <label>
                        Email Address<span class="req">*</span>
                    </label>
                    <input type="email" required autocomplete="off" name="email"/>
                </div>

                <div class="wrapo">
                    <label>
                        Password<span class="req">*</span>
                    </label>
                    <input type="password" required autocomplete="off" name="password"/>
                </div>

                <p class="forgot"><a href="config/forgot.php">Forgot Password?</a></p>

                <button class="button button-block" name="login">
                    Let me in.
                </button>

            </form>

        </div>

        <div id="ss">
            <h1>It's free and anyone can join.</h1>

            <form action="index.php" method="post" autocomplete="off">

                <div class="top-row">
                    <div class="wrapo">
                        <label>
                            First Name<span class="req">*</span>
                        </label>
                        <input type="text" required autocomplete="off" name='fname'/>
                    </div>

                    <div class="wrapo">
                        <label>
                            Last Name<span class="req">*</span>
                        </label>
                        <input type="text" required autocomplete="off" name='lname'/>
                    </div>
                </div>

                <div class="wrapo">
                    <label>
                        Email Address<span class="req">*</span>
                    </label>
                    <input type="email" required autocomplete="off" name='email'/>
                </div>

                <div class="wrapo">
                    <label>
                        Password<span class="req">*</span>
                    </label>
                    <input type="password" required autocomplete="off" name='password'/>
                </div>

                <button type="submit" class="button button-block" name="register">
                    Create account
                </button>

            </form>

        </div>

    </div>

</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="public/js/index.js"></script>

</body>

</html>
