<?php


    namespace Ataccama\Utils;

    /**
     * Interface Comparator
     * @package Ataccama\Utils\Comparator
     */
    interface IComparator
    {
        /**
         * @param Comparable $obj1
         * @param Comparable $obj2
         * @return bool
         */
        public function greater(Comparable $obj1, Comparable $obj2): bool;

        /**
         * @param Comparable $obj1
         * @param Comparable $obj2
         * @return bool
         */
        public function equal(Comparable $obj1, Comparable $obj2): bool;

        /**
         * @param Comparable $obj1
         * @param Comparable $obj2
         * @return bool
         */
        public function less(Comparable $obj1, Comparable $obj2): bool;
    }