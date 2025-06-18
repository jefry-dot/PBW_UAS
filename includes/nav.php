<!-- nav.php -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top shadow-sm">
  <div class="container">
    <!-- Logo dan Brand -->
    <a class="navbar-brand d-flex align-items-center" href="/">
      <img src="logo.png" alt="Logo" class="me-2" style="width: 40px; height: 40px;">
      <strong>Nasi Ayam Bu Ella</strong>
    </a>

    <!-- Tombol toggle untuk mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu Navigasi -->
    <div class="collapse navbar-collapse" id="navbarMenu">
      <ul class="navbar-nav ms-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="menu.php">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="kontak.php">Contact</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Script: Smooth Scroll & Conditional Redirect -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const aboutLinks = document.querySelectorAll(".about-link");

    aboutLinks.forEach(link => {
      link.addEventListener("click", function (e) {
        const isHome = window.location.pathname === "/" || window.location.pathname === "/home";
        const aboutSection = document.querySelector("#about-section");

        if (isHome && aboutSection) {
          e.preventDefault();
          aboutSection.scrollIntoView({ behavior: "smooth", block: "start" });
        } else if (!isHome) {
          e.preventDefault();
          window.location.href = "/about";
        }
      });
    });
  });
</script>
