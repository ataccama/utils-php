<?php

    namespace Ataccama\Common\Env;

    use Ataccama\Common\Env\Arrays\StringPairArray;


    /**
     * Interface Storable
     * @package Ataccama\Common\Env
     */
    interface Storable
    {
        public function toPairs(): StringPairArray;
    }