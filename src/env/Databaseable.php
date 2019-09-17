<?php

    namespace Ataccama\Common\Env;

    /**
     * Interface Databaseable
     * @package Ataccama\Common\Env
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