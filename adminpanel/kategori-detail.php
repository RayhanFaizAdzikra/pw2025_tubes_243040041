<?php
    require "session.php";
    require "../koneksi.php";

    $id = $_GET['q'];

    $query = mysqli_query($conn, "SELECT * FROM kategori WHERE id='$id'");
    $data = mysqli_fetch_array($query);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Spesialis Doctor</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
    <h2>Detail Spesialis Doctor</h2>

    <div class="col-12 col-md-6">
        <form action="" method="post">
     <div>
        <label for="kategori">Spesialis Doctor</label>
        <input type="text" name="kategori" id="kategori" class="form-control" value="<?php echo $data['nama']?>">
    </div>
   
    <div class="mt-5">
        <button type="submit" class="btn btn-primary" name="editBtn">Edit</button>
    </div>
    </form>

    <?php
        if(isset($_POST['editBtn'])){
          $kategori = htmlspecialchars($_POST['kategori']);

          if($data['nama']==$kategori){
            ?>
                <meta http-equiv="refresh" content="0; url=kategori.php"/>
            <?php
          }
          else {
            $query = mysqli_query($conn, "SELECT * FROM kategori WHERE nama='$kategori'");
            $jumlahData = mysqli_num_rows($query);
           
            if($jumlahData > 0) {
                ?>
                <div class="alert alert-warning mt-3" role="alert">
                  Data Sudah Ada!!! 
                </div>
                <?php
            }
          }
        }
    ?>
    </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>