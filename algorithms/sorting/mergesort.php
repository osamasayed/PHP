<?php

/**
 * Description: Merge sort is a divide and conquer sorting algorithm.
 * We divide the array into two parts, sort them and then merge them
 * to get the elements sorted.
 *
 * Complexity: average O(n log n).
 */

$array = [4, 5, 0, 1, 9, 2, 6, 8, 3, 7];
mergeSort($array);
print_r($array);

/**
 * Function to execute the merge sort recursively.
 *
 * @param array $array array of elements to be sorted.
 *
 * @return void
 */
function mergeSort(&$array)
{
    $elementsNumber = count($array);
    // base condition to break the recursion
    if ($elementsNumber < 2) {
        return;
    }

    // calculate the middle index to split the array into two halves.
    $middleIndex = floor($elementsNumber/2);

    // create the left sub-array
    for ($i = 0; $i < $middleIndex; $i++) {
        $leftSubArray[] = $array[$i];
    }
    // create the right sub-array
    for ($i = $middleIndex; $i < $elementsNumber; $i++) {
        $rightSubArray[] = $array[$i];
    }
    mergeSort($leftSubArray);
    mergeSort($rightSubArray);
    merge($leftSubArray, $rightSubArray, $array);
}

/**
 * Function to merge two arrays into one array.
 *
 * @param array $leftSortedArray  the left sub-array.
 * @param array $rightSortedArray the right sub-array.
 * @param array $mergedArray      the array in which the left and right arrays will merge into.
 */
function merge($leftSortedArray, $rightSortedArray, &$mergedArray)
{
    $leftArrayCount  = count($leftSortedArray);
    $rightArrayCount = count($rightSortedArray);
    $leftIndex = $rightIndex = $arrayIndex = 0;
    while ($leftIndex < $leftArrayCount && $rightIndex < $rightArrayCount) {
        /*
         * if the first element in the left array is smaller than the first element in
         * the right array, put it into the current index of the $mergedArray.
         */
        if ($leftSortedArray[$leftIndex] < $rightSortedArray[$rightIndex]) {
            $mergedArray[$arrayIndex] = $leftSortedArray[$leftIndex];
            $leftIndex++; // increment the left index array to move to the next element
        } else {
            $mergedArray[$arrayIndex] = $rightSortedArray[$rightIndex];
            $rightIndex++; // increment the right index array to move to the next element
        }
        $arrayIndex++;
    }

    // in-case the right array has been merged completely before the left one
    while ($leftIndex < $leftArrayCount) {
        $mergedArray[$arrayIndex] = $leftSortedArray[$leftIndex];
        $arrayIndex++;
        $leftIndex++;
    }

    // in-case the left array has been merged completely before the right one
    while ($rightIndex < $rightArrayCount) {
        $mergedArray[$arrayIndex] = $rightSortedArray[$rightIndex];
        $arrayIndex++;
        $rightIndex++;
    }
}
