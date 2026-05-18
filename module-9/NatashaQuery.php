<?php
/*
Name: Natasha Foreman
Course: CSD 440 - Server Side Scripting
Date: May 17th, 2026
Assignment: Module 9
Purpose: Search customer records using user form input.
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Natasha Query Customers</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 30px;
        }

        h1, h2 {
            text-align: center;
        }

        form {
            width: 50%;
            margin: auto;
            padding: 15px;
            border: 1px solid black;
        }

        label, input, select {
            display: block;
            width: 100%;
            margin-top: 10px;
            padding: 8px;
        }

        input[type="submit"] {
            margin-top: 15px;
            cursor: pointer;
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

        .back {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<h1>Search Customer Records</h1>

<form method="post" action="NatashaQuery.php">
    <label for="searchField">Search By:</label>
    <select name="searchField" id="searchField">
        <option value="firstName">First Name</option>
        <option value="lastName">Last Name</option>
        <option value="age">Age</option>
        <option value="phoneNumber">Phone Number</option>
        <option value="customerType">Customer Type</option>
    </select>

    <label for="searchValue">Enter Search Value:</label>
    <input type="text" name="searchValue" id="searchValue" required>

    <input type="submit" name="submit" value="Search">
</form>

<?php
if (isset($_POST["submit"])) {
    $servername = "localhost";
    $username = "student1";
    $password = "pass";
    $dbname = "baseball_01";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("<p>Connection failed: " . mysqli_connect_error() . "</p>");
    }

    $searchField = $_POST["searchField"];
    $searchValue = $_POST["searchValue"];

    $allowedFields = array("firstName", "lastName", "age", "phoneNumber", "customerType");

    if (!in_array($searchField, $allowedFields)) {
        die("<p>Invalid search field.</p>");
    }

    $sql = "SELECT customerID, firstName, lastName, age, phoneNumber, customerType 
            FROM NatashaCustomers 
            WHERE $searchField LIKE ?";

    $stmt = mysqli_prepare($conn, $sql);
    $searchValue = "%" . $searchValue . "%";

    mysqli_stmt_bind_param($stmt, "s", $searchValue);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    echo "<h2>Search Results</h2>";

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
            echo "<td>" . $row["customerID"] . "</td>";
            echo "<td>" . $row["firstName"] . "</td>";
            echo "<td>" . $row["lastName"] . "</td>";
            echo "<td>" . $row["age"] . "</td>";
            echo "<td>" . $row["phoneNumber"] . "</td>";
            echo "<td>" . $row["customerType"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p style='text-align:center;'>No matching records found.</p>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>

<div class="back">
    <a href="NatashaIndex.php">Back to Index</a>
</div>

</body>
</html>