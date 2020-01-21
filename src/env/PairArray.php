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
         * @param IPair[] $array
         */
        public function __construct(array $array = [])
        {
            foreach ($array as $data) {
                if ($data instanceof IPair) {
                    $this->items[] = $data->toPair();
                }
            }
        }

        /**
         * @param Pair $pair
         */
        public function add($pair)
        {
            parent::add($pair);
        }

        /**
         * @return Pair
         */
        public function current(): Pair
        {
            return parent::current();
        }

        /**
         * @param string $key
         * @return Pair|null
         */
        public function tryToGetPairByKey(string $key): ?Pair
        {
            foreach ($this->items as $pair) {
                if ($pair->key == $key) {
                    return $pair;
                }
            }

            return null;
        }

        public function toArray(): array
        {
            $array = [];

            foreach ($this as $pair) {
                $array[$pair->key] = $pair->value;
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
                $entries->add(new Entry($pair->key));
            }

            return $entries;
        }
    }