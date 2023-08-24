<?php
require 'function.php';

if ( isset($_POST["login"]) ) {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // cek username (mencari didatabase apakah ada username yang akan diisi)
    if ( mysqli_num_rows($result) === 1) {

        // cek password (password verify adalah untuk mengecek password hash(acak) menjadi aslinya)
        $row = mysqli_fetch_assoc($result);
        if ( password_verify($password, $row["Password"]) ) {

            // set session
            $_SESSION["login"] = true;
            header("Location: index.php");
            exit;
        }
    }

    $error = true;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

    <style>
        .card{
            margin-top:180px;
            background-color:rgba(0, 0, 0, 0.5);
        }

        body{
            background: url(img/791.jpg)no-repeat;
            background-size:cover;
        }

        h1{
            color:#ffff;
            font-family:"Copperplate Gothic Bold";
        }

        label{
            color:#ffff;
        }

        button a{
            color:#ffff;
            text-decoration:none;
        }

        h6{
            margin-top:15px;
            color:#ffff;
            font-family:"Gungsuh";
        }

    </style>
<body>
        <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 25rem;">
            <div class="card-body">
            <h1>Halaman Login</h1>
            <br>
    <form action="" method="post">
    <?php if ( isset($error) ) :?>
        <p style="color: red; font-style: italic;">username / password salah!</p>
        <?php endif; ?>
        <label for="username">Username: </label>
        <br>
        <input type="text" name="username" id="username" required autofocus autocomplete="off">
        <br>
        <label for="password">Password: </label>
        <br>
        <input type="password" name="password" id="password">
        <br>
        <br>
        <button type="submit" class="btn btn-primary" name="login">Login</button>
        <button type="submit" class="btn btn-primary" name="submit"><a href="registrasi.php">Regsitrasi</a></button>
        <h6>Tidak punya akun? silahkan registrasi</h6>
    </form>
    </div>
    </div>
    </div>
    </div>
</body>
</html>