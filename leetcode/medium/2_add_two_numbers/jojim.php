<?php

use Kkame\Leetcode\AddTwoNumbers\ListNode;


/**
 *
 * Runtime: 12 ms, faster than 95.04% of PHP online submissions for Add Two Numbers.
 * Memory Usage: 14.8 MB, less than 100.00% of PHP online submissions for Add Two Numbers.
 *
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution
{

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    public function addTwoNumbers($l1, $l2)
    {

        $returnNode = null;
        $lastNode = null;
        $carry = 0;

        $checkNode1 = $l1;
        $checkNode2 = $l2;

        do {

            [$carry, $var] = $this->sum($checkNode1, $checkNode2, $carry);


            $checkNode1 = $checkNode1->next ?? null;
            $checkNode2 = $checkNode2->next ?? null;


            $newNode = new ListNode($var);


            if ($lastNode) {
                $lastNode->next = $newNode;
            } else {
                $returnNode = $newNode;
            }

            $lastNode = $newNode;

        } while ($this->continuing($checkNode1, $checkNode2));

        if ($carry) {
            $lastNode->next = new ListNode($carry);
        }


        return $returnNode;

    }


    private function continuing(?ListNode $l1, ?ListNode $l2): bool
    {
        if (empty($l1) && empty($l2)) {
            return false;
        }


        return true;
    }

    private function sum(?ListNode $checkNode1, ?ListNode $checkNode2, int $carry): array
    {
        $sum = ($checkNode1->val ?? 0) + ($checkNode2->val ?? 0) + $carry;

        return [(int)($sum / 10), $sum % 10];
    }


}
