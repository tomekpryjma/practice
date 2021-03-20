<?php

function isAnagram($stringA, $stringB) : bool {

    if (! $stringA && ! $stringB) {
        return true;
    }
    
    if (! $stringA || ! $stringB) {
        return false;
    }
    
    if (strlen($stringA) !== strlen($stringB)) {
        return false;
    }
    
    $sAArray = str_split($stringA);
    $sBArray = str_split($stringB);
    $sBArrayCount = count($sBArray);
    
    for ($indexB = 0; $indexB < $sBArrayCount; $indexB++) {
        $charB = $sBArray[$indexB];
        $searchResult = array_search($charB, $sAArray);
        
        if ($searchResult !== false) {
            unset($sAArray[$searchResult]);
            unset($sBArray[$indexB]);
        }
    }
    
    if (! $sAArray && ! $sBArray) {
        return true;
    }
    return false;
}

var_dump(isAnagram('', 'word')); // false
var_dump(isAnagram('word', '')); // false
var_dump(isAnagram('word', 'wor')); // false
var_dump(isAnagram('', '')); // true
var_dump(isAnagram('word', 'wrdo')); // true