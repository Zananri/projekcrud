<?php 
session_start();

if(isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}

    require 'function.php';

    if(isset($_POST["submit"])){

        if(registrasi($_POST) > 0){
            echo "<script>
                    alert('User baru berhasil ditambahkan');
                    document.location.href='index.php'
                  </script>";
        }else{
            echo mysqli_error($conn);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        label{
            display: block;
            color:#ffff;
        }

        h1{
            color:#ffff;
            font-family:"Copperplate Gothic Bold";
        }

        .card{
            margin-top:200px;
        }

        body{
            background: url(img/791.jpg)no-repeat;
            background-size:cover;
        }

        .card{
            background-color:rgba(0, 0, 0, 0.5);
        }

        button a{
            color:#ffff;
            text-decoration:none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 25rem;">
            <div class="card-body">
            <h1>Halaman Registrasi</h1>
            <br>
                    <form action="" method="post">       
                            <label for="username">Username :</label>
                            <input type="text" name="username" id="username" autocomplete="off" required>
                        <br>
                            <label for="password">Password :</label>
                            <input type="password" name="password" id="password" required>
                        <br>
                        <label for="password2">Konfirmasi Password :</label>
                        <input type="password" name="password2" id="password2" required>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-primary" name="submit">Registrasi!</button>
                        <button class="btn btn-primary"><a href="login.php">Kembali ke login</a></button>
                    </form>
    </div>
        </div>
            </div>
                </div>
</body>
</html>