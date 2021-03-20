<?php

// https://leetcode.com/problems/add-two-numbers/

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        /**
         * $l1 and $l2 are HEADs of their list.
         */
        $head = null;
        $remainder = null;
        $carry = null;

        while ($l1 !== null || $l2 !== null || $carry !== 0) {
            echo "\n\n\n===================\n";
            
            var_dump('Start: $carry = ' . $carry);
            var_dump('Start: $remainder = ' . $remainder);
            echo "-------\n";
            
            $val1 = $l1 ? $l1->val : 0; // 5
            $val2 = $l2 ? $l2->val : 0; // 7
            
            var_dump('$val1 = ' . $val1);
            var_dump('$val2 = ' . $val2);
            echo "-------\n";
            
            $l1 = $l1->next ?? null;
            $l2 = $l2->next ?? null;

            $sum = $val1 + $val2; // 12
            
            if ($carry !== null) {
                $sum += $carry;
            }
            
            var_dump('$sum = ' . $sum);
            echo "-------\n";
            
            $remainder = $sum % 10; // 2
            $carry = ($sum - $remainder) / 10;
            
            var_dump('End: $carry = ' . $carry);
            var_dump('End: $remainder = ' . $remainder);
            echo "-------\n";

            $ln = new ListNode($remainder, $head);
            var_dump('$ln->val = ' . $ln->val);
            echo "-------\n";
            $head = $ln;
        }
        return $head;
    }
}

$ln1A = new ListNode(8, null);

$ln2A = new ListNode(3, null);


$s = new Solution();
echo "\n\n";
$head = $s->addTwoNumbers($ln1A, $ln2A);

while ($head !== null) {
    echo $head->val;
    $head = $head->next;
}