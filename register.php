<?php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
    if (mysqli_num_rows($check) > 0) {
        $error = "Username sudah digunakan.";
    } else {
        $insert = mysqli_query($conn, "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')");
        if ($insert) {
            $success = "Registrasi berhasil. <a href='login.php'>Login sekarang</a>";
        } else {
            $error = "Gagal registrasi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center bg-success text-white">
                    <h4>Registrasi Akun</h4>
                </div>
                <div class="card-body">
                    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                    <?php if (isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>
                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Daftar Sebagai</label>
                            <select name="role" class="form-select">
                                <option value="user">User</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Register</button>
                    </form>
                    <div class="mt-3 text-center">
                        Sudah punya akun? <a href="login.php">Login di sini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
