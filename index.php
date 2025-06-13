<?php
    require "koneksi.php";
    $queryDokter = mysqli_query($conn, "SELECT id, nama, jadwal_praktek, foto, detail FROM dokter LIMIT 6");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
 <?php require "navbar.php"; ?>
 
    <!-- backround -->
    <div class="container-fluid background d-flex align-items-center">
        <div class="container text-center text-white">
            <h1>Selamat Datang</h1>
            <h3> Di Rumah Sakit Modern</h3>
            <div class="col-8 offset-md-2">
                <form method="get" action="dokter.php">
                <div class="input-group input-group-lg my-4">
                <input type="text" class="form-control" placeholder="Cari Dokter, Spesialis, atau Layanan" aria-label="Cari Dokter, Spesialis, atau Layanan" 
                aria-describedby="button-addon2" name="keyword">
                <button type="submit" class="btn warna2">Telusuri</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Spesialis Dokter -->
     <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Spesialis Doctor</h3>

            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-dokter-bedah d-flex justify-content-center align-items-center">
                        <h4 class="text-white"><a class="no-decoration" href="dokter.php?kategori=Dokter Spesialis Bedah">Dokter Spesialis Bedah</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-dokter-gigi d-flex justify-content-center align-items-center">
                         <h4 class="text-white"><a class="no-decoration" href="dokter.php?kategori=Dokter Spesialis Gigi">Dokter Spesialis Gigi</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlighted-kategori kategori-dokter-anak d-flex justify-content-center align-items-center">
                         <h4 class="text-white"><a class="no-decoration" href="dokter.php?kategori=Dokter Spesialis Anak">Dokter Spesialis Anak</a></h4>
                    </div>
                </div>
            </div>
        </div>
     </div>

     <!-- tentang kami -->
      <div class="container-fluid warna3 py-5">
        <div class="container text-center">
            <h3>Tentang Kami</h3>
            <p class="fs-5 mt-3">
                Rumah Sakit Modern adalah rumah sakit terkemuka yang menyediakan layanan kesehatan berkualitas tinggi. Kami memiliki tim dokter spesialis yang berpengalaman dan fasilitas medis modern untuk memastikan perawatan terbaik bagi pasien kami.
            </p>
        </div>
      </div>

      <!-- doktor -->
       <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Doctor</h3>

            <div class="row mt-5">
                <?php while($data = mysqli_fetch_array($queryDokter)){ ?>
                <div class="col-sm-6 col-md-4 mb-3">
                    <div class="card">
                       <div class="">
                         <img src="image/<?php echo $data['foto']?>" class="card-img-top" alt="">
                       </div>                            
                       <div class="card-body">
                                <h4 class="card-title"><?php echo $data['nama']?></h4>
                                <p class="card-text"><?php echo $data['detail']?></p>
                                <h5 class="card-title"><?php echo $data['jadwal_praktek']?></h5>
                                <a href="produk-detail.php?nama=<?php echo $data['nama']?>" class="btn warna2 text-white">Lihat Doctor</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
       </div>

       <!-- footer -->
        <div class="container-fluid py-5 bg-dark text-light">
  <div class="container">
    <h5 class="text-center mb-4">Temui Kami</h5>
    <div class="row justify-content-center gap-3">
      <div class="col-auto">
        <a href="#" class="text-light text-decoration-none">
          <i class="bi bi-facebook fs-3"></i>
        </a>
      </div>
      <div class="col-auto">
        <a href="#" class="text-light text-decoration-none">
          <i class="bi bi-instagram fs-3"></i>
        </a>
      </div>
      <div class="col-auto">
        <a href="#" class="text-light text-decoration-none">
          <i class="bi bi-twitter fs-3"></i>
        </a>
      </div>
      <div class="col-auto">
        <a href="#" class="text-light text-decoration-none">
            <i class="bi bi-youtube fs-3"></i>
        </a>
    </div>
</div>
</div>
</div>
    <!-- Subscribe Section -->
<div class="container-fluid py-5 bg-light text-dark">
  <div class="container">
    <h5 class="text-center mt-5 mb-0">Subscribe</h5>
    <p class="text-center font-monospace">Untuk informasi tentang promo</p>

    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
      <div class="input-group mb-3">
        <input type="email" class="form-control" placeholder="Ketikkan Email"
               aria-label="Email" aria-describedby="button-addon2">
        <button class="btn btn-warning text-light" type="button" id="button-addon2">
          Subscribe
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Footer Section -->
<div class="container-fluid py-3 bg-dark text-light">
  <div class="container d-flex flex-column flex-md-row justify-content-between text-center text-md-start">
    <span>&copy; 2025 RS Modern</span>
    <span>Created by Rayhan</span>
  </div>
</div>


    

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>
