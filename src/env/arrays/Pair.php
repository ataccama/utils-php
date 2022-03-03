<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    /**
     * Class Pair
     * @package Ataccama\Common\Env
     */
    class Pair implements IPair
    {
        public int|string $key;
        public mixed $value;

        /**
         * Pair constructor.
         * @param $key
         * @param $value
         */
        public function __construct(int|string $key, mixed $value)
        {
            $this->key = $key;
            $this->value = $value;
        }

        public function getKey(): int|string
        {
            return $this->key;
        }

        public function getValue(): mixed
        {
            return $this->value;
        }
    }