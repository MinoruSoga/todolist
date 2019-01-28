<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "todo_list";

    $conn = new mysqli($host, $username, $password, $database);

    if($conn->connect_error){
        die("Connection error: " . $conn->connect_error);
    }

    $bmw_color = "blue";

    $bmw->color = "blue";
?>