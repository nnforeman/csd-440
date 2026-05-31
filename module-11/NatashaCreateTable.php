<?php
/*
Name: Natasha Foreman
Course: CSD 440 - Server Side Scripting
Date: May 10th, 2026
Assignment: Module 8
Purpose: Create a customers table in the baseball_01 database.
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Natasha Create Table</title>
</head>
<body>

<h1>Create Customers Table</h1>

<?php
$servername = "localhost";
$username = "student1";
$password = "pass";
$dbname = "baseball_01";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("<p>Connection failed: " . mysqli_connect_error() . "</p>");
}

$sql = "CREATE TABLE NatashaCustomers (
    customerID INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    age INT NOT NULL,
    phoneNumber VARCHAR(20) NOT NULL,
    customerType VARCHAR(30) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "<p>Table NatashaCustomers created successfully.</p>";
} else {
    echo "<p>Error creating table: " . mysqli_error($conn) . "</p>";
}

mysqli_close($conn);
?>

</body>
</html>