<?php
/*
Name: Natasha Foreman
Course: CSD 440 - Server Side Scripting
Date: May 10th, 2026
Assignment: Module 8
Purpose: Query and display records from the customers table.
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Natasha Query Table</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 30px;
        }

        h1 {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 85%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Customer Table Records</h1>

<?php
$servername = "localhost";
$username = "student1";
$password = "pass";
$dbname = "baseball_01";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("<p>Connection failed: " . mysqli_connect_error() . "</p>");
}

$sql = "SELECT customerID, firstName, lastName, age, phoneNumber, customerType 
        FROM NatashaCustomers";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>
            <th>Customer ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Phone Number</th>
            <th>Customer Type</th>
          </tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['customerID'] . "</td>";
        echo "<td>" . $row['firstName'] . "</td>";
        echo "<td>" . $row['lastName'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "<td>" . $row['phoneNumber'] . "</td>";
        echo "<td>" . $row['customerType'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No customer records found.</p>";
}

mysqli_close($conn);
?>

</body>
</html>