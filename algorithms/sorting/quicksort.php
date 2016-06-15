<?php
/**
 * Quick sort is a sorting algorithm that uses divide and conquer technique.
 * It finds the element called pivot which divides an array into two haves
 * where the elements in the $firstItemIndex half are smaller than the pivot and
 * the elements in the $lastItemIndex half are greater than the pivot.
 * This algorithm is quite efficient as its average and worst case
 * time complexity are of O(nlogn) where n is the number of the elements
 * in the array being sorted.
 *
 */

// Example of using the quick sort algorithm.
$array = [5, 2, 6, 1, 3, 4];
$firstItemIndex = 0;
$lastItemIndex = count($array) - 1;
quickSort($array, $firstItemIndex, $lastItemIndex);
print_r($array);

/**
 * @param array $array          the array of elements to be sorted.
 * @param int   $firstItemIndex the index of the first element in the array.
 * @param int   $lastItemIndex  the index of the last element in the array.
 */
function quickSort(&$array, $firstItemIndex, $lastItemIndex)
{
    $pivotIndex = null; // The index of the pivot
    if ($firstItemIndex < $lastItemIndex) {
        divideArray($array, $firstItemIndex, $lastItemIndex, $pivotIndex);
        quickSort($array, $firstItemIndex, $pivotIndex - 1);
        quickSort($array, $pivotIndex + 1, $lastItemIndex);
    }
}

/**
 * @param array $array          the array that is about to be divided
 * @param int   $firstItemIndex the index of the first element in the array.
 * @param int   $lastItemIndex  the index of the last element in the array.
 * @param int   $pivotIndex     the index of the pivot.
 */
function divideArray(&$array, $firstItemIndex, $lastItemIndex, &$pivotIndex)
{
    $pivotIndex = $firstItemIndex; // let's assume that the pivot is the first element in the array.
	$temp = null; // temporary variable used to swap values.
	while(1) {
        while ($array[$pivotIndex] <= $array[$lastItemIndex] && $pivotIndex != $lastItemIndex) { // while the pivot element <= right most element
            $lastItemIndex--;// move the right most element index one position towards the left
        }

		if ($pivotIndex == $lastItemIndex) { // if the right most index and the pivot are the same then break out of the loop
            break;
        } else if ($array[$pivotIndex] > $array[$lastItemIndex]) { // if the pivot element > the right element, swap them
            $temp = $array[$lastItemIndex];
            $array[$lastItemIndex] = $array[$pivotIndex];
			$array[$pivotIndex] = $temp;
			$pivotIndex = $lastItemIndex; //pivot is now pointing to $lastItemIndex
		}

		while ($array[$pivotIndex] >= $array[$firstItemIndex] && $pivotIndex != $firstItemIndex) { // while the pivot element >= left most element
            $firstItemIndex++;// move the left most element index one position towards the right
        }

		if ($pivotIndex == $firstItemIndex) { // if the left most index and the pivot are the same then break out of the loop
            break;
        } else if ($array[$pivotIndex] < $array[$firstItemIndex]) {// if the pivot element < the left element, swap them
            $temp = $array[$firstItemIndex];
            $array[$firstItemIndex] = $array[$pivotIndex];
			$array[$pivotIndex] = $temp;
			$pivotIndex = $firstItemIndex; //pivot is now pointing to $firstItemIndex
		}
	}
}