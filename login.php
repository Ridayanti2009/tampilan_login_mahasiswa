<?php
include 'koneksi.php';
if (isset($_POST['login'])){
    $username= $_POST['username'];
    $password= $_POST['password'];
    $sql="select * from pelanggan where username='$username' and password='$password'";
    $query=mysqli_query($conn,$sql);
    $find=mysqli_num_rows($query);
    if ($find==1){
        echo '<script>alert("Login Sukses");</script>';
        echo '<script>location="menu.php";</script>';
    } else {
        echo '<script>alert("Login Gagal");</script>';
        echo '<script>location="login.php";</script>';
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="wrapper">
        <div class="logo">
            <img src="logo2.png" alt="">
        </div>
        <div class="text-center mt-4 name">
            Hallo Pelanggan!!
            Welcome To Fashionunique
        </div>
        <form method = "post" class="p-3 mt-3">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="username" id="userName" placeholder="Username">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            <button name = "login" class="btn mt-3">Login</button>
        </form>
        <div class="text-center fs-6">
            <a href="#">Forget password?</a> or <a href="#">Sign up</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
