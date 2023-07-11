<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lima Koto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .print {
            display: none;
        }
        @media print {
            .print {
                display: inline;
            }
            .button {
                display: none;
            }
        }
    </style>
  </head>
  <body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil data yang dikirim melalui formulir
        $nama = $_POST['namaUser'];
        $nip = $_POST['nipUser'];
        $alasan = $_POST['alasanUser'];

        // Lakukan validasi data jika diperlukan

        // Simpan data ke dalam database atau lakukan operasi lain yang diinginkan
        // ...

        // Buat konten surat dalam variabel $surat
        $surat = "
        <h2>Data berhasil disimpan:</h2>
        <p>Nama: $nama</p>
        <p>NIP: $nip</p>
        <p>Alasan: $alasan</p>";

        // Simpan konten surat dalam file
        $file = fopen('surat.html', 'w');
        fwrite($file, $surat);
        fclose($file);
    }
    ?>

<div class="container">
    <form action="surat.php" method="post">
        <div class="mb-3">
            <label for="namaUser" 
            class="form-label">Nama :</label>
            <input type="text" 
            class="form-control" 
            id="namaUser" 
            name="namaUser" 
            placeholder="Input Nama" 
            autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="nipUser" 
            class="form-label">NIP :</label>
            <input type="number" 
            class="form-control" 
            id="nipUser" 
            name="nipUser" 
            placeholder="Input NIP" 
            autocomplete="off">
        </div>
        <div class="mb-3">
            <label for="alasanUser" 
            class="form-label">Alasan :</label>
            <input type="text" 
            class="form-control" 
            id="alasanUser" 
            
            name="alasanUser" 
            placeholder="Input Alasan" autocomplete="off">
        </div>
        <div>
            <button type="submit" class="button">Submit</button>
        </div>
    </form>
</div>
