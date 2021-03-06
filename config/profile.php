<?php

session_start();

// Check if user is logged in using the session variable
if ($_SESSION['logged_in'] != 1) {
    $_SESSION['message'] = "You must log in before viewing your profile page!";
    header("location: error.php");
} else {
    // Makes it easier to read
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>
    <link rel="stylesheet" href="../public/css/main.css">
</head>

<body>

<div class="form">

    <h1>Welcome</h1>

    <p>
        <?php
        // Display message about account verification link only once
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];

            // Don't annoy the user with more messages upon page refresh
            unset($_SESSION['message']);
        }
        ?>
    </p>

    <?php
    // Keep reminding the user this account is not active, until they activate

    if (!$active) {
        echo
        '<div class="info">
              Account is unverified, please confirm your email by clicking
              on the email link!
              </div>';
    }
    ?>

    <h1><?php echo $fname . ' ' . $lname; ?></h1>

    <h1><a><?= $email ?></a></h1>

    <a href="home.php">
        <button class="button button-block" name="logout">Home</button>
    </a>

</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="../public/js/index.js"></script>

</body>
</html>
