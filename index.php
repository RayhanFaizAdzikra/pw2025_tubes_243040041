<?php
require "koneksi.php";
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
   
   <style>
.warna1 {
  background-color: #876445;
  color: white;
}

.warna2 {
  background-color: #ca965c;
  color: white;
}

.warna3 {
  background-color: #eec373;
}

.warna4 {
  background-color: #f4dfba;
}

.banner {
  height: 80vh;
  background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('image/banner.png');
  
}


</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark warna1">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item me-4">
          <a class="nav-link" href="../adminpanel">Home</a>
        </li>
        <li class="nav-item me-4">
          <a class="nav-link" href="kategori.php">Spesialis</a>
        </li>
        <li class="nav-item me-4">
          <a class="nav-link" href="produk.php">Doctor</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="container-fluid banner">
    <div class="container">
        <h1 class="text-center">Selamat datang di RS Modern</h1>
    </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>
