<?php
include('fpdf/fpdf.php');

define('EURO', chr(128));



$utente = " Ahmed Mera";

$data = array(
    array(
        'Codice Utente' => 'S001',
        'Codice Bici' => 'S001',
        'Stazione di prelevo' => 'F1234',
        'Slot di noleggio' => 'F12342',
        'Data di noleggio' => '29/2/2021',
        'Ora di noleggio' => '15:03:33',
        'Stazione di riconsegna' => 'F1234',
        'Slot di riconsegna' => 'F12342',
        'Data di riconsegna' => '29/2/2021',
        'Ora di riconsegna' => '17:03:33',
        'costo' => 100
    ),

    array(
        'Codice Utente' => 'S001',
        'Codice Bici' => 'S001',
        'Stazione di prelevo' => 'F1234',
        'Slot di noleggio' => 'F12342',
        'Data di noleggio' => '29/2/2021',
        'Ora di noleggio' => '15:03:33',
        'Stazione di riconsegna' => 'F1234',
        'Slot di riconsegna' => 'F12342',
        'Data di riconsegna' => '29/2/2021',
        'Ora di riconsegna' => '17:03:33',
        'costo' => 28.75
    ),

    array(
        'Codice Utente' => 'S001',
        'Codice Bici' => 'S001',
        'Stazione di prelevo' => 'F1234',
        'Slot di noleggio' => 'F12342',
        'Data di noleggio' => '29/2/2021',
        'Ora di noleggio' => '15:03:33',
        'Stazione di riconsegna' => 'F1234',
        'Slot di riconsegna' => 'F12342',
        'Data di riconsegna' => '29/2/2021',
        'Ora di riconsegna' => '17:03:33',
        'costo' => 17.5
    )
);

$sizeCell = [];
// crea PDF
$pdf = new FPDF("L", "mm", "A3");
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, 'Report biciclette utente' . $utente);
$pdf->Ln();

$pdf->Ln(5);
$pdf->SetFont('Helvetica', 'B', 10);

foreach ($data[0] as $key => $value) {
    $size = $pdf->GetStringWidth($key) + 10;
    $sizeCell[$key] = $size;
    $pdf->Cell($size, 7, $key, 1, 0, "C");
}

$pdf->Ln();

$pdf->SetFont('Helvetica', '', 10);
foreach ($data as $row) {
    foreach ($row as $key => $value){
        if (array_key_last($row) == $key){
            // formattazione italiana
            $pdf->Cell($sizeCell[$key], 7, number_format($value, 2, ',', '.') . ' ' . EURO, 1, 0, 'C');
            $pdf->Ln();
        } else{
            $pdf->Cell($sizeCell[$key], 7, $value, 1, 0, "C");
        }
    }
}


//per lo stampa del PDF
$pdf->Output();
//$pdf->Output("F", "mera.pdf", true);
//echo chunk_split(base64_encode($pdf->Output('S')));



