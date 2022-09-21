<?php
session_start();

if( !isset( $_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';


// ambil data di URL
$id = $_GET["id"];

//query data mahasiswa berdasarkan idnnya
$ssw = query("SELECT * FROM siswa WHERE id = $id")[0]; 
// var_dump($ssw);

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
    //cek apaah data berhasil ditambahkan atau tidak
    if( ubah($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Siswa</title>
</head>

<body>
    <h1>Ubah data siswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $ssw["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $ssw["gambar"]; ?>">
        <ul>
            <li>
                <label for="NIS">NIS : </label>
                <input type="text" name="NIS" id="NIS" required value="<?= $ssw["NIS"]; ?>">
            </li>
            <li>
                <label for="nama">NAMA : </label>
                <input type="text" name="nama" id="nama" value="<?= $ssw["nama"]; ?>">
            </li>
            <li>
                <label for="email">EMAIL : </label>
                <input type="text" name="email" id="email" value="<?= $ssw["email"]; ?>">
            </li>
            <li>
                <label for="jurusan">JURUSAN : </label>
                <input type="text" name="jurusan" id="jurusan" value="<?= $ssw["jurusan"]; ?>">
            </li>
            <li>
                <label for="gambar">GAMBAR : </label> <br>
                <img src="gambar/<?= $ssw['gambar']; ?>" width ="250"> <br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <br>
            <li>
                <button type="submit" name="submit">UBAH DATA!</button>
            </li>

        </ul>
</form>


</body>
</html>