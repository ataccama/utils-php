<?php

    namespace Ataccama\Common\Env;

    use Ataccama\Common\Utils\Comparator\Comparable;
    use Ataccama\Common\Utils\Comparator\Comparator;
    use Ataccama\Common\Utils\Comparator\IComparator;
    use Ataccama\Common\Utils\Comparator\Sorter;


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

            return $this;
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

        public function key()
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
            if (isset($this->items[$i])) {
                return $this->items[$i];
            }

            return null;
        }

        public function __isset(string $i)
        {
            return isset($this->items[$i]);
        }

        /**
         * Array items have to implement Comparable interface or function will return FALSE.
         *
         * @param bool             $type
         * @param IComparator|null $comparator
         * @return BaseArray|bool
         */
        public function sort(bool $type = Sorter::ASC, IComparator $comparator = null)
        {
            if (!isset($comparator)) {
                $comparator = new Comparator();
            }

            foreach ($this->items as $item) {
                if (!($item instanceof Comparable)) {
                    return false;
                }
            }

            Sorter::sort($this->items, $comparator, $type);

            return $this;
        }

        public function insert($baseArray)
        {
            foreach ($baseArray as $item) {
                $this->add($item);
            }

            return $this;
        }

        public function clear(): void
        {
            $this->items = [];
        }

        public function remove($i, bool $reIndex = false)
        {
            $item = null;

            if (isset($this->items[$i])) {
                $item = $this->items[$i];
                unset($this->items[$i]);
                if ($reIndex) {
                    $this->items = array_values($this->items);
                }
            }

            return $item;
        }

        /**
         * Returns pairs.
         *
         * @return PairArray
         */
        public function toPairs(): PairArray
        {
            $pairs = new PairArray();
            foreach ($this->items as $key => $value) {
                $pairs->add(new Pair($key, $value));
            }

            return $pairs;
        }
    }