<?php

    namespace Ataccama\Common\Env;

    /**
     * Interface Pairable
     * @package Ataccama\Common\Env
     */
    interface Pairable
    {
        /**
         * @return PairArray
         */
        public function toPairs(): PairArray;
    }