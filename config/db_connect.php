<?php

    require("db_constants.php"); 

    $conn = mysqli_connect(HOST, USER, PASSWORD, DB);

    if(!$conn){
        echo "Connection error: " . mysqli_connect_error();
    }

?>