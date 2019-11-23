<?php

/**
 * https://leetcode.com/problems/two-sum
 * Runtime: 12 ms, faster than 91.98% of PHP online submissions for Two Sum.
 * Memory Usage: 20 MB, less than 6.45% of PHP online submissions for Two Sum.
 * Next challenges:
 *
 * Class Solution
 */
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     * @throws Exception
     */
    public function twoSum($nums, $target): array
    {

        $hashmap = $this->convertHashmap($nums);


        foreach ($nums as $value) {

            $findKey = $target - $value;

            if (false === $this->hasAnswer($findKey, $hashmap)) {
                continue;
            }


            if ($value != $findKey) {
                return [$hashmap[$value][0], $hashmap[$findKey][0]];
            }


            if ($value == $findKey && count($hashmap[$value]) > 1) {
                return [$hashmap[$value][0], $hashmap[$findKey][1]];
            }
        }


        throw new Exception("Not Founded");

    }

    /**
     * @param $nums
     * @return array
     */
    private function convertHashmap($nums): array
    {
        $hashmap = [];
        foreach ($nums as $i => $value) {
            if (empty($hashmap[$value])) {
                $hashmap[$value] = [];
            }

            $hashmap[$value][] = $i;
        }
        return $hashmap;
    }

    /**
     * @param int $findKey
     * @param array $hashmap
     * @return bool
     */
    private function hasAnswer(int $findKey, array $hashmap): bool
    {
        return array_key_exists($findKey, $hashmap);
    }
}
