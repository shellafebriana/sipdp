<?php
include '../koneksi.php';
include '../../vendor/autoload.php';
$dari = $_GET['tgl-awal'];
$sampai = $_GET['tgl-akhir'];

use PhpOffice\PhpSpreadsheet\Spreadsheet;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// set default style
$spreadsheet->getDefaultStyle()
    ->getFont()
    ->setName('Arial')
    ->setSize(12);

// set heading
$sheet->setCellValue('A2', 'LAPORAN PENGGUNAAN DANA PROYEK');
$sheet->setCellValue('A3', 'PT CIPTA KARYA BAGUS');
$sheet->setCellValue('A4', 'PERIODE ' . tgl_indo($dari) . ' s/d ' . tgl_indo($sampai));
$sheet->getStyle('A1:A4')->getFont()->setBold(true);



// set thead
$sheet->setCellValue('A6', 'NO')
    ->setCellValue('B6', 'NAMA PROYEK')
    ->setCellValue('C6', 'JENIS')
    ->setCellValue('D6', 'KODE')
    ->setCellValue('E6', 'URAIAN NOTA')
    ->setCellValue('F6', 'UNIT')
    ->setCellValue('G6', 'SATUAN')
    ->setCellValue('H6', 'KETERANGAN')
    ->setCellValue('I6', 'PEKERJAAN')
    ->setCellValue('J6', 'HARGA SATUAN')
    ->setCellValue('K6', 'BIAYA PENGELUARAN');
$sheet->getStyle('A6:K6')->getFont()->setBold(true);
$sheet->getStyle('J')->getNumberFormat()->setFormatCode('_("$"* #,##0.00_);_("$"* \(#,##0.00\);_("$"* "-"??_);_(@_)');
$sheet->getStyle('K')->getNumberFormat()->setFormatCode('_("$"* #,##0.00_);_("$"* \(#,##0.00\);_("$"* "-"??_);_(@_)');


// set data
$sql = "SELECT * FROM nota JOIN nota_proyek ON nota_proyek.id_nota = nota.id_nota JOIN proyek ON nota_proyek.id_proyek = proyek.id_proyek JOIN kategori_nota ON kategori_nota.id_kategori = nota.id_kategori JOIN kode ON kode.id_kode = nota.id_kode WHERE nota.tgl BETWEEN '" . $dari . "' AND '" . $sampai . "' group by nota.id_nota,nm_kegiatan";
$i = 7;
$no = 1;
$total = 0;
$sisa = 0;
$subsisa = 0;
$data = mysqli_query($koneksi, $sql);
while ($p = mysqli_fetch_array($data)) {
    $sheet->setCellValue('A' . $i, $no++)
        ->setCellValue('B' . $i, $p['nm_kegiatan'])
        ->setCellValue('C' . $i, $p['nm_kategori'])
        ->setCellValue('D' . $i, $p['nm_kode'])
        ->setCellValue('E' . $i, $p['uraian'])
        ->setCellValue('F' . $i, $p['unit'])
        ->setCellValue('G' . $i, $p['satuan'])
        ->setCellValue('H' . $i, $p['keterangan'])
        ->setCellValue('I' . $i, $p['pekerjaan'])
        ->setCellValue('J' . $i, $p['harga_satuan'])
        ->setCellValue('K' . $i, $p['biaya_pengeluaran']);
    $total += $p['biaya_pengeluaran'];
    $i++;
};
$dana = mysqli_fetch_array(mysqli_query($koneksi, "SELECT sum(nilai_kontrak) as dana FROM proyek WHERE waktu_pelaksanaan BETWEEN '" . $dari . "' AND '" . $sampai . "'"));
$sisa = $dana['dana'] - $total;

// set auto filter
$firstRow = 6;
$lastRow = $i - 1;
$sheet->setAutoFilter('A' . $firstRow . ':K' . $lastRow);

// make auto sum
$sheet->setCellValue('A' . $i, 'Total Pengeluaran');
$sheet->setCellValue('K' . $i, '=SUBTOTAL(9,K7:K' . $lastRow . ')');
$sheet->getStyle('A' . $i . ':K' . $i)->getFont()->setBold(true);

// sisa
$s = $i + 1;
$sheet->setCellValue('A' . $s, 'Sisa Dana dari Keseluruhan Proyek');
$sheet->setCellValue('K' . $s, $sisa);
$sheet->getStyle('A' . $s . ':K' . $s)->getFont()->setBold(true);
// set style border
$style = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ]
];
$sheet->getStyle('A6:K' . $i)->applyFromArray($style);

// make header and auto download 
$filename = 'LPDP ' . tgl_indo($dari) . '-' . tgl_indo($sampai);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
header('Cache-Control: max-age=0');
$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
