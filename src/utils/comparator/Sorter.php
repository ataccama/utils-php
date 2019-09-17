<?php

    namespace Ataccama\Common\Utils\Comparator;

    /**
     * Class Sorter
     * @package Ataccama\Common\Utils\Comparator
     */
    class Sorter
    {
        const DESC = false;
        const ASC = true;

        /**
         * @param Comparable[] $array
         * @param IComparator  $comparator
         * @param int          $type
         * @return Comparable[]
         */
        public static function sort(array &$array, IComparator $comparator, int $type = self::ASC): array
        {
            $sorted = false;
            while (!$sorted) {
                $sorted = true;
                for ($i = 0; $i < count($array) - 1; $i++) {
                    if ($type) {
                        if ($comparator->greater($array[$i], $array[$i + 1])) {
                            $tmp = $array[$i];
                            $array[$i] = $array[$i + 1];
                            $array[$i + 1] = $tmp;
                            $sorted = false;
                        }
                    } else {
                        if ($comparator->less($array[$i], $array[$i + 1])) {
                            $tmp = $array[$i];
                            $array[$i] = $array[$i + 1];
                            $array[$i + 1] = $tmp;
                            $sorted = false;
                        }
                    }
                }
            }

            return $array;
        }
    }