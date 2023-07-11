<?php
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['namaUser'];
    $nip = $_POST['nipUser'];
    $alasan = $_POST['alasanUser'];

    // Buat konten surat dalam variabel $surat
    $surat = "
    <h2>Surat Permohonan</h2>

    <p>Yang bertanda tangan di bawah ini:</p>
    <p>Nama: $nama</p>
    <p>NIP: $nip</p>

    <p>Dengan ini mengajukan permohonan dengan alasan sebagai berikut:</p>
    <p>$alasan</p>";

    // Buat objek Dompdf
    $dompdf = new Dompdf();

    // Atur konten surat
    $dompdf->loadHtml($surat);

    // Render surat menjadi PDF
    $dompdf->render();

    // Tampilkan preview surat
    $dompdf->stream("surat.pdf", array("Attachment" => false));
} else {
    echo "<p>Data tidak tersedia.</p>";
}
?>
