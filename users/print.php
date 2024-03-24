<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once('../TCPDF-main/tcpdf.php');
require "../config/config.php"; 

if (isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];

    $orderQuery = $conn->prepare("SELECT * FROM orders WHERE id=:orderId AND user_id=:userId");
    $orderQuery->bindParam(':orderId', $orderId, PDO::PARAM_INT);
    $orderQuery->bindParam(':userId', $_SESSION['user_id'], PDO::PARAM_INT);
    $orderQuery->execute();

    $order = $orderQuery->fetch(PDO::FETCH_OBJ);

    if (!$order) {
        die("Order not found.");
    }

    $pdf = new TCPDF();
    $pdf->SetTitle('Order Invoice');
    $pdf->AddPage();

    $pdf->SetFillColor(255, 200, 30);
    $pdf->Rect(0, 0, $pdf->GetPageWidth(), 45, 'F'); 

    // Add website logo to the left
    $logoPath = 'images/invoice_icon.jpg'; 
    $pdf->Image($logoPath, 10, 10, 80); 

    $pdf->Cell(104);
    $forkImagePath = 'images/icon.jpg';
    $pdf->Image($forkImagePath, $pdf->GetX(), $pdf->GetY(), 20);

    // Add website name to the right
    $pdf->SetFont('dejavusans', 'B', 30);
    $websiteName = 'RESTORAN'; 
    $pdf->Cell(0, 10, $websiteName, 0, 1, 'R');

    // Set font for the "BLEND" text
    $pdf->SetFont('times', 'B', 25); 
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell(0, 10, ' "Quality Food" ', 0, 1, 'R');

    $pdf->SetTextColor(0, 0, 0);

    // Add horizontal line after logo and title
    $pdf->SetY(45); 
    $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
    
    // Customize PDF content based on your needs
    $pdf->SetFont('dejavusans','B', 20);
    $pdf->Cell(0, 10, 'ORDER INVOICE', 0, 1, 'C');

    $pdf->SetY(55); 
    $pdf->Line(160, $pdf->GetY(), 50, $pdf->GetY());
    $pdf->Ln(10);

    $userQuery = $conn->prepare("SELECT * FROM users WHERE id=:userId");
    $userQuery->bindParam(':userId', $_SESSION['user_id'], PDO::PARAM_INT);
    $userQuery->execute();
    $user = $userQuery->fetch(PDO::FETCH_OBJ);

    if (!$user) {
        die("User not found.");
    }

    $randomInvoiceNo = mt_rand(100000, 999999);
    
    $pdf->SetFont('times', '', 20); 
    $pdf->Cell(0, 10, 'To:', 0, 0, 'L');
    $pdf->Cell(0, 10, 'Invoice No:', 0, 1, 'R');
    
    $pdf->SetFont('dejavusans','', 25);

   // Set font for the username
   $fullName = $user->username;
    $pdf->SetFont('dejavusans', '', 25); 
    $pdf->Cell(0, 10, $fullName, 0, 0, 'L'); 

    // Set font for the invoice number
    $pdf->SetFont('dejavusans', '', 20); 
    $pdf->Cell(0, 10, '#' . $randomInvoiceNo, 0, 1, 'R');

    $pdf->Ln(10);

    $invoiceDate = date('Y-m-d H:i:s');
    $pdf->SetFont('times', 'B', 15);
    
    // Fetch address details from orders table
    $addressQuery = $conn->prepare("SELECT CONCAT(address, ', ', town, ', ', country, ', ', zipcode) AS fullAddress FROM orders WHERE id=:orderId");
    $addressQuery->bindParam(':orderId', $orderId, PDO::PARAM_INT);
    $addressQuery->execute();
    $addressResult = $addressQuery->fetch(PDO::FETCH_OBJ);

    if ($addressResult) {
        $fullAddress = $addressResult->fullAddress;

        // Display the fetched address details
        $pdf->Cell(0, 10, $fullAddress, 0, 0, 'L');
    } else {
        $pdf->Cell(0, 10, 'Address: N/A', 0, 0, 'L'); 
    }

    $pdf->Cell(0, 10, 'Invoice Date: ' . $invoiceDate, 0, 1, 'R');

    // Fetch phone number from orders table
    $phoneQuery = $conn->prepare("SELECT phone_number FROM orders WHERE id=:orderId");
    $phoneQuery->bindParam(':orderId', $orderId, PDO::PARAM_INT);
    $phoneQuery->execute();
    $phoneResult = $phoneQuery->fetch(PDO::FETCH_OBJ);

    if ($phoneResult) {
        $phoneNumber = $phoneResult->phone_number;

        // Display the fetched phone number
        $pdf->Cell(0, 10, 'Phone No: ' . $phoneNumber, 0, 0, 'L');
    } else {
        $pdf->Cell(0, 10, 'Phone No: N/A', 0, 0, 'L'); 
    }

    $pdf->Cell(0, 10, 'Issue Date: ' . $invoiceDate, 0, 1, 'R');

    $pdf->Ln(10);

    $pdf->SetFont('dejavusans', 'B', 15);

    $headers = array('Order ID', 'Total Price', 'Status', 'Order Date');

$data = array(
    array($order->id, html_entity_decode('&#8377;') . number_format($order->total_price, 2), $order->status, $order->created_at)
);

$columnWidths = array(35, 43, 40, 70);

foreach ($headers as $key => $header) {
    $pdf->Cell($columnWidths[$key], 7, $header, 1);
}

$pdf->Ln(10);

$pdf->SetFont('dejavusans','', 15);
foreach ($data as $row) {
    foreach ($row as $key => $value) {
        $pdf->Cell($columnWidths[$key], 7, $value, 1);
    }
    $pdf->Ln(100);
    $pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());
}

$pdf->SetFont('dejavusans','B', 15);
$pdf->SetFillColor(255, 200, 30);
$pdf->Rect(0, 236, $pdf->GetPageWidth(), 60, 'F');
$pdf->Cell(0, 10, 'Follow Us:', 0, 1, 'R'); 

$pdf->SetFont('dejavusans','', 13);

$instagramIconPath = 'images/insta.jpg'; 
$pdf->Image($instagramIconPath, $pdf->GetX() + 114, $pdf->GetY(), 9);
$pdf->SetX($pdf->GetX() + 20); 
$pdf->Cell(0, 10, 'instagram.com/restoran', 0, 1, 'R'); 

$facebookIconPath = 'images/facebook.jpg'; 
$pdf->Image($facebookIconPath, $pdf->GetX() + 114, $pdf->GetY(), 9); 
$pdf->SetX($pdf->GetX() + 20); 
$pdf->Cell(0, 10, 'facebook.com/restoran', 0, 1, 'R'); 

$mailIconPath = 'images/mail.jpg'; 
$pdf->Image($mailIconPath, $pdf->GetX() + 114, $pdf->GetY(), 9); 
$pdf->SetX($pdf->GetX() + 20); 
$pdf->Cell(0, 10, 'restoran@gmail.com', 0, 1, 'R'); 

$numberOfPages = $pdf->getNumPages();
for ($pageNumber = 1; $pageNumber <= $numberOfPages; $pageNumber++) {
    $pdf->setPage($pageNumber);
    $pdf->SetY(0); 
    $pdf->SetFont('dejavusans', 'B', 10); 
    $pdf->Cell(0, 10, 'Page ' . $pageNumber . ' of ' . $numberOfPages, 0, 1, 'R'); 
}
    
    // Output the PDF to the browser
    ob_end_clean();  
    $invoiceNumber = '#' . $randomInvoiceNo; 
    $filename = 'Order_Invoice_' . $invoiceNumber . '.pdf';
    $pdf->Output($filename, 'I');
    
} else {
    die("Order ID not provided.");
}
?>
