<?php


    namespace Ataccama\Environment;

    /**
     * Class PairArray
     * @package Ataccama\Environment\Entities\Base
     */
    class PairArray implements \Iterator, \Countable, IArray
    {
        /** @var Pair[] */
        private $pairs = [];

        /** @var int */
        private $pointer = 0;

        /**
         * PairArray constructor.
         * @param IPair[] $array
         */
        public function __construct(array $array = [])
        {
            foreach ($array as $data) {
                $this->pairs[] = $data->toPair();
            }
        }

        /**
         * @param Pair $pair
         * @return PairArray
         */
        public function add(Pair $pair): PairArray
        {
            $this->pairs[] = $pair;

            return $this;
        }

        /**
         * @return Pair
         */
        public function current(): Pair
        {
            return $this->pairs[$this->pointer];
        }

        public function next(): void
        {
            $this->pointer++;
        }

        /**
         * @return int
         */
        public function key(): int
        {
            return $this->pointer;
        }

        /**
         * @return bool
         */
        public function valid(): bool
        {
            return isset($this->pairs[$this->pointer]);
        }

        public function rewind(): void
        {
            $this->pointer = 0;
        }

        /**
         * @return int
         */
        public function count(): int
        {
            return count($this->pairs);
        }

        /**
         * @param string $key
         * @return Pair|null
         */
        public function tryToGetPairByKey(string $key): ?Pair
        {
            foreach ($this->pairs as $pair) {
                if ($pair->key == $key) {
                    return $pair;
                }
            }

            return null;
        }

        public function toArray(): array
        {
            $array = [];

            foreach ($this->pairs as $pair) {
                $array[$pair->key] = $pair->value;
            }

            return $array;
        }
    }