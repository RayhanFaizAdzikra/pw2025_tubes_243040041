<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'pw2025_tubes_243040041');
    
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
?>