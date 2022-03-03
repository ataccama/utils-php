<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    /**
     * Interface Pairable
     * @package Ataccama\Common\Env
     */
    interface Pairable
    {
        /**
         * @return IPair
         */
        public function toPair(): IPair;
    }