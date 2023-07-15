<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'limokoto';

$conn = new mysqli($host, $username, $password, $database);


if (!$conn) {
    die("Koneksi database gagal: " . $conn->connect_error);
}
?>

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
    <form action="Print.php" method="post">
        <div class="mb-3">
            <label for="nama" 
            class="form-label">Nama(wajib) :</label>
            <input type="text" 
            class="form-control" 
            id="nama" 
            name="nama" 
            placeholder="Input Nama" 
            autocomplete="off"
            required>
        </div>
        <div class="mb-3">
            <label for="tempat_lahir" 
            class="form-label">Tempat Lahir(wajib) :</label>
            <input type="text" 
            class="form-control" 
            id="tempat_lahir" 
            name="tempat_lahir" 
            placeholder="Input Tempat Lahir" 
            autocomplete="off"
            required>
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir" 
            class="form-label">Tanggal Lahir(wajib) :</label>
            <input type="text" 
            class="form-control" 
            id="tanggal_lahir" 
            name="tanggal_lahir" 
            placeholder="Input tanggal Lahir" 
            autocomplete="off"
            required>
        </div>
        <div class="mb-3">
            <label for="jenis_kelamin" 
            class="form-label">Jenis Kelamin(wajib) :</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                <label class="form-check-label" for="flexRadioDefault1">
                    Pria
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                    Wanita
                </label>
            </div>
        </div>
        <div class="mb-3">
            <label for="agama" 
            class="form-label">Agama(wajib) :</label>
            <input type="text" 
            class="form-control" 
            id="agama" 
            name="agama" 
            placeholder="Input agama" 
            autocomplete="off"
            required>
        </div>
        <div class="mb-3">
            <label for="pekerjaan" 
            class="form-label">Pekerjaan(wajib) :</label>
            <input type="text" 
            class="form-control" 
            id="pekerjaan" 
            name="pekerjaan" 
            placeholder="Input pekerjaan" 
            autocomplete="off"
            required>
        </div>
        <div class="mb-3">
            <label for="pbb" 
            class="form-label">PBB(wajib) :</label>
            <div class="form-check">
                <input class="form-check-input2" type="radio" name="flexRadioDefault2" id="flexRadioDefault3" checked>
                <label class="form-check-label2" for="flexRadioDefault3">
                    Sudah Bayar
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input2" type="radio" name="flexRadioDefault2" id="flexRadioDefault4">
                <label class="form-check-label2" for="flexRadioDefault4">
                    Belum Bayar
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input2" type="radio" name="flexRadioDefault2" id="flexRadioDefault5">
                <label class="form-check-label2" for="flexRadioDefault5">
                    Bebas Pajak
                </label>
            </div>
        </div>
        <div class="mb-3">
            <label for="Alasan" 
            class="form-label">Alasan(wajib) :</label>
            <input type="text" 
            class="form-control" 
            id="Alasan" 
            name="Alasan" 
            placeholder="Input Alasan" 
            autocomplete="off"
            required>
        </div>
        <div>
            <button type="submit" class="button">Submit</button> | <a href="Print.php" target="_blank">print</a>
        </div>
    </form>
</div>
