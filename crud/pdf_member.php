<?php

include("conection.php");

require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM crud_members WHERE id=$id ";
    $result = $db->query($sql);
    $member = $result->fetch_object();
    $db->close();

}

$pdf->Cell(40,10,"ID: ".$member->id);
$pdf->Ln(10);
$pdf->Cell(40,10,"Membro: ".$member->name);
$pdf->Ln(10);
$pdf->Cell(40,10,"Cargo: ".$member->office);
$pdf->Output();