<?php
    require "session.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>
<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">
       <i class="fas fa-home"></i> Home
    </li>
    </ol>
        </nav>
        <h2>Halo <?php echo $_SESSION['username']?></h2>
    </div>

    <script src="">../bootstrap/js/bootstrap.bundle.min.js</script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>
</html>