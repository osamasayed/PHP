<?php

/**
 * Description: Radix sort is a sorting algorithm that is used to sort numbers by
 * sorting them from the least significant digit to the most significant.
 */


$inputArray = [10, 15, 1, 60, 5, 100, 25, 50];
radixSort($inputArray);
var_dump($inputArray);

/**
 * Function to radix sort an array.
 *
 * @param array $inputArray array of elements to be sorted
 */
function radixSort(&$inputArray)
{
    $maximumElement = $inputArray[0];
    $elementsCount = count($inputArray);
    $buckets = [];
    // create an array of 10 elements
    for ($i = 0; $i < 10; $i++) {
        $buckets[$i] = [];
    }

    // get the maximum number in the input array
    for ($i = 1; $i < $elementsCount; $i++) {
        if ($inputArray[$i] > $maximumElement) {
            $maximumElement = $inputArray[$i];
        }
    }
    $digitsOfMaxElement = strlen($maximumElement);
    // adding leading zeros to all digits that are not of the same length of the largest element
    foreach ($inputArray as $inputIndex => $inputElement) {
        $inputArray[$inputIndex] = sprintf('%0'.$digitsOfMaxElement.'d', $inputElement);
    }

    // start from the right most digit of the input elements
    $digitIndex = $digitsOfMaxElement -1;
    // we need to make digitsOfMaxElement passes
    for ($passIndex = 1; $passIndex <= $digitsOfMaxElement; $passIndex++) {
        // go through all elements in the inputArray
        foreach ($inputArray as $inputElement) {
            // get the digit number $digitIndex + 1
            $digit = $inputElement[$digitIndex];
            // put it in the corresponding bucket
            $buckets[$digit][] = $inputElement;
        }

        $inputArray = [];
        // take the elements back from the buckets into the original array
        foreach ($buckets as $bucketArray) {
            foreach ($bucketArray as $bucketElement) {
                $inputArray[] = $bucketElement;
            }
        }

        // re-initialize the bucket
        foreach ($buckets as $bucketIndex => $bucketArray) {
            $buckets[$bucketIndex] = [];
        }
        $digitIndex--;
    }

    // remove the leading zero of elements by casting the elements to int
    foreach ($inputArray as &$element) {
        $element = (int) $element;
    }
}

