<?php
/*
Name: Natasha Foreman
Course: CSD 440 – Server Side Scripting
Date: May 1st, 2026
Assignment: Module 7
Purpose: Validate form data and display either the submitted information or error messages.
*/

/**
 * Cleans user input.
 *
 * @param string $data User input
 * @return string Cleaned input
 */
function cleanInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$errors = array();

$firstName = cleanInput($_POST["firstName"] ?? "");
$lastName = cleanInput($_POST["lastName"] ?? "");
$age = cleanInput($_POST["age"] ?? "");
$email = cleanInput($_POST["email"] ?? "");
$phone = cleanInput($_POST["phone"] ?? "");
$contactMethod = cleanInput($_POST["contactMethod"] ?? "");
$comments = cleanInput($_POST["comments"] ?? "");

if (empty($firstName)) {
    $errors[] = "First name is required.";
}

if (empty($lastName)) {
    $errors[] = "Last name is required.";
}

if (empty($age) || !is_numeric($age) || $age <= 0) {
    $errors[] = "Age must be a valid number greater than 0.";
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "A valid email address is required.";
}

if (empty($phone)) {
    $errors[] = "Phone number is required.";
}

if (empty($contactMethod)) {
    $errors[] = "Preferred contact method is required.";
}

if (empty($comments)) {
    $errors[] = "Comments are required.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Natasha Form Response</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 30px;
        }

        table {
            border-collapse: collapse;
            width: 70%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
        }

        th {
            text-align: left;
            width: 30%;
        }

        h1 {
            text-align: center;
        }

        .error {
            width: 70%;
            margin: auto;
            color: red;
        }

        .success {
            text-align: center;
        }
    </style>
</head>
<body>

<?php
if (!empty($errors)) {
    echo "<h1>Form Error</h1>";
    echo "<div class='error'>";
    echo "<p>Please correct the following errors:</p>";
    echo "<ul>";

    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }

    echo "</ul>";
    echo "</div>";
} else {
    echo "<h1>Form Submitted Successfully</h1>";
    echo "<p class='success'>The information entered is displayed below.</p>";

    echo "<table>";
    echo "<tr><th>First Name</th><td>$firstName</td></tr>";
    echo "<tr><th>Last Name</th><td>$lastName</td></tr>";
    echo "<tr><th>Age</th><td>$age</td></tr>";
    echo "<tr><th>Email</th><td>$email</td></tr>";
    echo "<tr><th>Phone Number</th><td>$phone</td></tr>";
    echo "<tr><th>Preferred Contact Method</th><td>$contactMethod</td></tr>";
    echo "<tr><th>Comments</th><td>$comments</td></tr>";
    echo "</table>";
}
?>

</body>
</html>