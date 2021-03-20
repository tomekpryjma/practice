<?php

// https://leetcode.com/problems/string-to-integer-atoi/

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function myAtoi($s) {
        $input = ltrim($s);
        $sum = 0;

        if (! $input) return $sum;

        $signs = ['-', '+'];
        $first = $input[0];
        $signExists = in_array($first, $signs);

        if (! is_numeric($first) && ! $signExists) return $sum;

        if ($signExists) {
            $inputArray = str_split($input);
            $sign = $first;
            unset($inputArray[0]);
            $inputArray = array_values($inputArray);
            $input = implode('', $inputArray);
        }

        for ($iter = 0; $iter < strlen($input); $iter++) {
            $value = $input[$iter];
            $nextIsNumeric = isset($input[$iter + 1]) ? is_numeric($input[$iter + 1]) : false;
            $sum .= $value;

            if (! $nextIsNumeric ) break;
        }

        $sum = (int) $sum;
        $clampHigh = 2**31 - 1;
        $clampLow = -2**31;

        if (isset($sign) && $sign == '-') {
            $sum = -$sum;
        }

        if ($sum > $clampHigh) {
            $sum = $clampHigh;
        }

        if ($sum < $clampLow) {
            $sum = $clampLow;
        }

        return $sum;
    }
}