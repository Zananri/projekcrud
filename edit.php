<?php 
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require "function.php";

$id = $_GET["id"];
$student = query ("SELECT * FROM students WHERE id = $id")[0];

if (isset ($_POST["ubah"])){
    if (ubah($_POST)  >0 ){
        echo "<script>
                alert('data berhasil diubah');
                document.location.href = 'index.php';
                </script>";

    }else {
        echo "<script>
                alert('data gagal diubah');
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
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>
    .card{
        margin-top:7px;
        border:3px solid grey;
        background-color:rgba(0, 0, 0, 0.5);
    }

    body{
        background: url(img/817.jpg)no-repeat;
        background-size:cover;
    }

    label{
        color:#ffff;
    }

    button a{
        color:#ffff;
        text-decoration:none;
    }
</style>
<body>
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 25rem;">
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="nama" value= "<?= $student["id"];?>">
                    <input type="hidden" name="gambarlama" value= "<?= $student["gambar"];?>"required autocomplete="off">
                    <label for="gambar">Gambar</label>
                    <br>
                    <img src="img/<?= $student["gambar"];?>" width="40"><br>
                    <input type="file" name="gambar" id="gambar">
                    <br>
                    <label for="">Nama</label>
                    <br>
                    <input type="text" name="nama" id="nama" value= "<?= $student["nama"];?>"required autocomplete="off">
                    <br>
                    <label for="">NIS</label>
                    <br>
                    <input type="text" name="nis" id="nis" value="<?= $student["nis"];?>"required autocomplete="off">
                    <br>
                    <label for="">Rombel</label>
                    <br>
                    <input type="text" name="rombel" id="rombel" value="<?= $student["rombel"];?>"required autocomplete="off">
                    <br>
                    <label for="">Rayon</label>
                    <br>
                    <input type="text" name="rayon" id="rayon" value="<?= $student["rayon"];?>"required autocomplete="off">
                    <br>
                    <label for="">Status</label>
                    <br>
                    <input type="text" name="status" id="status" value="<?= $student["status"];?>"required autocomplete="off">
                    <br>
                    <label for="">Hobi</label>
                    <br>
                    <input type="text" name="hobi" id="hobi" value="<?= $student["hobi"];?>"required autocomplete="off">
                    <br>
                    <label for="">Alamat</label>
                    <br>
                    <input type="text" name="alamat" id="alamat" value="<?= $student["alamat"];?>"required autocomplete="off">
                    <br>
                    <label for="">Merek Laptop</label>
                    <br>
                    <input type="text" name="merk_laptop" id="merk_laptop" value="<?= $student["merk_laptop"];?>"required autocomplete="off">
                    <br>
                    <label for="">Cita-cita</label>
                    <br>
                    <input type="text" name="cita_cita" id="cita_cita" value="<?= $student["cita_cita"];?>"required autocomplete="off">
                    <br>
                    <br>
                    <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
                    <button type="submit" name="submit" class="btn btn-primary"><a href="index.php">Kembali</a></button>
                    </form>
                </div>
        </div>
    </div>
</div>
</body>
</html>