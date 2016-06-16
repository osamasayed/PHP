<?php
/**
 * Description: Insertion sort is a simple sorting algorithm that builds
 * the final sorted array one item at a time.
 *
 * Complexity: worst O(n*n), best O(n), average O(n*n)
 */

// Example of using the bubble sort algorithm.
$array = [5, 2, 6, 1, 3, 4];
insertionSort($array, count($array));
print_r($array);

function insertionSort(&$array, $elementsNumber)
{
    // Iterate from the second element till the last one in the array.
    for ($currentElementIndex = 1; $currentElementIndex < $elementsNumber; $currentElementIndex++) {
        $value = $array[$currentElementIndex];
        $holeIndex = $currentElementIndex;
        // going backwards through the elements of the sorted array
        while ($holeIndex > 0 && $array[$holeIndex - 1] > $value) {
            $array[$holeIndex] = $array[$holeIndex - 1]; // shift the larger number towards the right.
            $holeIndex--;
        }
        $array[$holeIndex] = $value;
    }
}