<?php
/*
Name: Natasha Foreman
Course: CSD 440 – Server Side Scripting
Date: April 16th, 2026
Assignment: Module 5
Purpose: Create and display an array of customers and use array methods to find and display customer information based on different fields.
*/
?>

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Natasha Customers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1, h2 {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 90%;
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

        .section {
            width: 90%;
            margin: 20px auto;
        }
    </style>
</head>
<body>

    <h1>Customer Records</h1>

    <?php
    /**
     * Displays customer data in a table.
     */
    function displayCustomers($customerList, $title) {
        echo "<div class='section'>";
        echo "<h2>$title</h2>";

        if (empty($customerList)) {
            echo "<p>No matching customers found.</p>";
            echo "</div>";
            return;
        }

        echo "<table>";
        echo "<tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Phone Number</th>
              </tr>";

        foreach ($customerList as $customer) {
            echo "<tr>";
            echo "<td>" . $customer["firstName"] . "</td>";
            echo "<td>" . $customer["lastName"] . "</td>";
            echo "<td>" . $customer["age"] . "</td>";
            echo "<td>" . $customer["phone"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
    }

    // Array of 10 customers
    $customers = array(
        array("firstName" => "Natasha", "lastName" => "Foreman", "age" => 32, "phone" => "402-555-1001"),
        array("firstName" => "James", "lastName" => "Carter", "age" => 45, "phone" => "402-555-1002"),
        array("firstName" => "Emily", "lastName" => "Johnson", "age" => 28, "phone" => "402-555-1003"),
        array("firstName" => "Michael", "lastName" => "Brown", "age" => 39, "phone" => "402-555-1004"),
        array("firstName" => "Ashley", "lastName" => "Davis", "age" => 24, "phone" => "402-555-1005"),
        array("firstName" => "Daniel", "lastName" => "Miller", "age" => 51, "phone" => "402-555-1006"),
        array("firstName" => "Sophia", "lastName" => "Wilson", "age" => 35, "phone" => "402-555-1007"),
        array("firstName" => "Jacob", "lastName" => "Moore", "age" => 42, "phone" => "402-555-1008"),
        array("firstName" => "Olivia", "lastName" => "Taylor", "age" => 30, "phone" => "402-555-1009"),
        array("firstName" => "Ethan", "lastName" => "Anderson", "age" => 27, "phone" => "402-555-1010")
    );

    // Display all customers
    displayCustomers($customers, "All Customers");

    // Find customer by first name
    $firstNameSearch = array_filter($customers, function ($customer) {
        return $customer["firstName"] === "Emily";
    });
    displayCustomers($firstNameSearch, "Customer Search: First Name = Emily");

    // Find customer by last name
    $lastNameSearch = array_filter($customers, function ($customer) {
        return $customer["lastName"] === "Moore";
    });
    displayCustomers($lastNameSearch, "Customer Search: Last Name = Moore");

    // Find customers age 30 and older
    $ageSearch = array_filter($customers, function ($customer) {
        return $customer["age"] >= 30;
    });
    displayCustomers($ageSearch, "Customers Age 30 and Older");

    // Find customer by phone number
    $phoneSearch = array_filter($customers, function ($customer) {
        return $customer["phone"] === "402-555-1005";
    });
    displayCustomers($phoneSearch, "Customer Search: Phone Number = 402-555-1005");
    ?>

</body>
</html>