<?php

    namespace Ataccama\Common\Env;

    /**
     * Class PairArray
     * @package Ataccama\Common\Env
     */
    class PairArray extends BaseArray
    {
        /**
         * PairArray constructor.
         * @param IPair[] $pairs
         */
        public function __construct(array $pairs = [])
        {
            foreach ($pairs as $pair) {
                if ($pair instanceof IPair) {
                    $this->items[] = $pair;
                }
            }
        }

        /**
         * @param IPair $pair
         * @return PairArray
         */
        public function add($pair): PairArray
        {
            if ($pair instanceof IPair) {
                $this->items[$pair->getKey()] = $pair;
            }

            return $this;
        }

        /**
         * @return IPair
         */
        public function current(): IPair
        {
            return parent::current();
        }

        /**
         * @param $key
         * @return IPair|null
         */
        public function get($key): ?IPair
        {
            if (isset($this->items[$key])) {
                return parent::get($key);
            }

            return null;
        }

        /**
         * @param string $key
         * @return IPair|null
         * @deprecated
         */
        public function tryToGetPairByKey(string $key): ?IPair
        {
            foreach ($this as $pair) {
                if ($pair->getKey() == $key) {
                    return $pair;
                }
            }

            return null;
        }

        public function toArray(): array
        {
            $array = [];

            foreach ($this as $pair) {
                $array[$pair->getKey()] = $pair->getValue();
            }

            return $array;
        }

        /**
         * Returns an array of keys (IDs).
         *
         * @return EntryList
         */
        public function toEntryList(): EntryList
        {
            $entries = new EntryList();
            foreach ($this as $pair) {
                $entries->add(new Entry($pair->getKey()));
            }

            return $entries;
        }
    }