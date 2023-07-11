<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Pengisian Surat - Permohonan Surat</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <style>
    .card {
      height: 200px;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Web Permohonan Surat Nagari Limo Koto</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>
  <div class="container">
    <h1>Form Pengisian Surat</h1>
    <!-- Tampilkan form user.php di dalam dashboard -->
    <?php
    // Cek apakah ada data yang dikirimkan melalui metode POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Tangkap data yang dikirimkan melalui form
      $namaUser = $_POST['namaUser'];
      $nipUser = $_POST['nipUser'];
      $alasanUser = $_POST['alasanUser'];

      // Tampilkan data di halaman
      echo "<h2>Data yang dikirimkan:</h2>";
      echo "<p>Nama: $namaUser</p>";
      echo "<p>NIP: $nipUser</p>";
      echo "<p>Alasan: $alasanUser</p>";
    } else {
      include('user.php');
    }
    ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-"></script>
</body>
</html>
