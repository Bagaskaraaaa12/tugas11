<?php
require_once 'config/Database.php';
require_once 'classes/Mahasiswa.php';

$database = new Database();
$db = $database->getConnection();

$mhs = new Mahasiswa($db);
$mhs->id = $_GET['id'];

if($mhs->delete()) {
    setcookie("success", "hapus", time() + 1);
    header("Location: index.php");
    exit();
    
}