<?php 

require "function.php";
$id=$_GET["id"];
$student = query("SELECT * FROM students WHERE id=$id")[0];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>
    .card{
        margin-left:520px;
        margin-top:40px;
        border:3px solid blue;
        background-color:#20262E;
        color:#ffff;
        height:630px;
        font-family:"Arial Narrow";
        text-align:left;
    }

    body{
        background: url(img/bccard.jpg)no-repeat;
        background-size:cover;
    }

    button a{
        text-decoration: none;
        color:#ffff;
    }

    button {
        background-color:#B9F3E4;
        width:200px;
        margin-bottom:10px;
        margin-left:20px;
       
    }

    img{
        border-radius: 50%;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border:solid white;
    }

    h5{
        font-style:italic;
    }
</style>
<body>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5>Profil <br> <?= $student["nama"]?></h5>
                <tr>
                    <td><img src="img/<?= $student["gambar"];?>"width="250" height="250"></td>
                    <br>
                    <b><td>Nama: <?= $student["nama"]?></td></b>
                    <br>
                    <b><td>NIS: <?= $student["nis"]?></td></b>
                    <br>
                    <b><td>Rombel: <?= $student["rombel"]?></td></b>
                    <br>
                    <b><td>Rayon: <?= $student["rayon"]?></td></b>
                    <br>
                    <b><td>Status: <?= $student["status"]?></td></b>
                    <br>
                    <b><td>Hobi: <?= $student["hobi"]?></td></b>
                    <br>
                    <b><td>Alamat: <?= $student["alamat"]?></td></b>
                    <br>
                    <b><td>Merek Laptop: <?= $student["merk_laptop"]?></td></b>
                    <br>
                    <b><td>Cita-cita: <?= $student["cita_cita"]?></td></b>
                    <br>
    <button class="btn btn-primary" width="20"><a href="input.php">Kembali ke input data</a></button>
    <button class="btn btn-primary"><a href="index.php">Kembali ke tabel</a></button>
                </tr>
</div>
</body>
</html>