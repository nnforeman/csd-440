<?php
/*
Name: Natasha Foreman
Course: CSD 440 – Server Side Scripting
Date: April 12th, 2026
Assignment: Module 4
Purpose:  Write a program that checks whether a string is a palindrome.
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Natasha Palindrome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        th {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h1>Palindrome Test Program</h1>

    <?php
    /**
     * Tests whether a string is a palindrome.
     *
     * @param string $text The string to test
     * @return bool True if palindrome, otherwise false
     */
    function isPalindrome($text) {
        $reversedText = strrev($text);
        return $text === $reversedText;
    }

    // Array of six example strings: three palindromes and three non-palindromes
    $examples = array(
        "level",
        "radar",
        "madam",
        "hello",
        "world",
        "apple"
    );
    ?>

    <table>
        <tr>
            <th>Original String</th>
            <th>Reversed String</th>
            <th>Result</th>
        </tr>

        <?php
        foreach ($examples as $word) {
            $reversedWord = strrev($word);
            $result = isPalindrome($word) ? "Palindrome" : "Not a Palindrome";

            echo "<tr>";
            echo "<td>$word</td>";
            echo "<td>$reversedWord</td>";
            echo "<td>$result</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>