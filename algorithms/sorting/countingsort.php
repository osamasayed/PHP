<?php

/**
 * Description: Counting sort is a sorting algorithm where the sorting is done
 * according to the keys of the elements (small integers).
 *
 * Complexity: worst O(n+k), best O(n), average O(n+k)
 * where n is the number of elements in the input array and k is the range of the output.
 */

$array = [10, 7, 12, 4, 9, 13, 1, 15, 2];
countingSort($array);
print_r($array);

/**
 * @param array $inputArray Array of elements to be sorted.
 */
function countingSort(&$inputArray)
{
    $max = $inputArray[0];
    getMaximumElement($inputArray, $max);

    // create an array of length $max + 1 and initialize it
    $countArray = $resultArray = [];
    for ($i = 0; $i <= $max; $i++) {
        $countArray[$i] = 0;
    }

    // count each element in the input array
    foreach ($inputArray as $inputElement) {
        $countArray[$inputElement]++;
    }

    //add up the elements
    for ($i = 1; $i< count($countArray); $i++) {
        //the value of the current element = the value of itself + the value of the element before it
        $countArray[$i] +=  $countArray[$i - 1];
    }

    //initialize $resultArray where index starts from 1 and its length = len($inputArray + 1)
    for ($i = 1; $i< count($inputArray) + 1; $i++) {
        $resultArray[$i] =  null;
    }

    // put them back to result
    foreach ($inputArray as $inputElement) {
        $resultArray[$countArray[$inputElement]] = $inputElement;
        $countArray[$inputElement]--; // decrement the value in the counting array by 1.
    }

    $inputArray = $resultArray;
}

/**
 * Function to get the maximum element in an array.
 *
 * @param array $array Array of elements.
 * @param int $max The maximum element
*  variable and its value is the first element of the array by default.
 */
function getMaximumElement($array, &$max)
{
    foreach($array as $arrayElement) {
        if ($arrayElement > $max) {
            $max = $arrayElement;
        }
    }
}