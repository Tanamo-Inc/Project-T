<?php
session_start();
session_unset();
session_destroy();
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
    <h1>Thanks for stopping by</h1>

    <h1><a><?= 'You have been logged out !!!'; ?></a></h1>

    <br/>

    <a href="../index.php">
        <button class="button button-block"/>
        Log in Again</button></a>

</div>


</body>

</html>
