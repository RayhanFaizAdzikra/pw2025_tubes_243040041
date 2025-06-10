<?php
    require "session.php";
    require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spesialis</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
     .no-decoration {
        text-decoration: none;
    }
</style>

<body>
    <?php require "navbar.php"; ?>    
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
      <a href="../adminpanel" class="no-decoration text-muted"><i class="fas fa-home"></i> Home </a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
       <i class="fas fa-hospital"></i> Spesialis Doctor
    </li>
    </ol>
        </nav>

        <div class="mt-3">
            <h2>List Spesialis Docter</h2>

        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>