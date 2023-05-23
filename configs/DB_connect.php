<?php
    $servername = "localhost";
    $database = "Blog";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $database);

    session_start();
?>