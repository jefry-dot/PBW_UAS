<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kontak</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .whatsapp-button svg {
      width: 24px;
      height: 24px;
      margin-right: 8px;
    }
  </style>
</head>
<body>

<?php include 'includes/nav.php'; ?>

<div class="d-flex align-items-center justify-content-center min-vh-100 bg-light">
  <div class="bg-white shadow rounded p-4 p-md-5 w-100" style="max-width: 500px;">
    <h2 class="text-center mb-3 text-dark">Hubungi Kami</h2>
    <p class="text-center text-muted mb-4">Jika ada pertanyaan, silakan hubungi kami melalui WhatsApp.</p>

    <div class="text-center">
      <a href="https://api.whatsapp.com/send?phone=6289510725490&text=Halo%20saya%20ingin%20bertanya"
         target="_blank"
         class="btn btn-success d-inline-flex align-items-center whatsapp-button shadow">
        <svg fill="currentColor" viewBox="0 0 24 24">
          <path fill-rule="evenodd" clip-rule="evenodd"
                d="M12.001 2C6.479 2 2 6.477 2 12c0 2.145.603 4.145 1.648 5.863L2 22l4.383-1.507A9.953 9.953 0 0012 22c5.523 0 10.001-4.477 10.001-10S17.523 2 12.001 2zm0 18a8 8 0 01-4.284-1.212l-.307-.196-2.6.897.898-2.52-.202-.314A7.987 7.987 0 014 12a8 8 0 1116 0 8.001 8.001 0 01-8 8zm4.171-6.029c-.235-.117-1.38-.68-1.594-.757s-.37-.118-.525.117-.6.757-.735.916c-.134.159-.27.179-.505.06-.235-.118-.993-.364-1.892-1.162-.699-.624-1.171-1.395-1.31-1.63-.138-.235-.015-.364.103-.48.106-.106.235-.277.354-.416s.159-.236.238-.395.04-.296-.02-.415c-.06-.118-.525-1.266-.72-1.732-.189-.451-.38-.39-.525-.397-.137-.007-.295-.009-.452-.009s-.415.06-.633.296-.831.81-.831 1.978.851 2.306.97 2.465c.118.159 1.673 2.552 4.059 3.579 1.889.828 2.204.746 2.599.7.395-.047 1.38-.56 1.575-1.1.195-.54.195-1.003.137-1.1-.06-.098-.219-.159-.454-.277z">
          </path>
        </svg>
        Chat via WhatsApp
      </a>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>
