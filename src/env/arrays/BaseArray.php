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
        protected array $items = [];

        public function add(mixed $o): self
        {
            $this->items[] = $o;

            return $this;
        }

        public function empty(): bool
        {
            return $this->count() == 0;
        }

        public function current(): mixed
        {
            return current($this->items);
        }

        public function next(): void
        {
            next($this->items);
        }

        public function key(): null|int|string
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

        public function get(int|string $i): mixed
        {
            if (isset($this->items[$i])) {
                return $this->items[$i];
            }

            return null;
        }

        public function __isset(string $i): bool
        {
            return isset($this->items[$i]);
        }

        /**
         * @param bool             $type
         * @param IComparator|null $comparator
         * @return $this
         * @throws \Exception
         */
        public function sort(bool $type = Sorter::ASC, IComparator $comparator = null): self
        {
            if (!isset($comparator)) {
                $comparator = new Comparator();
            }

            foreach ($this->items as $item) {
                if (!($item instanceof Comparable)) {
                    throw new \Exception("Item must implements interface Comparable.");
                }
            }

            Sorter::sort($this->items, $comparator, $type);

            return $this;
        }

        public function insert(iterable $baseArray): self
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

        public function remove(int|string $i, bool $reIndex = false): mixed
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
    }