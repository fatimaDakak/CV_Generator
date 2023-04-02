<?php 
require('fpdf/fpdf.php');
session_start();
if(isset($_POST['download'])){

    // Retrieve form data
    $nom = utf8_decode($_POST['nom']);
    $prenom = utf8_decode($_POST['prenom']);
    $email = utf8_decode($_POST['email']);
    $age = utf8_decode($_POST['age']);
    $tel = utf8_decode($_POST['tele']);
    $club = utf8_decode($_POST['club']);
    $filiere = utf8_decode($_POST['filiere']);
    $annee = utf8_decode($_POST['annee']);
    $projet = utf8_decode($_POST['project']);
    $description = utf8_decode($_POST['desc']);

    // Initialize PDF object
    $pdf = new FPDF();
    $pdf->AddPage();

    // Set document properties
    $pdf->SetTitle('Resume');
    $pdf->SetAuthor($nom . ' ' . $prenom);
    $pdf->SetSubject('CV');

    // Add background color to document
    $pdf->SetFillColor(237, 238, 240);
    $pdf->Rect(0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight(), 'F');

    // document header
    $pdf->SetFont('Arial', 'B', 24);
    $pdf->SetTextColor(0, 0,0);
    $pdf->Cell(0, 40, utf8_decode('Mon CV'), 0, 1, 'C', true);

    // profile section
    $pdf->Ln(20);
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetTextColor(31, 32, 65);
    $pdf->Cell(0, 10, utf8_decode('Profile'), 0, 1);

    $pdf->SetFont('Arial', '', 12);
    $pdf->SetTextColor(94, 96, 125);
    $pdf->Cell(50, 7, utf8_decode('Nom'), 0, 0);
    $pdf->Cell(60, 7, $nom, 0, 1);

    $pdf->Cell(50, 7, utf8_decode('Prenom'), 0, 0);
    $pdf->Cell(60, 7, $prenom, 0, 1);

    $pdf->Cell(50, 7, 'Email', 0, 0);
    $pdf->Cell(60, 7, $email, 0, 1);

    $pdf->Cell(50, 7, 'Age', 0, 0);
    $pdf->Cell(60, 7, $age, 0, 1);

    $pdf->Cell(50, 7, utf8_decode('Téléphone'), 0, 0);
    $pdf->Cell(60, 7,$tel, 0, 1);

    $pdf->Cell(50, 7, utf8_decode('Activités parascolaires'), 0, 0);
    $pdf->Cell(60, 7, $club, 0, 1);

    
    // education section
    $pdf->Ln(20);
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetTextColor(31, 32, 65);

    $pdf->Cell(0, 10, 'Education', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetTextColor(94, 96, 125);

    $pdf->Cell(50, 7,utf8_decode('Filière'),0,0);
    $pdf->Cell(60, 7, $filiere, 0, 1);

    $pdf->Cell(50, 7, utf8_decode('Niveau scolaire'),0,0);
    $pdf->Cell(60, 7, $annee, 0, 1);

    $pdf->Cell(50, 7, utf8_decode('Nombre de projets réalisés'),0,0);
    $pdf->Cell(60, 7, $projet, 0, 1);
    $pdf->Ln(4);

    $pdf->Cell(50, 7, utf8_decode('Description'),0,0);
    $pdf->MultiCell(100,10, $description, 1);
    $pdf->Image($_SESSION['photo'],150,29,40);
        
        
     // Envoyer le PDF au navigateur
    $pdf->Output('/MonCV.pdf', 'D');
    exit;
        
}
?>
