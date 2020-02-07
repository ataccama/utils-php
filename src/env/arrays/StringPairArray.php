<?php

    namespace Ataccama\Common\Env\Arrays;

    use Ataccama\Common\Env\Interfaces\IStringPair;
    use Ataccama\Common\Env\PairArray;


    /**
     * Class StringPairArray
     * @package Ataccama\Common\Env\Arrays
     */
    class StringPairArray extends PairArray
    {
        /**
         * StringPairArray constructor.
         * @param IStringPair[] $stringPairs
         */
        public function __construct(array $stringPairs = [])
        {
            parent::__construct();
            foreach ($stringPairs as $pair) {
                if ($pair instanceof IStringPair) {
                    $this->items[$pair->getKey()] = $pair;
                } else {
                    throw new \InvalidArgumentException("An element MUST implement interface IStringPair");
                }
            }
        }

        /**
         * @param string $key
         * @return IStringPair|null
         */
        public function get($key): ?IStringPair
        {
            if (isset($this->items[$key])) {
                return $this->items[$key];
            }

            return null;
        }

        /**
         * @param StringPairArray $stringPairArray
         * @return StringPairArray
         */
        public function insert($stringPairArray)
        {
            parent::insert($stringPairArray);

            return $this;
        }

        /**
         * @param IStringPair $pair
         * @return StringPairArray
         */
        public function add($pair): StringPairArray
        {
            $this->items[$pair->getKey()] = $pair;

            return $this;
        }

        /**
         * @return IStringPair
         */
        public function current(): IStringPair
        {
            return current($this->items);
        }

        public function toArray(): array
        {
            $pairs = [];
            foreach ($this as $stringPair) {
                $pairs[$stringPair->getKey()] = $stringPair->getValue();
            }

            return $pairs;
        }
    }