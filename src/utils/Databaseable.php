<?php


    namespace Ataccama\Environment;

    /**
     * Interface Databaseable
     * @package Ataccama\Environment\Entities\Base
     */
    interface Databaseable
    {
        /**
         * Defines array/values for database inserting
         *
         * @return array
         */
        public function row(): array;
    }