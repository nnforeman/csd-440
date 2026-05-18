<?php
/*
Name: Natasha Foreman
Course: CSD 440 - Server Side Scripting
Date: May 10th, 2026
Assignment: Module 8
Purpose: Populate the customers table with sample customer records.
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Natasha Populate Table</title>
</head>
<body>

<h1>Populate Customers Table</h1>

<?php
$servername = "localhost";
$username = "student1";
$password = "pass";
$dbname = "baseball_01";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("<p>Connection failed: " . mysqli_connect_error() . "</p>");
}

$sql = "INSERT INTO NatashaCustomers 
(firstName, lastName, age, phoneNumber, customerType) VALUES
('Emily', 'Johnson', 28, '402-555-1001', 'Retail'),
('James', 'Carter', 45, '402-555-1002', 'Wholesale'),
('Ashley', 'Davis', 31, '402-555-1003', 'Retail'),
('Michael', 'Brown', 39, '402-555-1004', 'Business'),
('Sophia', 'Wilson', 24, '402-555-1005', 'Retail'),
('Daniel', 'Miller', 52, '402-555-1006', 'Wholesale'),
('Olivia', 'Taylor', 30, '402-555-1007', 'Business'),
('Ethan', 'Anderson', 27, '402-555-1008', 'Retail'),
('Jacob', 'Moore', 42, '402-555-1009', 'Business'),
('Madison', 'Thomas', 35, '402-555-1010', 'Wholesale')";

if (mysqli_query($conn, $sql)) {
    echo "<p>Customer records added successfully.</p>";
} else {
    echo "<p>Error adding records: " . mysqli_error($conn) . "</p>";
}

mysqli_close($conn);
?>

</body>
</html>