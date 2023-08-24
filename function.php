<?php 

$conn = mysqli_connect("localhost", "root", "", "db_erwin1");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $wadah = [];
    while($data = mysqli_fetch_assoc($result)){
        $wadah[] = $data;
    }
    return $wadah;
}

function ubah($change){
    global $conn;
    $id = $change["id"];
    $gambarlama=htmlspecialchars($change["gambarlama"]);
    // cek apakah user pilih gambar baru atau tidak
    if($_FILES['gambar']['error']=== 4){
        $gambar = $gambarlama;
    }else{
        $gambar= upload();
    }
    $nama=htmlspecialchars($change["nama"]);
    $nis=htmlspecialchars($change["nis"]);
    $rombel=htmlspecialchars($change["rombel"]);
    $rayon=htmlspecialchars($change["rayon"]);
    $status=htmlspecialchars($change["status"]);
    $hobi=htmlspecialchars($change["hobi"]);
    $alamat=htmlspecialchars($change["alamat"]);
    $merk_laptop=htmlspecialchars($change["merk_laptop"]);
    $cita_cita=htmlspecialchars($change["cita_cita"]);

    $query="UPDATE students SET 
    gambar='$gambar',
    nama='$nama',
    nis='$nis',
    rombel='$rombel',
    rayon='$rayon',
    status='$status',
    hobi='$hobi',
    alamat='$alamat',
    merk_laptop='$merk_laptop',
    cita_cita='$cita_cita'
    WHERE id = $id ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM students WHERE id= $id");
    return mysqli_affected_rows($conn); 
}

function input($send){
    global $conn;
    //upload gambar
    $gambar= upload();
    if($gambar ===false){
        return false; 
    }
    $nama=htmlspecialchars($send["nama"]);
    $nis=htmlspecialchars($send["nis"]);
    $rombel=htmlspecialchars($send["rombel"]);
    $rayon=htmlspecialchars($send["rayon"]);
    $status=htmlspecialchars($send["status"]);
    $hobi=htmlspecialchars($send["hobi"]);
    $alamat=htmlspecialchars($send["alamat"]);
    $merk_laptop=htmlspecialchars($send["merk_laptop"]);
    $cita_cita=htmlspecialchars($send["cita_cita"]);

    $query="INSERT INTO students VALUES('', '$gambar', '$nama', '$nis', '$rombel', '$rayon', '$status', '$hobi', 
    '$alamat', '$merk_laptop', '$cita_cita')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload(){
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile= $_FILES['gambar']['size'];
    $error= $_FILES['gambar']['error'];
    $tmpname= $_FILES['gambar']['tmp_name'];

    //cek apakah ada gambar yg diupload

    if($error === 4){
        echo "<script>
                alert('Silahkan pilih gambar terlebih dahulu!');
              </script>";
            
        return false;
    }

    // cek apakah yg diupload gambar

    $cekfile = ['jpg', 'jpeg', 'png', 'jfif'];
    $cek = explode('.', $namafile);
    $cek = strtolower(end($cek));
    if(!in_array($cek, $cekfile)){
        echo "<script>
                alert('Yang anda upload bukan file gambar!');
              </script>";
              return false;
    }

    // cek jika ukuran terlalu besar
    if ($ukuranfile > 10000000){
        echo "<script>
        alert('Ukuran gambar terlalu besar!');
      </script>";
      return false;
}

// lolos pengecekan, gambar siap diupload
// generate nama gambar baru
$namafilebaru= uniqid();
$namafilebaru .= '.';
$namafilebaru .= $cek;


move_uploaded_file($tmpname , 'img/' . $namafilebaru);
return $namafilebaru;
}

function cari($keyword){
    $query = "SELECT * FROM students
                WHERE
            nama LIKE '%$keyword%' OR
            nis  LIKE '%$keyword%' OR
            rombel LIKE '%$keyword%' OR
            rayon LIKE '%$keyword%' OR
            status LIKE '%$keyword%'

            ";

        return query($query);
}

function registrasi($data){
        global $conn;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn,$data["password2"]);

        // cek username udah ada atau belom
       $result=  mysqli_query($conn, "SELECT username  FROM users WHERE username = '$username'");

        if(mysqli_fetch_assoc($result)){
            echo "<script>
            alert('Username yang anda pilih sudah ada!');
          </script>";
          return false;
        }
        // cek konfirmasi password
        if($password !== $password2){
            echo "<script>
                    alert('konfirmasi password tidak sesuai');
                  </script>";

                  return false;
        }

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // tambahkan ke database
        mysqli_query($conn, "INSERT INTO users VALUES('', '$username', '$password' )");
        return mysqli_affected_rows($conn);
}


?>