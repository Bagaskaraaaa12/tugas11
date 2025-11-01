<?php
require_once 'config/Database.php';
require_once 'classes/Mahasiswa.php';

$database = new Database();
$db = $database->getConnection();
$mhs = new Mahasiswa($db);

if($_POST) {
    $mhs->nama = $_POST['nama'];
    $mhs->nim = $_POST['nim'];
    $mhs->jurusan = $_POST['jurusan'];

    if($mhs->create()) {
        setcookie("success", "tambah", time() + 1);
        header("Location: index.php");
        exit();
    } 
}
?>
<form method="POST">
    Nama: <input type="text" name="nama"><br>
    NIM: <input type="text" name="nim"><br>
    Jurusan: <input type="text" name="jurusan"><br>
    <button type="submit">Simpan</button>
</form>