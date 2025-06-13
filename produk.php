<?php
    require "koneksi.php";

    $queryKategori = mysqli_query($conn, "SELECT * FROM kategori");

    //get dokter by nama dokter
    if(isset($_GET['keyword'])){
        $queryDokter = mysqli_query($conn, "SELECT * FROM dokter WHERE nama LIKE '%$_GET[keyword]%'");
    }
    // get dokter by kategori
    else if(isset($_GET['kategori'])){
        $queryGetKategoriId = mysqli_query($conn, "SELECT id FROM kategori WHERE nama='$_GET[kategori]'");
        $kategoriId = mysqli_fetch_array($queryGetKategoriId);

        $queryDokter = mysqli_query($conn, "SELECT * FROM dokter WHERE kategori_id='$kategoriId[id]'");
    }
    // get dokter default
    else{
        $queryDokter = mysqli_query($conn, "SELECT * FROM dokter");
    }

    $countData = mysqli_num_rows($queryDokter);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php require "navbar.php"?>

    <div class="container-fluid background-produk d-flex align-items-center">
        <div class="container">
            <h1 class="text-white text-center">Doctor</h1>
        </div>
    </div>

    <!-- body -->
    <div class="container py-5">
    <div class="row">
        <!-- Kategori Spesialis -->
        <div class="col-lg-3 mb-5">
            <h3>Spesialis</h3>
            <ul class="list-group">
                <?php while($kategori = mysqli_fetch_array($queryKategori)){ ?>
                    <a class="no-decoration" href="produk.php?kategori=<?php echo $kategori['nama'] ?>">
                        <li class="list-group-item"><?php echo $kategori['nama'] ?></li>
                    </a>
                <?php } ?>
            </ul>
        </div>

        <!-- Dokter -->
        <div class="col-lg-9">
            <h3 class="text-center mb-3">Doctor</h3>
            <div class="row">
                <?php
                    if($countData<1){
                ?>
                    <h4 class="text-center my-5">Dokter Yang Anda Cari Tidak Ada</h4>
                <?php
                    }
                ?>
                <?php while($dokter = mysqli_fetch_array($queryDokter)){ ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="image/<?php echo $dokter['foto']; ?>" class="card-img-top" alt="">
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $dokter['nama']; ?></h4>
                            <p class="card-text"><?php echo $dokter['jadwal_praktek']; ?></p>
                            <h5 class="card-title"><?php echo $dokter['ketersediaan_antrian']; ?></h5>
                            <a href="produk-detail.php?nama=<?php echo $dokter['nama']; ?>" class="btn warna2 text-white">Lihat Doctor</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>