<?php

    namespace Ataccama\Common\Env;

    /**
     * Interface IPair
     * @package Ataccama\Common\Env
     */
    interface IPair
    {
        public function toPair(): Pair;
    }