<?php
// require('fpdf/fpdf.php'); // Removed
require 'vendor/autoload.php';

// Mock database and email sending for local testing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? 'Test User';
    $email = $_POST['email'] ?? 'test@example.com';

    // Initialize TCPDF
    // L = Landscape, mm, A4
    $pdf = new \TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);

    // Disable default header and footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetAutoPageBreak(false, 0);

    // Add a page
    $pdf->AddPage();

    // Add background image
    // 297x210mm is standard A4 landscape
    $img_file = __DIR__ . '/certificate_background.jpg';
    if (file_exists($img_file)) {
        $pdf->Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);
    } else {
        $pdf->Cell(0, 10, 'Background image not found', 0, 1, 'C');
    }

    // Customize the certificate content
    $pdf->Ln(100); // Adjust vertical position
    $pdf->SetFont('helvetica', 'B', 35); // 'Arial' maps to 'helvetica' in TCPDF
    $pdf->SetTextColor(0, 0, 0);
    
    // Print User Name
    $pdf->Cell(0, 30, $name, 0, 1, 'C');

    // Output PDF to browser (Inline view)
    $pdf->Output('certificate.pdf', 'I');
    exit();
}
?>
