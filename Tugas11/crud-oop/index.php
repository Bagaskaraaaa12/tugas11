<?php
require_once 'classes/Mahasiswa.php';
require_once 'config/Database.php';

$db = new Database();
$mhs = new Mahasiswa($db->getConnection());
$data = $mhs->readAll();
if(isset($_COOKIE['success'])) {
    echo "<script>alert('Berhasil: " . $_COOKIE['success'] . "Data')</script>";
}
?>
<html><body>
    <h2>Data Mahasiswa</h2>
    <a href="tambah.php">Tambah Data</a><br><br>
    <table border="1" cellpadding="8">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = $data->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['nim']; ?></td>
            <td><?php echo $row['jurusan']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
                <a href="hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body></html>