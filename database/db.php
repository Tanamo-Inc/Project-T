<!--Author:Tandoh Anthony Nwi-Ackah-->
<!--Email:tanamoinc@gmail.com-->
<!--Country:Ghana-->
<!--Date:  Feb 10,2018-->
<!--Company: Tanamo Inc.-->


<?php

//change the sql database variables below
define("DB_HOST", "localhost");
define("DB_USER", "tanamo");
define("DB_PASSWORD", "");
define("DB_DATABASE", "project_t");


class db
{
    // Connecting to database
    public function connect()
    {
        // connecting to mysql
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        if (mysqli_connect_errno()) {
            echo "<p>Failed to connect to MySQL: " . mysqli_connect_error() . "</p>";
        }

        // return database handler
        return $conn;
    }

}
