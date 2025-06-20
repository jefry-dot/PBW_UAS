<!-- punya Dean -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nasi Ayam Bu Ella</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .bg-cover {
      background-size: cover;
      background-position: center;
    }
    .min-vh-100 {
      min-height: 100vh;
    }
    .menu-card img {
      width: 80px;
      height: 80px;
      object-fit: contain;
    }
  </style>
</head>
<body class="font-sans">



 <?php include 'includes/nav.php'; ?>


  <header class="d-flex align-items-center justify-content-center text-center py-5 bg-cover min-vh-100" style="background-image: url('public/logo1.png');">
    <div class="bg-white bg-opacity-75 p-4 p-md-5 rounded shadow" style="max-width: 90%;">
      <h1 class="display-5 fw-bold text-dark">Gurih, Lezat, Bikin Ketagihan!</h1>
      <p class="lead text-secondary">Pilih menu kalian, dijamin puas dan harga pasti</p>
      <a href="menu.php" class="btn btn-outline-dark rounded-pill mt-3">Explore Menu</a>
    </div>
  </header>


  <section class="py-5 bg-light text-center">
    <div class="container">
      <h2>Tentang Kami</h2>
      <p>Kami menyajikan makanan rumahan terbaik untuk Anda.</p>
    </div>
  </section>
    

  <section class="py-5 bg-white">
    <div class="container">
      <div class="text-center mb-5">
        <h3 class="fw-bold">Jelajahi Menu Lezat Kami</h3>
        <p class="text-muted">Setiap hidangan dibuat dengan bahan pilihan dan bumbu rahasia</p>
        <div class="mx-auto bg-warning rounded-pill" style="width: 100px; height: 5px;"></div>
      </div>

      <div class="row g-4">

        <div class="col-sm-6 col-lg-3">
          <div class="card h-100 shadow menu-card">
            <div class="card-body text-center">
              <div class="position-relative mb-3">
                <div class="bg-warning rounded-circle d-inline-flex align-items-center justify-content-center p-3">
                  <img src="public/makanan.png" alt="Makanan">
                </div>
                <span class="position-absolute top-0 end-0 badge bg-warning text-dark">Best Seller!</span>
              </div>
              <h5 class="card-title">Paket Nasi Ayam</h5>
              <p class="card-text">Varian bumbu pilihan dengan nasi hangat + lalapan segar</p>
              <a href="menu.php" class="btn btn-warning text-white rounded-pill">Lihat Menu</a>
            </div>
          </div>
        </div>


        <div class="col-sm-6 col-lg-3">
          <div class="card h-100 shadow menu-card">
            <div class="card-body text-center">
              <div class="mb-3">
                <div class="bg-primary bg-opacity-25 rounded-circle d-inline-flex align-items-center justify-content-center p-3">
                  <img src="public/mie.png" alt="Mie">
                </div>
              </div>
              <h5 class="card-title">Varian Mie Spesial</h5>
              <p class="card-text">Mie goreng/rebus dengan topping lengkap dan bumbu khas</p>
              <a href="menu.php" class="btn btn-primary text-white rounded-pill">🍜 Pilih Varian</a>
            </div>
          </div>
        </div>


        <div class="col-sm-6 col-lg-3">
          <div class="card h-100 shadow menu-card">
            <div class="card-body text-center">
              <div class="mb-3">
                <div class="bg-success bg-opacity-25 rounded-circle d-inline-flex align-items-center justify-content-center p-3">
                  <img src="public/minuman.png" alt="Minuman">
                </div>
              </div>
              <h5 class="card-title">Minuman Segar</h5>
              <p class="card-text">Pilihan minuman dingin/hangat untuk temani makan Anda</p>
              <a href="menu.php" class="btn btn-success text-white rounded-pill">🥤 Pesan Sekarang</a>
            </div>
          </div>
        </div>


        <div class="col-sm-6 col-lg-3">
          <div class="card h-100 shadow menu-card">
            <div class="card-body text-center">
              <div class="mb-3">
                <div class="bg-danger bg-opacity-25 rounded-circle d-inline-flex align-items-center justify-content-center p-3">
                  <img src="public/lauk.png" alt="Lauk">
                </div>
              </div>
              <h5 class="card-title">Lauk Pendamping</h5>
              <p class="card-text">Aneka gorengan renyah dan lauk pauk lengkap</p>
              <a href="menu.php" class="btn btn-danger text-white rounded-pill">🍴 Tambahkan Lauk</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>





 <?php include 'includes/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
