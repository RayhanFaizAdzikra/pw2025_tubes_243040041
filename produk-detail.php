<?php
    require "koneksi.php";

    $nama = htmlspecialchars($_GET['nama']);
    $queryDokter = mysqli_query($conn, "SELECT * FROM dokter WHERE nama ='$nama'");
    $dokter = mysqli_fetch_array($queryDokter);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokter | Detail Dokter</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require "navbar.php"?>

    <!-- detail doctor -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-3">
                    <img src="image/<?php echo $dokter['foto']?>" class="w-100" alt="">
                </div>
                    <div class="col-lg-6 offset-lg-1">
                        <h1><?php echo $dokter['nama']?></h1>
                        <p class="fs-5">
                            <?php echo $dokter['detail']?>
                        </p>
                        <p class="text-jadwal">
                            <?php echo $dokter['jadwal_praktek']?>
                        </p>
                        <p class="fs-5">Ketersediaan Antrian: <strong><?php echo $dokter['ketersediaan_antrian']?></strong></p>
                    </div>
            </div>
        </div>
    </div>

    

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>