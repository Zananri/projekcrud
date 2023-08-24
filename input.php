<?php 
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require "function.php";
$conn = mysqli_connect("localhost", "root", "", "db_erwin1");

if( isset($_POST ["submit"])) {
       
    if (input($_POST)  >0 ){
        echo "<script>
                alert('data berhasil dimasukkan');
                document.location.href = 'index.php';
                </script>";

    }else {
        echo "<script>
                alert('data gagal dimasukkan');
                document.location.href = 'index.php';
                </script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>
    body{
        background: url(img/bc.jpg)no-repeat;
        background-size:cover;
    }

    label{
        color:black;
    }

    button a {
        color:#ffff;
        text-decoration: none;
    }

    h1{
        text-align:center; 
        font-family: "Algerian"; 
    }

</style>
<body>
<div class="container">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 25rem;">
            <div class="card-body">
            <b><h1>Tambah Data</h1></b>
            <br><br>
            <form action="" method="post" enctype="multipart/form-data">
            <label for="gambar">Gambar: </label>
                <input type="file" class="form-control" name="gambar" id="gambar" size="35" required autocomplete="off">
                <br>
                <label for="nama">Nama: </label>
                <input type="text" class="form-control" name="nama" id="nama" size="35" required autocomplete="off"
                placeholder="Masukkan nama anda..." autofocus>
                <br>
                <label for="nis">NIS:  </label>
                <input type="text" class="form-control" name="nis" id="nis" size="35" required autocomplete="off"
                placeholder="Masukkan NIS anda...">
                <br>
                <label for="rombel">Rombel: </label>
                <input type="text" class="form-control" name="rombel" id="rombel" size="35" required autocomplete="off"
                placeholder="Masukkan rombel anda...">
                <br>
                <label for="rayon">Rayon: </label>
                <input type="text" class="form-control" name="rayon" id="rayon" size="35" required autocomplete="off"
                placeholder="Masukkan rayon anda...">
                <br>
                <label for="status">Status: </label>
                <input type="text" class="form-control" name="status" id="status" size="35" required autocomplete="off"
                placeholder="Masukkan status anda...">
                <br>
                <label for="hobi">Hobi: </label>
                <input type="text" class="form-control" name="hobi" id="hobi" size="35" required autocomplete="off"
                placeholder="Masukkan hobi anda...">
                <br>
                <label for="alamat">Alamat: </label>
                <input type="text" class="form-control" name="alamat" id="alamat" size="35" required autocomplete="off"
                placeholder="Masukkan alamat anda...">
                <br>
                <label for="merk_laptop"> Merek Laptop: </label>
                <input type="text" class="form-control" name="merk_laptop" id="merk_laptop" size="35" required autocomplete="off"
                placeholder="Masukkan merek laptop anda...">
                <br>
                <label for="cita_cita">Cita-cita: </label>
                <input type="text" class="form-control" name="cita_cita" id="cita_cita" size="35" required autocomplete="off"
                placeholder="Masukkan cita-cita anda...">
                <br>
                <button type="submit" class="btn btn-primary" name="submit">Kirim</button>
                <button class="btn btn-primary"><a href="index.php">Kembai ke tabel</a></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>