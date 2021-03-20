<?php

// https://leetcode.com/problems/roman-to-integer/

class Solution {
    function assocToString($arr) {
        $str = '';
        foreach ($arr as $key => $value) {
            $str .= $value;
        }
        return $str;
    }

    /**
     * @param String $s
     * @return Integer
     */
    function romanToInt($s) {
        $numerals = [
            'I' => 1,
            'II' => 2,
            'III' => 3,
            'IV' => 4,
            'V' => 5,
            'VI' => 6,
            'VII' => 7,
            'VIII' => 8,
            'IX' => 9,
            'X' => 10,
            'XX' => 20,
            'XXX' => 30,
            'XL' => 40,
            'L' => 50,
            'LX' => 60,
            'LXX' => 70,
            'LXXX' => 80,
            'XC' => 90,
            'C' => 100,
            'CC' => 200,
            'CCC' => 300,
            'CL' => 150,
            'CD' => 400,
            'D' => 500,
            'CM' => 900,
            'M' => 1000
        ];
        $sum = 0;

        if (isset($numerals[$s])) return $numerals[$s];

        $sArray = str_split($s);
        $maxSequenceLength = 3; // The first char of the max of 4 in a sequence is being accounted for in the top level loop.

        for ($indexA = count($sArray) - 1; $indexA > -1; $indexA--) {
            if (count($sArray) == 0)  break;

            $sequence = array();
            $sequence[$indexA] = $sArray[$indexA];
            $headIndex = $indexA - 1;

            // Constructs sequence
            for ($indexB = 0; $indexB < $maxSequenceLength; $indexB++) {
                if ($headIndex == -1) break;

                $sequence[$headIndex] = $sArray[$headIndex];
                $headIndex--;
            }


            $sequenceAsString = $this->assocToString(array_reverse($sequence));

            while (true) {
                if (isset($numerals[$sequenceAsString])) {
                    $sum += $numerals[$sequenceAsString];

                    // If sequence is found in $numerals, remove that sequence of chars
                    // from the input array as there is no need to loop over those chars again.
                    foreach ($sequence as $key => $value) {
                        unset($sArray[$key]);
                    }

                    $indexA = count($sArray);

                    break; // break while loop
                }

                array_pop($sequence);
                $sequenceAsString = $this->assocToString(array_reverse($sequence));
            }
        }

        return $sum;
    }
}