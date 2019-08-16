<?php

    namespace Ataccama\Environment;

    /**
     * Class BaseArray
     * @package Ataccama\Environment\Entities\Base
     */
    class BaseArray implements \Iterator, IArray, \Countable
    {
        protected $items = [];
        private $pointer = 0;

        public function add($o)
        {
            $this->items[] = $o;
        }

        public function empty(): void
        {
            $this->items = [];
        }

        public function current()
        {
            return $this->items[$this->pointer];
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
            return isset($this->items[$this->pointer]);
        }

        public function rewind(): void
        {
            $this->pointer = 0;
        }

        public function toArray(): array
        {
            return $this->items;
        }

        /**
         * @return int
         */
        public function count(): int
        {
            return count($this->items);
        }
    }