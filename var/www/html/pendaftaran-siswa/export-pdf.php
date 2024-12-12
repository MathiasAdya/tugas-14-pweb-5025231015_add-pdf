<?php
require('fpdf/fpdf.php'); 
include('config.php'); 

class PDF extends FPDF {

    function Header() {
        $this->SetFont('Arial', 'B', 8); 
        $this->Cell(0, 10, 'Daftar Siswa - SMK Coding', 0, 1, 'C');
        $this->Ln(5);
    }

    // Footer of the PDF
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 6); 
        $this->Cell(0, 10, 'Halaman ' . $this->PageNo(), 0, 0, 'C');
    }
}


$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 7);


$pdf->SetFont('Arial', 'B', 7); 
$pdf->Cell(10, 20, 'No', 1, 0, 'C');
$pdf->Cell(20, 20, 'Foto', 1, 0, 'C');
$pdf->Cell(30, 20, 'Nama', 1, 0, 'C');
$pdf->Cell(30, 20, 'Alamat', 1, 0, 'C');
$pdf->Cell(35, 20, 'Jenis Kelamin', 1, 0, 'C');
$pdf->Cell(35, 20, 'Agama', 1, 0, 'C');
$pdf->Cell(30, 20, 'Sekolah Asal', 1, 0, 'C');
$pdf->Ln();


$sql = "SELECT * FROM calon_siswa";
$query = mysqli_query($db, $sql);
$no = 1;


$pdf->SetFont('Arial', '', 7);
while ($row = mysqli_fetch_assoc($query)) {
    $pdf->Cell(10, 20, $no++, 1, 0, 'C');

 
    $fotoPath = 'uploads/' . $row['foto'];
    if (file_exists($fotoPath) && !empty($row['foto'])) {
        $pdf->Cell(20, 20, $pdf->Image($fotoPath, $pdf->GetX() + 2, $pdf->GetY() + 2, 16, 16), 1);
    } else {
        $pdf->Cell(20, 20, 'No Image', 1, 0, 'C');
    }

    // Set content for other columns
    $pdf->Cell(30, 20, $row['nama'], 1);
    $pdf->Cell(30, 20, $row['alamat'], 1);
    $pdf->Cell(35, 20, $row['jenis_kelamin'], 1);
    $pdf->Cell(35, 20, $row['agama'], 1);
    $pdf->Cell(30, 20, $row['sekolah_asal'], 1);
    $pdf->Ln();
    

    if ($pdf->GetY() > 250) { 
        $pdf->AddPage();
    }
}


$pdf->Output('D', 'daftar_siswa_dengan_foto.pdf'); 
?>
