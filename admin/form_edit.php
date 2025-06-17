<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'config.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID tidak valid.");
}
$id = (int) $_GET['id'];

$result = $mysqli->query("SELECT * FROM products WHERE id = $id");
if (!$result || $result->num_rows === 0) {
    die("Data tidak ditemukan.");
}
$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
    <h1 class="mb-4">Edit Produk</h1>

    <form action="save_edit.php" method="post" enctype="multipart/form-data" class="border p-4 rounded shadow-sm">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">

        <div class="mb-3">
            <label class="form-label">Nama:</label>
            <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga:</label>
            <input type="number" name="price" value="<?= $product['price'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi:</label>
            <textarea name="description" class="form-control" rows="3"><?= htmlspecialchars($product['description']) ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar Baru:</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>

