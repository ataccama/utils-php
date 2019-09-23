<?php

    namespace Ataccama\Common\Env;

    /**
     * Class BaseArray
     * @package Ataccama\Common\Env
     */
    class BaseArray implements \Iterator, IArray, \Countable
    {
        protected $items = [];

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
            return current($this->items);
        }

        public function next(): void
        {
            next($this->items);
        }

        /**
         * @return int
         */
        public function key(): int
        {
            return key($this->items);
        }

        /**
         * @return bool
         */
        public function valid(): bool
        {
            return (bool) current($this->items);
        }

        public function rewind(): void
        {
            reset($this->items);
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

        public function get($i)
        {
            return $this->items[$i];
        }
    }