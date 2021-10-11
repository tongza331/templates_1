<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webchat_db_1";

    // create connection
    $conn = mysqli_connect($servername,$username,$password,$dbname);

    // check connection
    if (!$conn) {
        die("Connection Failed". mysqli_connect_error());
    }
?>