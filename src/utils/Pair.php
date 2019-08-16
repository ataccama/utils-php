<?php


    namespace Ataccama\Environment;

    /**
     * Class Pair
     * @package Ataccama\Environment\Entities\Base
     */
    class Pair implements IPair
    {
        public $key, $value;

        /**
         * Pair constructor.
         * @param $key
         * @param $value
         */
        public function __construct($key, $value)
        {
            $this->key = $key;
            $this->value = $value;
        }

        public function toPair(): Pair
        {
            return $this;
        }
    }