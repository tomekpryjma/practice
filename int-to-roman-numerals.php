<?php

// https://leetcode.com/problems/integer-to-roman/

class Solution {
    public static $NUMERALS = [
        1 => 'I', 4 => 'IV', 5 => 'V', 6 => 'VI', 7 => 'VII', 8 => 'VIII',
        9 => 'IX', 10 => 'X', 40 => 'XL', 50 => 'L', 60 => 'LX', 70 => 'LXX',
        80 => 'LXXX', 90 => 'XC', 100 => 'C', 200 => 'CC', 300 => 'CCC', 400 => 'CD',
        500 => 'D', 600 => 'DC', 700 => 'DCC', 800 => 'DCCC', 900 => 'CM', 1000 => 'M'
    ];
    
    /**
     * @param Integer $num
     * @return String
     */
    public function intToRoman($num) {
        if ($num > 9999) return false;

        $result = '';
        $multiplication = [1000, 100, 10, 1];

        while ($num !== 0) {
            $lastDigit = $num % 10;
            $num = floor($num / 10);
            $multi = array_pop($multiplication);

            if ($multi == null) break;

            $mResult = $lastDigit * $multi;

            if (isset(self::$NUMERALS[$mResult])) {
                $result = self::$NUMERALS[$mResult] . $result;
            } else {
                $result = str_repeat(self::$NUMERALS[$multi], $lastDigit) . $result;
            }
        }
        return $result;
    }
}