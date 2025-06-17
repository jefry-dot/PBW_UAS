<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><title>Tambah Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="container py-4">
<h1>Tambah Produk</h1>
<form action="save_add.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Harga (Rp)</label>
        <input type="number" name="price" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label>Gambar (jpg/png)</label>
        <input type="file" name="image" accept=".jpg,.jpeg,.png" class="form-control">
    </div>
    <button class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Batal</a>
</form>
</body>
</html>
