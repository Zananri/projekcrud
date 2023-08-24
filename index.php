<?php 
session_start();
if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}


require "function.php";
$students = query("SELECT * FROM students");

//tombol cari ditekan
if(isset($_POST["cari"])){
    $students = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>

    table{
        text-align:center;
    }

    .satu{
        margin-top:20px;
        margin-left:240px;
    }

    thead{
        background-color:#3A98B9;
        border: solid black;
    }

     tr td {
        background-color:#B4E4FF;
    }

    button a{
        text-decoration: none;
        color:white;
    }

    body{
        background: url(img/bctabel.jpg)no-repeat;
        background-size:cover;
    }

    tr td a{
        text-decoration: none;
    }

    table thead tr th{
        font-family:"Times New Roman";
    }


    form input{
        background-color:#576CBC ;
        font-style:italic;
    }

    .cari2::-webkit-input-placeholder{
	color: #AD7BE9;
    }

    .cari1 button{
        background-color:#85CDFD;
    }

</style>
<body>
    <div class="satu">
        <div class="cari1">
        <form action="" method="post">
            <input class="cari2" type="text" name="keyword" size="37" autofocus 
            placeholder="Masukkan keyword pencarian..." autocomplete="off">
            <button type="submit" name="cari">Search</button>
        </form>
        </div>
        <br>
    <table border= "7" cellpadding= "10" cellspacing="0">
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Rombel</th>
                <th>Rayon</th>
                <th>Status</th>
                <th>Aksi</th>

            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?= $student["nama"]?></td>
                    <td><?= $student["nis"]?></td>
                    <td><?= $student["rombel"]?></td>
                    <td><?= $student["rayon"]?></td>
                    <td><?= $student["status"]?></td>
                    <td>
                        <button class="btn btn-primary"><a href="edit.php?id=<?php echo $student["id"]; ?>"onclick="return confirm('Apakah anda ingin menghubahnya?')">Ubah</a></button>
                        |
                        <button class="btn btn-primary"><a href="hapus.php?id=<?php echo $student["id"]; ?>"onclick="return confirm('Apakah anda ingin menghapusnya?')">Hapus</a></button>
                        |
                        <button class="btn btn-primary"><a href="lihat.php?id=<?php echo $student["id"];?>">Lihat</a></button>
                    </td>
                </tr>
                <?php $i++?>
                <?php endforeach;?>
        </tbody>
    </table>
    <br>
    <button class="btn btn-primary"><a href="input.php">Tambah Data</a></button>
    <button class="btn btn-primary"><a href="logout.php?id=<?php echo $student["id"]; ?>"onclick="return confirm('Apakah anda yakin ingin logout?')">Logout</a></button>
    </div>
</body>
</html>