<?php

    namespace Ataccama\Utils;

    /**
     * Interface Comparable
     * @package Ataccama\Utils\Comparator
     * @property-read int $value
     */
    interface Comparable
    {
        /**
         * Returns a value for comparing.
         *
         * @return int
         */
        public function getValue(): int;
    }