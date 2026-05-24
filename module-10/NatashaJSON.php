<?php
/*
Name: Natasha Foreman
Course: CSD 440 - Server Side Scripting
Date: May 24th, 2026
Assignment: Module 10
Purpose: Display a form that collects at least 8 fields of user data.
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Natasha JSON Form</title>
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
            padding: 20px;
            border: 1px solid black;
        }

        label, input, select, textarea {
            display: block;
            width: 100%;
            margin-top: 10px;
            padding: 8px;
        }

        input[type="submit"] {
            margin-top: 18px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h1>Customer JSON Information Form</h1>

<form method="post" action="NatashaJSONResponse.php">
    <label for="firstName">First Name:</label>
    <input type="text" name="firstName" id="firstName">

    <label for="lastName">Last Name:</label>
    <input type="text" name="lastName" id="lastName">

    <label for="age">Age:</label>
    <input type="number" name="age" id="age">

    <label for="email">Email:</label>
    <input type="email" name="email" id="email">

    <label for="phone">Phone Number:</label>
    <input type="text" name="phone" id="phone">

    <label for="customerType">Customer Type:</label>
    <select name="customerType" id="customerType">
        <option value="">Select One</option>
        <option value="Retail">Retail</option>
        <option value="Wholesale">Wholesale</option>
        <option value="Business">Business</option>
    </select>

    <label for="newsletter">Subscribe to Newsletter:</label>
    <select name="newsletter" id="newsletter">
        <option value="">Select One</option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
    </select>

    <label for="comments">Comments:</label>
    <textarea name="comments" id="comments"></textarea>

    <input type="submit" name="submit" value="Convert to JSON">
</form>

</body>
</html>