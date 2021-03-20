<?php

// https://leetcode.com/problems/palindrome-number/

class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        if (! is_int($x)) return false;

        $xArr = str_split((string) $x);
        $xArrCount = count($xArr);

        if ($xArrCount == 1) return true; 

        $iterA = 0; // First
        $iterB = $xArrCount - 1; // Last
        $firstVal = $xArr[$iterA];
        $lastVal = $xArr[$iterB];

        if ($firstVal !== $lastVal)
            return false;

        if ($xArrCount <= 3 && $firstVal == $lastVal)
            return true;

        $solved = false;

        // Assumed for 4+ items in array
        while (! $solved) {
            $iterA++;
            $iterB--;

            $valA = $xArr[$iterA];
            $valB = $xArr[$iterB];

            if ($valA !== $valB) break;

            if (
                $iterA + 1 == $iterB ||
                $iterA + 1 == $iterB - 1
            ) {
                $solved = true;
            }

        }
        return $solved;
    }
}