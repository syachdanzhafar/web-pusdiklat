<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf.php');

class MYPDF extends TCPDF
{

    //Page header
    public function Header()
    {
        // Logo
        $image_file = K_PATH_IMAGES . 'logo_perpusnas.png';
        $this->Image($image_file, 84, 2, 45, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    }

    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-128);
        $this->Ln(5);
        // Set font
        $this->SetFont('times', ' ', 11);

        $this->Cell(15, 1, '', 0, 0);
        $this->MultiCell(174, 15, 'Demikian kami sampaikan, atas kerjasamanya kami ucapkan terimakasih', 0, 'L', 0, 1, '', '', true);
        $this->Ln(1);
        $this->Cell(94, 1, '', 0, 0);
        $this->Cell(95, 1, 'Plt. Kepala Pusat Pendidikan dan Pelatiahan', 0, 1);
        $this->Cell(94, 1, '', 0, 0);
        $this->Cell(95, 1, 'Perpustakaan Nasional RI,', 0, 1);
        $this->Ln(20);
        $this->Cell(94, 1, '', 0, 0);
        $this->Cell(95, 1, 'Drs. Y. Yahyono, S.IP., M.Si', 0, 1);
        $this->Cell(94, 1, '', 0, 0);
        $this->Cell(95, 1, 'NIP. 19631110 199103 1 001', 0, 1);
        $this->Ln(5);
        $this->Cell(189, 1, 'Tembusan :', 0, 1);
        $this->Cell(189, 1, '1. Kepala Perpustakaan Nasional RI', 0, 1);
        $this->Cell(189, 1, '2. Sekretaris Utama Perpustakaan Nasional RI', 0, 1);
        $this->Ln(30);



        // Set font
        $this->SetFont('times', 'B', 8);
        $this->Cell(189, 1, 'Alamat. Jl. Salemba Raya No. 28A, Jakarta Pusat, Indonesia - 10430', 0, 1, 'C');
        $this->Cell(189, 1, 'Telepon.(62-21) 3922749, 3154864, 3101411 Fakslmlle.(62-21) 3101472', 0, 1, 'C');
        $this->Cell(189, 1, 'Website. www.perpusnas.go.id Email. info@perpusnas.go.id', 0, 1, 'C');
    }
}

// create new PDF document
$pdf = new MYPDF('p', 'mm', 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Perpusnas');
$pdf->SetTitle('Surat Magang');
$pdf->SetSubject('');
$pdf->SetKeywords('');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
$pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
    require_once(dirname(__FILE__) . '/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 14, '', true);

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('jawaban_surat_magang.pdf', 'I');
