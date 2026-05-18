<?php
/*
Name: Natasha Foreman
Course: CSD 440 - Server Side Scripting
Date: May 17th, 2026
Assignment: Module 9
Purpose: Index page with links to Module 8 and Module 9 PHP files.
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Natasha Module 9 Index</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 30px;
        }

        h1 {
            text-align: center;
        }

        .container {
            width: 60%;
            margin: auto;
        }

        a {
            display: block;
            padding: 10px;
            margin: 8px 0;
            background-color: #f2f2f2;
            text-decoration: none;
            color: black;
            border: 1px solid black;
        }

        a:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

<h1>Natasha Customer Database Menu</h1>

<div class="container">
    <h2>Module 9 Pages</h2>
    <a href="NatashaQuery.php">Search Customer Records</a>
    <a href="NatashaForms.php">Add New Customer Record</a>

    <h2>Module 8 Pages</h2>
    <a href="NatashaDropTable.php">Drop Customer Table</a>
    <a href="NatashaCreateTable.php">Create Customer Table</a>
    <a href="NatashaPopulateTable.php">Populate Customer Table</a>
    <a href="NatashaQueryTable.php">View Customer Table</a>
</div>

</body>
</html>