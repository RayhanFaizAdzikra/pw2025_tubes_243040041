<?php
    require "session.php";
    require "../koneksi.php";

    $query = mysqli_query($conn, "SELECT * FROM dokter");
    $jumlahDokter = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor</title>
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
       <i class="fas fa-user-doctor"></i> Doctor
    </li>
    </ol>
        </nav>

        <!--tambah doctor-->
     <div class="my-5 col-12 col-md-6">
        <h3>Tambah Doctor</h3>

        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" autocomplete="off">
            </div>
        </form>
     </div>
     

     <div class="mt-3">
         <h2>List Doctor</h2>

         <div class="table-responsive mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Jadwal Praktek</th>
                        <th>Ketersediaan Antrian</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     if($jumlahDokter==0){
                    ?>
                         <tr>
                            <td colspan=5 class="text-center">Data Doctor Tidak Tersedia</td>
                        </tr>
                    <?php
                     }
                     else {
                        $jumlah = 1;
                        while($data=mysqli_fetch_array($query)){
                    ?>
                        <tr>
                            <td><?php echo $jumlah; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['kategori_id']; ?></td>
                            <td><?php echo $data['jadwal_praktek']; ?></td>
                            <td><?php echo $data['ketersediaan_antrian']; ?></td>
                        </tr>
                    <?php
                        $jumlah++;
                        }
                     }
                    ?>
                </tbody>
            </table>
         </div>
     </div>

    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>