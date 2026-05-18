<?php
/*
Name: Natasha Foreman
Course: CSD 440 - Server Side Scripting
Date: May 17th, 2026
Assignment: Module 9
Purpose: Form page for adding a new customer record to the database.
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Natasha Add Customer</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 30px;
        }

        h1 {
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

        .message {
            text-align: center;
            margin-top: 20px;
        }

        .back {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<h1>Add New Customer Record</h1>

<form method="post" action="NatashaForms.php">
    <label for="firstName">First Name:</label>
    <input type="text" name="firstName" id="firstName" required>

    <label for="lastName">Last Name:</label>
    <input type="text" name="lastName" id="lastName" required>

    <label for="age">Age:</label>
    <input type="number" name="age" id="age" required>

    <label for="phoneNumber">Phone Number:</label>
    <input type="text" name="phoneNumber" id="phoneNumber" required>

    <label for="customerType">Customer Type:</label>
    <select name="customerType" id="customerType" required>
        <option value="">Select One</option>
        <option value="Retail">Retail</option>
        <option value="Wholesale">Wholesale</option>
        <option value="Business">Business</option>
    </select>

    <input type="submit" name="submit" value="Add Customer">
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

    $firstName = trim($_POST["firstName"]);
    $lastName = trim($_POST["lastName"]);
    $age = trim($_POST["age"]);
    $phoneNumber = trim($_POST["phoneNumber"]);
    $customerType = trim($_POST["customerType"]);

    if (empty($firstName) || empty($lastName) || empty($age) || empty($phoneNumber) || empty($customerType)) {
        echo "<p class='message'>Error: All fields are required.</p>";
    } elseif (!is_numeric($age) || $age <= 0) {
        echo "<p class='message'>Error: Age must be a valid number greater than 0.</p>";
    } else {
        $sql = "INSERT INTO NatashaCustomers 
                (firstName, lastName, age, phoneNumber, customerType) 
                VALUES (?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "ssiss", $firstName, $lastName, $age, $phoneNumber, $customerType);

        if (mysqli_stmt_execute($stmt)) {
            echo "<p class='message'>Customer record added successfully.</p>";
        } else {
            echo "<p class='message'>Error adding record: " . mysqli_error($conn) . "</p>";
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
}
?>

<div class="back">
    <a href="NatashaIndex.php">Back to Index</a>
</div>

</body>
</html>