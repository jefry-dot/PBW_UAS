<?php
include '../cek_login.php'; // Proteksi login
require '../includes/koneksi.php'; // Koneksi database

$result = $conn->query("SELECT * FROM menu ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin | Warung Kopi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container-fluid p-0">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid px-4">
    <a class="navbar-brand" href="#">Warung Kopi Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <span class="nav-link disabled text-white">
            Halo, <?= htmlspecialchars($_SESSION['nama']) ?>
          </span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" href="../logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Konten -->
<div class="container py-4">
    <h1 class="mb-4">Daftar Produk</h1>
    <a href="form_add.php" class="btn btn-primary mb-3">+ Tambah Produk</a>

    <table class="table table-bordered table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; while($p = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($p['nama_menu']) ?></td>
                <td>Rp<?= number_format($p['harga'], 0, ',', '.') ?></td>
                <td>
                    <?php if (!empty($p['gambar']) && file_exists("../uploads/" . $p['gambar'])): ?>
                        <img src="../uploads/<?= $p['gambar'] ?>" width="50" alt="Gambar">
                    <?php else: ?>
                        <img src="../uploads/default.jpg" width="50" alt="Tidak ada gambar">
                    <?php endif; ?>
                </td>
                <td>
                    <a href="form_edit.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="../proses/proses_hapus_menu.php?id=<?= $p['id'] ?>"
                       class="btn btn-sm btn-danger"
                       onclick="return confirm('Yakin ingin menghapus menu ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
