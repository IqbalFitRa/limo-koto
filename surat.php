<?php
require_once 'vendor/autoload.php';

use Dompdf\Dompdf;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['namaUser'];
    $nip = $_POST['nipUser'];
    $alasan = $_POST['alasanUser'];

    // Buat konten surat dalam variabel $surat
    $surat = "
    <h2>PEMERINTAHAN NAGARI LIMO KOTO
    KECAMATAN KOTO VII
    JORONG KOTO PANJANG
    </h2>
    <h3>Alamat: Jorong Koto Panjang
    ______________________________________________________________</h3>
    <h4>=REKOMENDASI=
    Nomor: 140/	/JR.KP-20…</h4>
    

    <p>Yang bertanda tangan dibawah ini :</p>
    <p>Nama			: ANGGI KURNIAWAN</p>
    <p>Jabatan		: KEPALA JORONG KOTO PANJANG</p>
    <p>Dengan ini menerangkan bahwa	 :</p>
    <p>Nama                 : $nama</p>
    <p>Tempat / Tgl.Lahir   :</p>
    <p>Jenis Kelamin        :Jenis Kelamin</p>
    <p>Agama	            :Agama	</p>
    <p>Pekerjaan            :Pekerjaan</p>
    <p>Nip                  :$nip</p>
    <p>PBB                  :alasan</p>
    

    <p>Nama tersebut diatas adalah benar-benar penduduk Jorong KOTO PANJANG Nagari Limo Koto, Kecamatan Koto VII, 
    Kabupaten Sijunjung, selanjutnya yang bersangkutan akan mengurus Surat-surat Ke Kantor Wali Nagari Limo Koto antara lain:</p>
    <p>Untuk Keperluan	
    Demikianlah Rekomendasi ini kepada yang bersangkutan  untuk dipergunakan menurut semestinya, sesuai dengan peraturan yang berlaku</p>
    
    <p>1.$alasan</p>		
    <p>2.</p>		
    <p>3.</p>	
    <p>4.</p>	
    
<p>Diberikan di Koto Panjang </p>          
<p>Pada Tanggal:………………..20… </p>
<p>KEPALA JORONG
KOTO PANJANG</p>"
;

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
