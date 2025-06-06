<?php
 require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
    .main{
        height: 100vh;
    }

    .login-box{
        width: 500px;
        height: 300px;
        border: solid 1px;
    }
</style>

<body>
   <div class="main d-flex justify-content-center align-items-center">
       <div class="login-box p-5">
       <form action="" method="post">
           <div>
               <label for="username">Username</label>
               <input type="text" class="form-control" name="username" id="username">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="text" class="form-control" name="password" id="password">
            </div>
            <div>
                <button class="btn btn-success form-control mt-3" type="submit">Login</button>
            </div>
        </form>
        </div>
    </div>
</body>
</html>