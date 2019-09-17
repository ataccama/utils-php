<?php

    namespace Ataccama\Common\Utils\Comparator;

    /**
     * Interface Comparable
     * @package Ataccama\Common\Utils\Comparator
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