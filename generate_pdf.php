<?php
// Include the TCPDF library
require_once('tcpdf/tcpdf.php');

// Database connection
$host = 'localhost';
$db = 'ugatours';
$user = 'root';
$password = '';
$conn = new mysqli($host, $user, $password, $db);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the booking_id from URL
$booking_id = isset($_GET['booking_id']) ? intval($_GET['booking_id']) : 0;

// Fetch booking details from the database
$sql = "SELECT tours.name AS tour_name, tours.description, tours.price, tours.duration, bookings.booking_date
        FROM bookings
        INNER JOIN tours ON bookings.tour_id = tours.tour_id
        WHERE bookings.booking_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $booking_id);
$stmt->execute();
$result = $stmt->get_result();
$booking = $result->fetch_assoc();

// Check if booking exists
if (!$booking) {
    die("Booking not found.");
}

// Create a new PDF document
$pdf = new TCPDF();
$pdf->AddPage();

// Set PDF metadata
$pdf->SetTitle('Booking Details');
$pdf->SetAuthor('UgaTours');

// Set header
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Booking Confirmation - UgaTours', 0, 1, 'C');
$pdf->Ln(10);

// Add content to PDF
$pdf->SetFont('helvetica', '', 12);
$pdf->Write(0, "Thank you for booking with UgaTours! Here are your booking details:", '', 0, 'L', true);
$pdf->Ln(5);

// Booking details
$pdf->Cell(0, 10, 'Tour Name: ' . $booking['tour_name'], 0, 1);
$pdf->Cell(0, 10, 'Description: ' . $booking['description'], 0, 1);
$pdf->Cell(0, 10, 'Price: UGX ' . number_format($booking['price'], 2), 0, 1);
$pdf->Cell(0, 10, 'Duration: ' . $booking['duration'], 0, 1);
$pdf->Cell(0, 10, 'Date Booked: ' . $booking['booking_date'], 0, 1);
$pdf->Ln(10);

// Footer message
$pdf->Write(0, 'We hope you enjoy this adventure! Don’t hesitate to contact us with any questions.', '', 0, 'L', true);
$pdf->Ln(10);

// Output PDF
$pdf->Output('booking_confirmation.pdf', 'I');

// Close database connection
$conn->close();
?>
