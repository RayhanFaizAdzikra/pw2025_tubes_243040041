<?php
    require "session.php";
    require "../koneksi.php";

    $query = mysqli_query($conn, "SELECT * FROM dokter");
    $jumlahDokter = mysqli_num_rows($query);

    $queryKategori = mysqli_query($conn, "SELECT * FROM kategori");

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
    return $randomString;
    }
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

    form div{
        margin-bottom: 10px;
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
                <input type="text" id="nama" name="nama" class="form-control" autocomplete="off" required>
            </div>
            <div>
                <label for="kategori">Spesialis Doctor</label>
            <select name="kategori" id="kategori" class="form-control" required>
                <option value="">Pilih Spesialis Doctor</option>
                <?php
                    while($data=mysqli_fetch_array($queryKategori)){
                    ?>
                        <option value="<?php echo $data['id']?>"><?php echo $data['nama']?></option>
                    <?php
                    }
                ?>
            </select>
    </div>
    <div>
        <label for="jadwal_praktek">Jadwal Praktek</label>
        <input type="text" class="form-control" name="jadwal_praktek" required>
    </div>

    <div>
        <label for="foto">Foto</label>
        <input type="file" name="foto" id="foto" class="form-control">
    </div>

    <div>
        <label for="detail">Detail</label>
        <textarea name="detail" id="detail" class="form-control"></textarea>
    </div>

    <div>
        <label for="ketersediaan_antrian">Ketersediaan Antrian</label>
        <select name="ketersediaan_antrian" id="ketersediaan_antrian" class="form-control">
            <option value="">Pilih Ketersediaan Antrian</option>
            <option value="tersedia">Tersedia</option>
            <option value="habis">Tidak Tersedia</option>
        </select>
    </div>
    <div>
        <button type="submit" class="btn btn-primary mt-3" name="simpan">Simpan</button>
    </div>
        </form>

        <?php
            if(isset($_POST['simpan'])){
                $nama = htmlspecialchars($_POST['nama']);
                $kategori = htmlspecialchars($_POST['kategori']);
                $jadwal_praktek = htmlspecialchars($_POST['jadwal_praktek']);
                $detail = htmlspecialchars($_POST['detail']);
                $ketersediaanantrian = htmlspecialchars($_POST['ketersediaan_antrian']);

                $target_dir = "../image/";
                $nama_file = basename($_FILES['foto']['name']);
                $target_file = $target_dir . $nama_file;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $image_size = $_FILES['foto']['size'];
                $random_name = generateRandomString(20);
                $new_name = $random_name . "." . $imageFileType;

                if($nama=='' || $kategori=='' || $jadwal_praktek==''){
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Nama, Spesialis Doctor, dan Jadwal Praktek harus diisi!!!
                    </div>
                    <?php
                }
                else {
                    if($nama_file != ''){
                        if($image_size > 5000000){
                            ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                Ukuran Foto Terlalu Besar, Maksimal 5MB!!!
                             </div>
                            <?php
                        }
                        else {
                            if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg'){
                            ?>
                             <div class="alert alert-warning mt-3" role="alert">
                                File Harus Bertipe JPG, PNG, atau JPEG!!!
                             </div>
                            <?php
                        }
                        else{
                                move_uploaded_file($_FILES['foto']['tmp_name'], $target_dir . $random_name . "." . $new_name);
                            }
                        }
                    }

                    //query insert to doctor table
                    $queryTambah = mysqli_query($conn, "INSERT INTO dokter (kategori_id, nama, jadwal_praktek, foto, detail, ketersediaan_antrian) VALUES ('$kategori', '$nama', '$jadwal_praktek', 
                    '$new_name', '$detail', '$ketersediaan_antrian')");
                
                    if($queryTambah){
                        ?>
                        <div class="alert alert-success mt-3" role="alert">
                            Data Berhasil Ditambahkan!!!
                        </div>
                        <meta http-equiv="refresh" content="2; url=doctor.php"/>
                        <?php
                    }
                    else {
                        echo mysqli_error($conn);
                    }
                }
            }
        ?>
     </div> 

     <div class="mt-3">
         <h2>List Doctor</h2>

         <div class="table-responsive mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Spesialis Doctor</th>
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