<?php
include '../includes/koneksi.php';

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_menu'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    $gambar = null;
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $namaFile = basename($_FILES['gambar']['nama_file']);
        $targetPath = '../uploads/' . $namaFile;

        if (!is_dir('../uploads')) {
            mkdir('../uploads', 0755, true);
        }

        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetPath)) {
            $gambar = $namaFile;
        }
    }

    $stmt = $conn->prepare("INSERT INTO menu (nama_menu, deskripsi, harga, gambar) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $nama, $deskripsi, $harga, $gambar);
    $stmt->execute();

    header("Location: ../admin/index.php");
    exit;
}
?>