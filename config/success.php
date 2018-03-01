<?php
/* Displays all successful messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge"/>
    <title>Success</title>
    <link rel="stylesheet" href="../public/css/main.css">
</head>
<body>

<div class="form">
    <h1><?= 'Success'; ?></h1>
    <p>
        <?php
        if (isset($_SESSION['message']) AND !empty($_SESSION['message'])):
            echo $_SESSION['message'];
        else:
            header("location: ../index.php");
        endif;
        ?>
    </p>
    <a href="../index.php">
        <button class="button button-block">
            Home
        </button>
    </a>
</div>

</body>
</html>
