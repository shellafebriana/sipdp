<?php
require_once '../../vendor/autoload.php';
include '../koneksi.php';
$dari = $_GET['tgl-awal'];
$sampai = $_GET['tgl-akhir'];

// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

// Write some HTML code:
$html = '
<!DOCTYPE html>
<html>
<head>Laporan Penggunaan Dana Proyek</head>
<style>
body {
    margin: 0;
    font-family: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #000;
    text-align: left;
    background-color: #fff;
  }
  .table {
    width: 100%;
    margin-bottom: 1rem;
    color: #000;
  }
  
  .table th,
  .table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #e3e6f0;
  }
  
  .table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #e3e6f0;
  }
  
  .table tbody + tbody {
    border-top: 2px solid #e3e6f0;
  }
  
  .table-sm th,
  .table-sm td {
    padding: 0.3rem;
  }
  
  .table-bordered {
    border: 1px solid #e3e6f0;
  }
  
  .table-bordered th,
  .table-bordered td {
    border: 1px solid #e3e6f0;
  }
  
  .table-bordered thead th,
  .table-bordered thead td {
    border-bottom-width: 2px;
  }
  
  
</style>
<body>
    <div style="text-align: center">
        <h1>Laporan Penggunaan Dana Proyek</h1>
        <h3>PT Cipta Karya Bagus</h3>
        <hr>
        <h5>Periode ' . tgl_indo($dari) . ' s/d' . tgl_indo($sampai) . '</h5>
    </div>
    ';
$sqlp = "SELECT proyek.id_proyek, nm_kegiatan, waktu_pelaksanaan, nilai_kontrak FROM nota JOIN nota_proyek ON nota_proyek.id_nota = nota.id_nota JOIN proyek ON nota_proyek.id_proyek = proyek.id_proyek WHERE nota.tgl BETWEEN '" . $dari . "' AND '" . $sampai . "' group by  nm_kegiatan";
$total = 0;
$sisa = 0;
$data = mysqli_query($koneksi, $sqlp);
while ($p = mysqli_fetch_array($data)) {
    $html .= '
    <table>
        <tr>
            <td>
                Nama Proyek
            </td>
            <td>:</td>
            <td>' . $p['nm_kegiatan'] . '</td>
        </tr>
        <tr>
            <td>
                Waktu Pelaksanaan
            </td>
            <td>:</td>
            <td>' . tgl_indo($p['waktu_pelaksanaan']) . '</td>
        </tr>
        <tr>
            <td>
                Nilai Kontrak
            </td>
            <td>:</td>
            <td>' . rupiah($p['nilai_kontrak']) . '</td>
        </tr>
    </table>
    <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr class="thead">
                <th style="text-transform: uppercase;">No</th>
                <th style="text-transform: uppercase;">Jenis</th>
                <th style="text-transform: uppercase;">Kode</th>
                <th style="text-transform: uppercase;">Uraian Nota</th>
                <th style="text-transform: uppercase;">Unit</th>
                <th style="text-transform: uppercase;">Satuan</th>
                <th style="text-transform: uppercase;">Keterangan</th>
                <th style="text-transform: uppercase;">Pekerjaan</th>
                <th style="text-transform: uppercase;">Harga Satuan</th>
                <th style="text-transform: uppercase;">Biaya Pengeluaran</th>
            </tr>
        </thead>
        <tbody>';
    $no = 1;
    $subtotal = 0;
    $sqln = "SELECT * FROM nota JOIN nota_proyek ON nota_proyek.id_nota = nota.id_nota JOIN proyek ON nota_proyek.id_proyek = proyek.id_proyek JOIN kategori_nota ON kategori_nota.id_kategori = nota.id_kategori JOIN kode ON kode.id_kode = nota.id_kode WHERE nota_proyek.id_proyek = " . $p['id_proyek'] . " group by nota.id_nota, nm_kegiatan";
    $nota = mysqli_query($koneksi, $sqln);
    while ($n = mysqli_fetch_array($nota)) {
        $html .= '<tr>
        <td>' . $no++ . '</td>
        <td>' . $n['nm_kategori'] . '</td>
        <td>' . $n['nm_kode'] . '</td>
        <td>' . $n['uraian'] . '</td>
        <td>' . $n['unit'] . '</td>
        <td>' . $n['satuan'] . '</td>
        <td>' . $n['keterangan'] . '</td>
        <td>' . $n['pekerjaan'] . '</td>
        <td>' . rupiah($n['harga_satuan']) . '</td>
        <td>' . rupiah($n['biaya_pengeluaran']) . '</td>
    </tr>';
        $subtotal += $n['biaya_pengeluaran'];
        $subsisa = $n['nilai_kontrak'] - $subtotal;
    }
    $html .= '<tr>
        <td colspan="9" style="text-align: right; font-weight: bold; text-transform: uppercase;">Subtotal</td>
        <td style="font-weight: bold;">' . rupiah($subtotal) . '</td>
    </tr></tbody></table>';
    $total += $subtotal;
    $sisa += $subsisa;
}
$html .= '
<table class="table table-bordered" width="100%" cellspacing="0">
    <tr>
        <td colspan="9"  style="font-weight: bold; text-transform: uppercase;">Total Pengeluaran </td>
        <td style="font-weight: bold;text-align: right;">' . rupiah($total) . '</td>
    </tr>
    <tr>
        <td colspan="9"  style="font-weight: bold; text-transform: uppercase;">Sisa </td>
        <td style="font-weight: bold;text-align: right;">' . rupiah($sisa) . '</td>
    </tr>
</table>';
$html .= '</body>
</html>
';

$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output();
