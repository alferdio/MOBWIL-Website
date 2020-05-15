<?php
require_once 'tcpdf/tcpdf.php';
date_default_timezone_set('Asia/Jakarta');
$tgl_sekarang = date("d F Y");

class PDF extends TCPDF
{
  public function Header()
  { }
}
$pdf = new PDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 10);
$pdf->SetY(30);
$isi = "<table>
                <tr>
                    <td align=\"center\"><h1 style=\"font-size: 18px;\">LAPORAN MOBWIL</h1></td>
                </tr>
            </table>
            <br><hr>
            <p>Tanggal : " . $tgl_sekarang . "</p>
            <p>Nama  : Kolam 1</p>
            <table border=\"1\" align=\"center\">
                <tr>
                <th>no</th>
                <th>Tanggal / Waktu</th>
                <th>nilai jarak</th>
                <th>Status bahaya</th>
                <th>email</th>
                </tr>";
include 'koneksi.php';
$no = 1;
$q = mysqli_query($koneksi, "SELECT * FROM jaraksensor4 JOIN user ON jaraksensor4.id_user=user.id_user");
while ($data = mysqli_fetch_assoc($q)) {
  $isi .= "<tr>
                <td>$no</td>
                <td>" . $data['tanggalwaktu'] . "</td>
                <td>" . $data['nilai_jarak'] . "</td>
                <td>" . $data['status_bahaya'] . "</td>
                <td>" . $data['email'] . "</td>
            </tr>";
  $no++;
}

$pdf->writeHTML($isi, true, false, false, false, '');
$namaPDF = "Laporan MOBWIL 4 Tanggal : $tgl_sekarang .pdf";
$pdf->Output($namaPDF, "D");
