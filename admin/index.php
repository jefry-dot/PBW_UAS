<?php
require 'config.php';
$result = $mysqli->query("SELECT * FROM products ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin | Warung Kopi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="container py-4">
    <h1>Daftar Produk</h1>
    <a href="form_add.php" class="btn btn-primary mb-3">+ Tambah Produk</a>

    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>#</th><th>Nama</th><th>Harga</th><th>Gambar</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; while($p = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($p['name']) ?></td>
                <td>Rp<?= number_format($p['price'],0,',','.') ?></td>
                <td>
                    <?php if (!empty($p['image']) && file_exists("uploads/" . $p['image'])): ?>
                        <img src="uploads/<?= $p['image'] ?>" width="50">
                    <?php else: ?>
                        <img src="default.jpg" width="50" alt="Gambar tidak ada">
                    <?php endif; ?>

                </td>
                <td>
                    <a href="form_edit.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="delete.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-danger"
                       onclick="return confirm('Hapus produk ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
