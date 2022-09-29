<?php
session_start();

if( !isset( $_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

$GLOBALS['TitleName'] = 'Latihan TB Siswa';
require 'header.php';
require 'functions.php';

// $jumlahDataPerHalaman = 2;
// $jumlahData= count(query("SELECT * FROM siswa"));
// $jumlahHalaman = 

//pagination
$siswa = query("SELECT * FROM siswa"); 
// LIMIT 0, $jumlahDataPerHalaman


//tombol cari ditekan
if ( isset($_POST["cari"]) ) {
    $siswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>
    <div class="container mt-5 mb-5">
        <h1 class="text-center">Daftar Siswa</h1>
        <h1 class="text-center">SMK Kristen Immanuel Pontianak</h1>

    <div class="form-group mt-5">
        <form action="" method="post" >
            <div class="row">
                <div class="input-group mb-2">
                    <input type="text" name="keyword" class="form-control" autofocus placeholder="Masukkan keyword pencaharian" autocomplete="off">
                    <button class="btn btn-info" type="submit" name="cari">Cari!</button>
                </div>
        </form>
    </div>

        <table class="table table-bordered text-center mt-2">
            <tr class="table-success">
                <th>No.</th>
                <th>Aksi</th>
                <th>Gambar</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach( $siswa as $row ) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a class="btn btn-warning" href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
                    <a class="btn btn-danger" href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin ga luwh dek?');">hapus</a>
                </td>
                <td><img src="Gambar/<?= $row["gambar"]; ?>" width="130"></td>
                <td><?= $row["NIS"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["jurusan"]; ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    <a class="btn btn-primary" href="tambah.php">Tambah data siswa</a>
    <br>
    <a class="btn btn-danger mt-3" href="logout.php">Logout</a>

    </div>

</body>
</html>
