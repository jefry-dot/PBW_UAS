<?php
include '../includes/koneksi.php';
$id = $_GET['id'] ?? null;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_menu'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $gambar = $data['gambar'];

    if ($_FILES['gambar']['error'] == 0) {
        $gambar = uniqid() . "_" . basename($_FILES["gambar"]["name"]);
        move_uploaded_file($_FILES["gambar"]["tmp_name"], "../uploads/" . $gambar);
    }

    $stmt = $conn->prepare("UPDATE menu SET nama_menu=?, deskripsi=?, harga=?, gambar=? WHERE id=?");
    $stmt->bind_param("ssdsi", $nama, $deskripsi, $harga, $gambar, $id);
    $stmt->execute();

    header("Location: ../admin/index.php");
    exit;
}
?>
