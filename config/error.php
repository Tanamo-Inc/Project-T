<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project T</title>
    <link rel="stylesheet" href="../public/css/main.css">
</head>

<body>
<div class="form">
    <h1>Error</h1>

    <h1><a>
            <?php
            if (isset($_SESSION['message']) AND !empty($_SESSION['message'])):
                echo $_SESSION['message'];
            else:
                header("location: ../index.php");
            endif;
            ?>
        </a>
    </h1>

    <a href="../index.php">
        <button class="button button-block">
            Try Again
        </button>
    </a>

</div>
</body>

</html>
