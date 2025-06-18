<!-- punya Dean -->
<?php
include '../includes/koneksi.php';

$id = $_GET['id'];

$result = $conn->query("SELECT gambar FROM menu WHERE id = $id");
$data = $result->fetch_assoc();
if ($data && $data['gambar']) {
    @unlink("../uploads/" . $data['gambar']);
}

$conn->query("DELETE FROM menu WHERE id = $id");

header("Location: ../admin/index.php");
exit;
