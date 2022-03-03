<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    /**
     * Interface IPairs
     * @package Ataccama\Common\Env
     */
    interface IPairs
    {
        public function toPairs(): PairArray;
    }