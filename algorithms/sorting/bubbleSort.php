<?php
/**
 * It’s a sorting algorithm where we compare between two adjacent elements at a time
 * and replace them in the correct order. Its time complexity is O(n*n).
 */

// Example of using the bubble sort algorithm.
$array = [5, 2, 6, 1, 3, 4];
bubbleSort($array, count($array));
print_r($array);

/**
 * @param array $array         the array of elements to be sorted.
 * @param int   $elementsCount the number of elements in the array.
 */
function bubbleSort(&$array, $elementsCount)
{
    for ($numberOfPasses = 1; $numberOfPasses <= ($elementsCount -1); $numberOfPasses++) {
        for ($elementIndex = 0; $elementIndex <= ($elementsCount - $numberOfPasses - 1); $elementIndex++) {
            if ($array[$elementIndex] > $array[$elementIndex + 1]) { // if both elements are not in the correct order, swap them.
                $temp = $array[$elementIndex];
                $array[$elementIndex] = $array[$elementIndex + 1];
                $array[$elementIndex + 1] = $temp;
            }
        }
    }
}