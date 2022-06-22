<?php 
    $servername = "sql.t2.cit116.xyz";
    $username = "db";
    $password = "webdev2022";
    $dbname = "deutschebahn";

    $db = mysqli_connect($servername, $username, $password, $dbname);
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

?>