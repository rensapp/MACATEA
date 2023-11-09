<?php
require('../receipt/fpdf/fpdf.php');
include '../includes/config.php';

$order_id = $_GET['order_id'];
// $order_id=206;

$select_order_id= $conn->prepare("SELECT * FROM `orders` WHERE order_id = ?");
$select_order_id->execute([$order_id]);
$fetch_order = $select_order_id->fetch(PDO::FETCH_ASSOC);

$products = $fetch_order['products'];
$subtotal = $fetch_order['paid_amount'];
$date = $fetch_order['placed_on'];

// Convert date string to timestamp
$timestamp = strtotime($date);

// Format date and time separately
$date = date("m/d/Y", $timestamp);
$time = date("g:i a", $timestamp);

// $products = "Wintermelon(1) - No Sinker, Strawberry(1) - No Sinker";

// Split the string into an array of products
$productArray = explode(", ", $products);

// Initialize arrays to store individual values
$productNames = [];
$quantities = [];
$additions = [];

// Loop through the product array and extract values
foreach ($productArray as $product) {
    // Split each product into name and details
    list($productName, $details) = explode(" - ", $product, 2);

    // Extract quantity and addition from details
    preg_match('/\((\d+)\)/', $details, $matches);
    $quantity = isset($matches[1]) ? $matches[1] : "";
    $addition = str_replace("($quantity)", "", $details);

    // Store values in respective arrays
    $productNames[] = $productName;
    $quantities[] = $quantity;
    $additions[] = $addition;
}

$tax= $subtotal * 0.08;
$formattedTax = number_format($tax, 2);
$total= $subtotal + $formattedTax;
$formattedTotal = number_format($total, 2);

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Mactea Receipt', 0, 1, 'C');
        $this->Ln(5);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Thank you for choosing Mactea!', 0, 0, 'C');
    }
}

// Create PDF object
$pdf = new PDF();
$pdf->AddPage('P', array(80, 150));

// Add content to the PDF
$pdf->SetFont('Arial', '', 11);

// Date and Time
$pdf->Cell(0, 10, "Date: $date", 0, 1);
$pdf->Cell(0, 10, "Time: $time", 0, 1);
$pdf->Cell(0, 5, str_repeat("-", 45) , 0, 1);
$pdf->Ln(2);

// Transaction ID
// $pdf->Cell(0, 10, 'Transaction ID: 123456789', 0, 1);
// $pdf->Ln(2);

// Items Purchased
$pdf->Cell(0, 10, 'Items Purchased:', 0, 1);
$pdf->Ln(2);

// Output the results
$pdf->SetFont('Arial', '', 11);
for ($i = 0; $i < count($productNames); $i++) {
    $pdf->Cell(0, 10, "$productNames[$i] $additions[$i]", 0, 1);
}
$pdf->Cell(0, 5, str_repeat("-", 45) , 0, 1);
$pdf->Ln(4);

// Subtotal
$pdf->Cell(0, 10, "Subtotal:                php $subtotal.00", 0, 1);

// Tax
$pdf->Cell(0, 10, "Tax (8%):               php $formattedTax", 0, 1);

// Total
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0, 10, "Total:                   php $formattedTotal", 0, 1);

// Output PDF
$pdf->Output();

?>
