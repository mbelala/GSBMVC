<?php
require('FPDF/fpdf.php');
ob_end_clean();
$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('images/logo.jpg',80,6,40);
$pdf->Ln(30);
$pdf->SetFont('Arial','',14);
$pdf->Cell(0,0,'Visiteur :');
$pdf->Ln(20);
$pdf->SetFont('Arial','',12);
$pdf->Cell(76,0,$visiteur['nom']);
$pdf->Cell(76,0,$visiteur['prenom']);
$pdf->Ln(20);
$pdf->Cell(0,0,'Fiche de frais du '.$numMois.' '.$numAnnee);
$pdf->Ln(20);
$pdf->SetFont('Arial','',16);
$pdf->Cell(0,0,'Frais forfait :');
$pdf->Ln(10);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(38,7,'Frais Forfaitaires',1);
$pdf->Cell(38,7,'Forfait Etape',1);
$pdf->Cell(38,7,'Frais Kilometrique',1);
$pdf->Cell(38,7,'Nuitee Hotel',1);
$pdf->Cell(38,7,'Repas Restaurant',1);
$pdf->SetFont('Arial','',11);
$pdf->Ln();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(38,7,'Quantite',1);
$pdf->SetFont('Arial','',11);
foreach ($fraisForfait as $unFraisForfait)
{
    $quantite =$unFraisForfait['quantite'];
    $pdf->Cell(38,7,$quantite,1);
}
$pdf->Ln();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(38,7,'Montant unitaire',1);
$pdf->SetFont('Arial','',11);
$pdf->Cell(38,7,'110',1);
$pdf->Cell(38,7,'0.62',1);
$pdf->Cell(38,7,'80',1);
$pdf->Cell(38,7,'25',1);
$pdf->Ln();
$pdf->SetFont('Arial','B',11);
$pdf->Cell(38,7,'Montant total',1);
$pdf->SetFont('Arial','',11);
$montantTotal=0;
foreach ($fraisForfait as $unFraisForfait)
{
    $montant =$unFraisForfait['quantite']*$unFraisForfait['montant'];
    $pdf->Cell(38,7,$montant,1);
    $montantTotal += $montant;
}

$pdf->Ln(20);

$pdf->SetFont('Arial','',16);
$pdf->Cell(0,0,'Autres Frais :');
$pdf->Ln(10);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(38,7,'Date',1);
$pdf->Cell(95,7,'Libelle',1);
$pdf->Cell(38,7,'Montant',1);
$pdf->SetFont('Arial','',11);
$pdf->Ln();
foreach ($fraisHorsForfait as $unFraisHorsForfait)
{
    $date =$unFraisHorsForfait['date'];
    $libelle=$unFraisHorsForfait['libelle'];
    $montant=$unFraisHorsForfait['montant'];
    $pdf->Cell(38,7,$date,1);
    $pdf->Cell(95,7,$libelle,1);
    $pdf->Cell(38,7,$montant,1);
    $pdf->Ln();
    $montantTotal += $montant;
}
$pdf->Ln(10);

$pdf->Cell(76,7,'Montant total : '.$montantTotal);
$pdf->ln();
$pdf->Cell(76,9,'Fait a Paris, le '.$date);
$pdf->Cell(76,7,$nomcompt .''.$prenomcompt);
$pdf->Image('images/signature.PNG',120,240,60);
$pdf->Output();


?>
