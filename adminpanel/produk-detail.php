<?php
    require "session.php";
    require "../koneksi.php";

    $id = $_GET['q'];

    $query = mysqli_query($conn, "SELECT a.*, b.nama AS nama_kategori FROM dokter a JOIN kategori b ON a.kategori_id=b.id WHERE a.id='$id'");
    $data = mysqli_fetch_array($query);

    $queryKategori = mysqli_query($conn, "SELECT * FROM kategori WHERE id != '$data[kategori_id]'");

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
    <title>Doctor Detail</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>

    <style>
        form div{
        margin-bottom: 10px;
        }
    </style>

<body>
    <?php require "navbar.php";?>
        <div class="container mt-5">
            <h2>Detail Doctor</h2>

            <div class="col-12 col-md-6">
                 <form action="" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>" class="form-control" autocomplete="off" required>
                    </div>
                   <div>
    <label for="kategori">Spesialis Doctor</label>
    <select name="kategori" id="kategori" class="form-control" required>
        <option value="<?php echo $data['kategori_id']; ?>"><?php echo $data['nama_kategori']; ?></option>
        <?php
        while ($dataKategori = mysqli_fetch_array($queryKategori)) {
        ?>
            <option value="<?php echo $dataKategori['id']; ?>"><?php echo $dataKategori['nama']; ?></option>
        <?php
        }
        ?>
    </select>
            </div>
            <div>
                <label for="jadwal_praktek">Jadwal Praktek</label>
                <input type="text" class="form-control" value="<?php echo $data['jadwal_praktek']; ?>" name="jadwal_praktek" required>
            </div>

            <div>
                <label for="foto">Foto</label>
                <input type="file" name="foto" id="foto" class="form-control">
            </div>
            <div>
                <label for="detail">Detail</label>
                <textarea name="detail" id="detail" cols="30" rows="10" class="form-control">
                    <?php echo $data['detail']; ?>
                </textarea>
            </div>
            <div>
                <label for="ketersediaan_antrian">Ketersediaan Antrian</label>
                <select name="ketersediaan_antrian" id="ketersediaan_antrian" class="form-control">
                <option value="<?php echo $data['ketersediaan_antrian']; ?>"><?php echo $data['ketersediaan_antrian']; ?></option>
                <?php 
                if($data['ketersediaan_antrian'] == "tersedia") {
                   ?>
                <option value="habis">Tidak Tersedia</option>
                   <?php
                }
                else {
                    ?>
                    <option value="tersedia">Tersedia</option>
                    <?php
                }
                ?>
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary mt-2" name="update">Simpan</button>
                <button type="submit" class="btn btn-danger mt-2" name="hapus">Hapus</button>
            </div>
                 </form>

                <?php
                    if (isset($_POST['simpan'])) {
                        $nama = htmlspecialchars($_POST['nama']);
                        $kategori = htmlspecialchars($_POST['kategori']);
                        $jadwal_praktek = htmlspecialchars($_POST['jadwal_praktek']);
                        $detail = htmlspecialchars($_POST['detail']);
                        $ketersediaan_antrian = htmlspecialchars($_POST['ketersediaan_antrian']);

                        $target_dir = "../image/";
                        $nama_file = basename($_FILES["foto"]["name"]);
                        $target_file = $target_dir . $nama_file;
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                        $image_size = $_FILES["foto"]["size"];
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
                            $queryUpdate = mysqli_query($conn, "UPDATE dokter SET kategori_id='$kategori', nama='$nama', jadwal_praktek='$jadwal_praktek',
                             detail='$detail', ketersediaan_antrian='$ketersediaan_antrian' WHERE id='$id'");
                if ($nama_file != '') {
            if ($image_size > 4000000) {
          ?>
            <div class="alert alert-warning mt-3" role="alert">
                File tidak boleh lebih dari 4 mb
              </div>
              <?php
            } else {
              if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'gif' && $imageFileType != 'jpeg') {
              ?>
                <div class="alert alert-warning mt-3" role="alert">
                  File wajib bertipe jpg atau png atau jpeg atau jpegs
                </div>
                <?php
              } else {
                move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $new_name);

                 $queryUpdate = mysqli_query($conn, "UPDATE dokter SET foto='$new_name' WHERE id='$id'");

                if ($queryUpdate) {
                ?>
                  <div class="alert alert-primary mt-3" role="alert">
                    Data Berhasil Diupdate
                  </div>

                  <meta http-equiv="refresh" content="2 ; url=produk.php" />
          <?php
                } else {
                  echo mysqli_error($conn);
                }
              }
            }
          }
        }
      }

      if (isset($_POST['hapus'])) {
        $queryHapus = mysqli_query($conn, "DELETE FROM dokter WHERE id='$id'");

        if ($queryHapus) {
          ?>
          <div class="alert alert-primary mt-3" role="alert">
            Produk Berhasil Dihapus
          </div>

          <meta http-equiv="refresh" content="2 ; url=produk.php" />
      <?php
        }
      }
      ?>
    </div>
  </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>