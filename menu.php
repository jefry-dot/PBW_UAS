<?php
require 'includes/koneksi.php';



$result = $conn->query("SELECT * FROM menu ORDER BY id DESC");

?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Menu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .menu-card img {
      width: 100%;
      height: 220px;
      object-fit: cover;
    }
  </style>
</head>
<body>

<?php include 'includes/nav.php'; ?>

<div class="container py-5">
  <div class="text-center mb-5">
    <h1 class="display-5 fw-bold">Our Menu</h1>
    <p class="lead text-muted">We consider all the drivers of change give you the components<br>you need to change to a truly</p>
  </div>

  <div class="mb-4 text-center">
    <input type="text" id="search-input" placeholder="Cari menu..." class="form-control w-50 mx-auto rounded-pill shadow-sm">
  </div>

  <div class="d-flex justify-content-center gap-2 mb-5 flex-wrap">
    <button class="btn btn-danger filter-btn text-white" data-filter="all">All</button>
    <button class="btn btn-outline-danger filter-btn" data-filter="Makanan">Makanan</button>
    <button class="btn btn-outline-danger filter-btn" data-filter="Minuman">Minuman</button>
    <button class="btn btn-outline-danger filter-btn" data-filter="Snack">Snack</button>
  </div>

  <div class="row" id="menu-container">
    <?php while ($menu = $result->fetch_assoc()): ?>
      <div class="col-md-3 mb-4 menu-item" data-category="Makanan">
        <div class="card h-100 shadow menu-card">
        <img src="uploads/<?= htmlspecialchars($menu['gambar']) ?>" class="card-img-top" alt="<?= htmlspecialchars($menu['nama_menu']) ?>">

          <div class="card-body text-center">
            <h5 class="card-title"><?= htmlspecialchars($menu['nama_menu']) ?></h5>
            <p class="text-muted"><?= htmlspecialchars($menu['deskripsi']) ?></p>
            <p class="text-danger fw-bold">Rp <?= number_format($menu['harga'], 0, ',', '.') ?></p>
            <button onclick="addToCart(<?= $menu['id'] ?>, '<?= addslashes($menu['nama_menu']) ?>', <?= $menu['harga'] ?>)" class="btn btn-success">Tambah ke Keranjang</button>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>

  <!-- Tombol Keranjang -->
<div class="position-fixed bottom-0 end-0 m-4">
  <button onclick="showCart()" class="btn btn-danger rounded-pill shadow">
    🛒 Lihat Keranjang (<span id="cart-count">0</span>)
  </button>
</div>

<!-- Modal Keranjang -->
<div id="cart-modal" class="d-none position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex justify-content-center align-items-center">
  <div class="bg-white p-4 rounded shadow" style="max-width: 500px; width: 100%;">
    <h5>Keranjang Anda</h5>
    <ul id="cart-list" class="list-unstyled"></ul>
    <p>Total: Rp <span id="cart-total">0</span></p>
    <div class="d-flex justify-content-end gap-2">
      <button class="btn btn-success" onclick="sendToWhatsapp()">Pesan via WA</button>
      <button class="btn btn-secondary" onclick="hideCart()">Tutup</button>
    </div>
  </div>
</div>

</div>

<!-- Sisanya (JS keranjang, modal, dsb) sama seperti jawaban sebelumnya -->
<?php include 'includes/footer.php'; ?>


<script>
let cart = JSON.parse(localStorage.getItem("cart")) || [];

function addToCart(id, name, price) {
  const existing = cart.find(item => item.id === id);
  if (existing) {
    existing.qty += 1;
  } else {
    cart.push({ id, name, price, qty: 1 });
  }
  localStorage.setItem("cart", JSON.stringify(cart));
  updateCartCount();
  alert("Ditambahkan ke keranjang");
}

function updateCartCount() {
  const total = cart.reduce((sum, item) => sum + item.qty, 0);
  document.getElementById("cart-count").innerText = total;
}

function showCart() {
  document.getElementById("cart-modal").classList.remove("d-none");
  const list = document.getElementById("cart-list");
  list.innerHTML = "";
  let total = 0;

  cart.forEach((item, index) => {
    total += item.price * item.qty;
    list.innerHTML += `
      <li class="d-flex justify-content-between border-bottom py-1">
        <span>${item.name} x${item.qty}</span>
        <div>
          <button class="btn btn-sm btn-danger me-1" onclick="decreaseQty(${index})">−</button>
          <button class="btn btn-sm btn-success me-1" onclick="increaseQty(${index})">+</button>
          <button class="btn btn-sm btn-outline-danger" onclick="removeItem(${index})">❌</button>
        </div>
      </li>`;
  });

  document.getElementById("cart-total").innerText = total.toLocaleString();
}

function hideCart() {
  document.getElementById("cart-modal").classList.add("d-none");
}

function increaseQty(index) {
  cart[index].qty++;
  localStorage.setItem("cart", JSON.stringify(cart));
  showCart();
  updateCartCount();
}

function decreaseQty(index) {
  if (--cart[index].qty <= 0) cart.splice(index, 1);
  localStorage.setItem("cart", JSON.stringify(cart));
  showCart();
  updateCartCount();
}

function removeItem(index) {
  cart.splice(index, 1);
  localStorage.setItem("cart", JSON.stringify(cart));
  showCart();
  updateCartCount();
}

function sendToWhatsapp() {
  if (cart.length === 0) return alert("Keranjang kosong");

  const pesan = cart.map(item => `- ${item.name} x${item.qty} (Rp ${item.price * item.qty})`).join('%0A');
  const total = cart.reduce((sum, item) => sum + item.price * item.qty, 0);
  const fullMsg = `Halo, saya ingin memesan:%0A${pesan}%0A%0ATotal: Rp ${total.toLocaleString()}`;

  window.open(`https://wa.me/6281295934058?text=${fullMsg}`, '_blank');
}

// Filter dan Search
document.addEventListener("DOMContentLoaded", function () {
  updateCartCount();

  document.querySelectorAll(".filter-btn").forEach(btn => {
    btn.addEventListener("click", () => {
      const filter = btn.getAttribute("data-filter");
      document.querySelectorAll(".menu-item").forEach(item => {
        const cat = item.getAttribute("data-category");
        item.style.display = (filter === "all" || cat === filter) ? "block" : "none";
      });
    });
  });

  document.getElementById("search-input").addEventListener("input", function () {
    const keyword = this.value.toLowerCase();
    document.querySelectorAll(".menu-item").forEach(item => {
      const name = item.querySelector(".card-title").innerText.toLowerCase();
      const desc = item.querySelector(".text-muted").innerText.toLowerCase();
      item.style.display = (name.includes(keyword) || desc.includes(keyword)) ? "block" : "none";
    });
  });
});


document.querySelectorAll(".filter-btn").forEach(btn => {
  btn.addEventListener("click", () => {
    const filter = btn.getAttribute("data-filter");

    // Tampilkan/hidden item sesuai filter
    document.querySelectorAll(".menu-item").forEach(item => {
      const cat = item.getAttribute("data-category");
      item.style.display = (filter === "all" || cat === filter) ? "block" : "none";
    });

    // Reset semua tombol ke default
    document.querySelectorAll(".filter-btn").forEach(b => {
      b.classList.remove("btn-danger", "text-white");
      b.classList.add("btn-outline-danger");
    });

    // Aktifkan tombol yang diklik
    btn.classList.remove("btn-outline-danger");
    btn.classList.add("btn-danger", "text-white");
  });
});

</script>

</body>
</html>
