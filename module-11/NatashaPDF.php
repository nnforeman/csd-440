<?php
/*
Name: Natasha Foreman
Course: CSD 440 - Server Side Scripting
Date: May 31st, 2026
Assignment: Module 11
Purpose: Create a PDF displaying customer database records from Module 8.
*/

require('fpdf186/fpdf.php');

class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(0, 10, 'Natasha Customer Database Report', 0, 1, 'C');
        $this->Ln(5);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

$servername = "localhost";
$username = "student1";
$password = "pass";
$dbname = "baseball_01";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT customerID, firstName, lastName, age, phoneNumber, customerType 
        FROM NatashaCustomers";

$result = mysqli_query($conn, $sql);

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

$pdf->MultiCell(0, 8, 
    "This report displays customer information stored in the NatashaCustomers table created in Module 8. 
The data includes each customer's ID, first name, last name, age, phone number, and customer type."
);

$pdf->Ln(8);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(20, 10, 'ID', 1);
$pdf->Cell(35, 10, 'First Name', 1);
$pdf->Cell(35, 10, 'Last Name', 1);
$pdf->Cell(20, 10, 'Age', 1);
$pdf->Cell(45, 10, 'Phone', 1);
$pdf->Cell(35, 10, 'Type', 1);
$pdf->Ln();

$pdf->SetFont('Arial', '', 10);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $pdf->Cell(20, 10, $row['customerID'], 1);
        $pdf->Cell(35, 10, $row['firstName'], 1);
        $pdf->Cell(35, 10, $row['lastName'], 1);
        $pdf->Cell(20, 10, $row['age'], 1);
        $pdf->Cell(45, 10, $row['phoneNumber'], 1);
        $pdf->Cell(35, 10, $row['customerType'], 1);
        $pdf->Ln();
    }
} else {
    $pdf->Cell(0, 10, 'No customer records found.', 1, 1, 'C');
}

mysqli_close($conn);

$pdf->Output('I', 'NatashaCustomers.pdf');
?>