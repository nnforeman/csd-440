<?php
/*
Name: Natasha Foreman
Course: CSD 440 – Server Side Scripting
Date: April 24th, 2026
Assignment: Module 6
Purpose: Create a class that stores an integer and tests whether it is even, odd, or prime.
*/
/**
 * Class NatashaMyInteger
 * Stores one integer value and includes methods to test the value.
 */
class NatashaMyInteger {
    private $number;

    /**
     * Constructor sets the integer value.
     *
     * @param int $number
     */
    public function __construct($number) {
        $this->number = $number;
    }

    /**
     * Getter method for the integer value.
     *
     * @return int
     */
    public function getNumber() {
        return $this->number;
    }

    /**
     * Setter method for the integer value.
     *
     * @param int $number
     */
    public function setNumber($number) {
        $this->number = $number;
    }

    /**
     * Tests whether a number is even.
     *
     * @param int $number
     * @return bool
     */
    public function isEven($number) {
        return $number % 2 == 0;
    }

    /**
     * Tests whether a number is odd.
     *
     * @param int $number
     * @return bool
     */
    public function isOdd($number) {
        return $number % 2 != 0;
    }

    /**
     * Tests whether the stored number is prime.
     *
     * @return bool
     */
    public function isPrime() {
        if ($this->number <= 1) {
            return false;
        }

        for ($i = 2; $i <= sqrt($this->number); $i++) {
            if ($this->number % $i == 0) {
                return false;
            }
        }

        return true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Natasha MyInteger</title>
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

<h1>MyInteger Class Test</h1>

<?php
// Create two instances of the class
$integerOne = new NatashaMyInteger(7);
$integerTwo = new NatashaMyInteger(10);

// Test setter method
$integerTwo->setNumber(12);

// Store objects in an array for display
$integers = array($integerOne, $integerTwo);
?>

<table>
    <tr>
        <th>Number</th>
        <th>Even?</th>
        <th>Odd?</th>
        <th>Prime?</th>
    </tr>

    <?php
    foreach ($integers as $integer) {
        $number = $integer->getNumber();

        echo "<tr>";
        echo "<td>" . $number . "</td>";
        echo "<td>" . ($integer->isEven($number) ? "Yes" : "No") . "</td>";
        echo "<td>" . ($integer->isOdd($number) ? "Yes" : "No") . "</td>";
        echo "<td>" . ($integer->isPrime() ? "Yes" : "No") . "</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>