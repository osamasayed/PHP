<?php

/**
 * Description: Bucket sort is a sorting algorithm that works by partitioning an array into a number of buckets.
 * Each bucket is then sorted separately by applying another sorting algorithm on it. Here I chose
 * to apply insertion sort algorithm.
 *
 * Complexity: worst is O(n * n), average O(n+k)
 * where k is the number of buckets
 */

$inputArray = [5, 2, 6, 6, 1, 1, 3, 4, 12, 15, 23, 11, 8];
bucketSort($inputArray);
print_r($inputArray);

/**
 * Function to bucketSort an array of elements.
 *
 * @param array $inputArray the elements to be sorted.
 */
function bucketSort(&$inputArray)
{
    $elementsCount = count($inputArray);
    $maximumNumber =$inputArray[0];
    $minimumNumber = $inputArray[0];
    $buckets = [];

    // get the maximum and minimum elements in the input array
    for ($i = 1; $i < $elementsCount; $i++) {
        if ($inputArray[$i] < $minimumNumber) {
            $minimumNumber = $inputArray[$i];
        }
        if ($inputArray[$i] > $maximumNumber) {
            $maximumNumber = $inputArray[$i];
        }
    }

    // create buckets of length $maximumNumber - $minimumNumber +1 and each bucket is an empty array for now
    for ($bucketIndex = 0; $bucketIndex < ($maximumNumber - $minimumNumber +1); $bucketIndex++) {
        $buckets[$bucketIndex] = [];
    }

    // add each element in the input array to the array in the [$elementvalue - $minimumNumber] bucket
    for ($i = 0; $i < $elementsCount; $i++) {
        $buckets[$inputArray[$i] - $minimumNumber][] = $inputArray[$i];
    }

    // now we go through each bucket and sort its elements using insertionSort
    foreach ($buckets as $bucket) {
        $count = count($bucket);
        if ($count && $count > 1) {
            insertionSort($bucket, count($bucket));
        }
    }

    // we now put the elements back to the original array
    $inputArray = [];
    foreach ($buckets as $bucket) {
        foreach ($bucket as $bucketElement) {
            $inputArray[] = $bucketElement;
        }
    }
}

/**
 * Function to apply an insertion sort on an array.
 *
 * @param array $array          the array to be sorted
 * @param int   $elementsNumber the amount of elements in the array
 */
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
