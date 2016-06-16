<?php

/**
 * Description: Selection sort is a sorting algorithm where in each iteration, we
 * search for the smallest element and place it in the appropriate
 * position.
 *
 * Complexity: worst O(n*n), best O(n*n), average O(n*n)
 *
 */

$array = [6, 5, 10, 0, 1, 9, 2, 8, 3, 7, 4];
selectionSort($array, count($array));
print_r($array);

/**
 * @param array $array array of elements to be sorted.
 * @param int   $count number of elements in the array.
 */
function selectionSort(&$array, $count)
{
    // go through each element in the array
    for ($rangeStart = 0; $rangeStart < $count; $rangeStart++) {
        // assume that the minimum element is the first
        $minimumValue = $array[$rangeStart];
        $minimumIndex = $rangeStart;
        $temp = null;
        // go through each element from the range of $rangeStart to the end of the array
        for ($elementIndex = $rangeStart; $elementIndex < $count; $elementIndex++) {
            // if the current element < $minimumValue, swap them
            if ($array[$elementIndex] < $minimumValue) {
                $minimumIndex = $elementIndex;
                $minimumValue = $array[$elementIndex];
            }
        }

        if ($minimumValue != $array[$rangeStart]) {
            $temp = $array[$rangeStart];
            $array[$rangeStart] = $minimumValue;
            $array[$minimumIndex] = $temp;
        }
    }
}