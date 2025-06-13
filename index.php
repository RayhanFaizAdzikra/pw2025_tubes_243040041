
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
                <div class="col-md-4">
                    <div class="card">
                        <img src="" class="card-img-top" alt="">
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text"></p>
                                <a href="#" calss="btn btn-primary"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>
