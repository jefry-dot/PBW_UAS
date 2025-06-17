<?php
include '../includes/koneksi.php';
$id = $_GET['id'] ?? null;
if (!$id) {
    echo "ID menu tidak ditemukan.";
    exit;
}
$stmt = $conn->prepare("SELECT * FROM menu WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();
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

    <form action="../proses/proses_edit_menu.php" method="post" enctype="multipart/form-data" class="border p-4 rounded shadow-sm">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <div class="mb-3">
            <label class="form-label">Nama:</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($data['nama_menu']) ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga:</label>
            <input type="number" name="harga" value="<?= $data['harga'] ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi:</label>
            <textarea name="deskripsi" class="form-control" rows="3"><?= htmlspecialchars($data['deskripsi']) ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Gambar Baru:</label>
            <input type="file" name="gambar" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>

