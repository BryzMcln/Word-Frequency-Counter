<?php

/**
 * Calculate the total price of items in a shopping cart
 * @param  array $items - an associative array containing items
 * @return float returns total price of the items 
 */ 



function calcItems(array $items): float{
    $total = 0;
    foreach ($items as $item) {
     $total += $item['price'];
    }
    return $total;
}
    

$items = [
    ['name' => 'Oven with Aircon', 'price' => 10],
    ['name' => 'Toaster with legal seperation', 'price' => 15],
    ['name' => 'Ref with free wifi', 'price' => 20],
   ];

echo "<h4>Calculate Items</h4>";
foreach ($items as $item) {
    echo $item['name'] . ": $" . $item['price'] . "<br>";
}
echo"<br>";
$totalPrice = calcItems($items);
echo "Total Price: " . $totalPrice;
echo"<br>";
echo"<br>";



/**
 * Perform a series of string manipulations on the input string.
 *
 * @param string $string - string to be manipulated.
 * @return string The manipulated string.
 */
function strManipulate(string $input): string {
    // Remove spaces and convert to lowercase
    $output = str_replace(' ', '', $input);
    $output = strtolower($output);
    
    return $output;
}

$string = "This is a poorly written program with little structure and readability.";
$result = strManipulate($string);
echo "<h4>String Manipulation</h4>";
echo "Original string: " . $string; 
echo"<br>";
echo "Modified string: " . $result; // Output
echo"<br>";
echo"<br>";


/**
 * Checks if a number is even or odd.
 *
 * @param int $number - number to be checked.
 * @return string result if the number is even or odd.
 */
function numCheckOddEven(int $number): string {
    if ($number % 2 == 0) {
        return "The number " . $number . " is even.";
    } else {
        return "The number " . $number . " is odd.";
    }
}

echo "<h4>Check Number if Odd or Even</h4>";
$number = 42;
echo numCheckOddEven($number);


?>
