<?php
/*
Name: Natasha Foreman
Course: CSD 440 - Server Side Scripting
Date: May 24th, 2026
Assignment: Module 10
Purpose: Validate form data and display the submitted data in JSON format.
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
$customerType = cleanInput($_POST["customerType"] ?? "");
$newsletter = cleanInput($_POST["newsletter"] ?? "");
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

if (empty($customerType)) {
    $errors[] = "Customer type is required.";
}

if (empty($newsletter)) {
    $errors[] = "Newsletter selection is required.";
}

if (empty($comments)) {
    $errors[] = "Comments are required.";
}

if (empty($errors)) {
    $formData = array(
        "firstName" => $firstName,
        "lastName" => $lastName,
        "age" => (int)$age,
        "email" => $email,
        "phone" => $phone,
        "customerType" => $customerType,
        "newsletter" => $newsletter,
        "comments" => $comments
    );

    $jsonData = json_encode($formData, JSON_PRETTY_PRINT);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Natasha JSON Response</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 30px;
        }

        h1 {
            text-align: center;
        }

        .container {
            width: 70%;
            margin: auto;
            padding: 20px;
            border: 1px solid black;
        }

        pre {
            background-color: #f2f2f2;
            padding: 15px;
            border: 1px solid black;
            white-space: pre-wrap;
        }

        .error {
            color: red;
        }

        a {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<?php
if (!empty($errors)) {
    echo "<h1>Form Error</h1>";
    echo "<div class='container'>";
    echo "<p class='error'>Please correct the following errors:</p>";
    echo "<ul>";

    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }

    echo "</ul>";
    echo "</div>";
} else {
    echo "<h1>JSON Output</h1>";
    echo "<div class='container'>";
    echo "<p>The form data was successfully encoded into JSON format.</p>";
    echo "<pre>$jsonData</pre>";
    echo "</div>";
}
?>

<a href="NatashaJSON.php">Return to Form</a>

</body>
</html>