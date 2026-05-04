<?php
/*
Name: Natasha Foreman
Course: CSD 440 – Server Side Scripting
Date: May 1st, 2026
Assignment: Module 7
Purpose: Create a form that collects seven fields using different data types.
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Natasha Form</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 30px;
        }

        form {
            width: 400px;
            margin: auto;
        }

        label {
            display: block;
            margin-top: 12px;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }

        input[type="submit"] {
            margin-top: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h1>Customer Information Form</h1>

<form action="NatashaResponse.php" method="post">
    <label>First Name:</label>
    <input type="text" name="firstName">

    <label>Last Name:</label>
    <input type="text" name="lastName">

    <label>Age:</label>
    <input type="number" name="age">

    <label>Email:</label>
    <input type="email" name="email">

    <label>Phone Number:</label>
    <input type="tel" name="phone">

    <label>Preferred Contact Method:</label>
    <select name="contactMethod">
        <option value="">Select One</option>
        <option value="Email">Email</option>
        <option value="Phone">Phone</option>
        <option value="Text">Text</option>
    </select>

    <label>Comments:</label>
    <textarea name="comments"></textarea>

    <input type="submit" value="Submit Form">
</form>

</body>
</html>