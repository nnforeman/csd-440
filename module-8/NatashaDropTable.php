<?php
/*
Name: Natasha Foreman
Course: CSD 440 - Server Side Scripting
Date: May 10th, 2026
Assignment: Module 8
Purpose: Drop the customers table from the baseball_01 database.
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Natasha Drop Table</title>
</head>
<body>

<h1>Drop Customers Table</h1>

<?php
$servername = "localhost";
$username = "student1";
$password = "pass";
$dbname = "baseball_01";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("<p>Connection failed: " . mysqli_connect_error() . "</p>");
}

$sql = "DROP TABLE IF EXISTS NatashaCustomers";

if (mysqli_query($conn, $sql)) {
    echo "<p>Table NatashaCustomers dropped successfully.</p>";
} else {
    echo "<p>Error dropping table: " . mysqli_error($conn) . "</p>";
}

mysqli_close($conn);
?>

</body>
</html>