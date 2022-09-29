<?php
session_start();

if( !isset( $_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

$GLOBALS['TitleName'] = 'Latihan TB Siswa';
require 'header.php';
require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {

    //cek apaah data berhasil ditambahkan atau tidak
    if( tambah($_POST) > 0 ) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan!');
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
    <title>Tambah Data Siswa</title>
</head>

<body>
    <h1>Tambah data siswa</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <p>
                <label for="NIS">NIS : </label>
                <input type="text" name="NIS" id="NIS" required>
                <br><br>
            </p>
            <p>
                <label for="nama">NAMA : </label>
                <input type="text" name="nama" id="nama" required>
                <br><br>
            </p>
            <p>
                <label for="email">EMAIL : </label>
                <input type="text" name="email" id="email" required>
                <br><br>
            </p>
            <p>
                <label for="jurusan">JURUSAN : </label>
                <input type="text" name="jurusan" id="jurusan" required>
                <br><br>
            </p>
            <p>
                <label for="gambar">GAMBAR : </label>
                <input type="file" name="gambar" id="gambar" required>
            </p>
            <p>
                <button type="submit" name="submit">TAMBAH DATA!</button>
            </p>

        </ul>
</form>


</body>
</html>