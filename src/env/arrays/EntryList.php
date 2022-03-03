<?php

    namespace Ataccama\Common\Env;

    use Ataccama\Common\Interfaces\IdentifiableByString;


    /**
     * Class EntryList
     * @package Ataccama\Common\Env
     */
    class EntryList extends BaseArray
    {
        /**
         * Adds IEntry to array.
         *
         * @param IdentifiableByString $entry
         * @return EntryList
         */
        public function add($entry): self
        {
            $this->items[$entry->id] = $entry;

            return $this;
        }

        /**
         * @return IdentifiableByString
         */
        public function current(): IdentifiableByString
        {
            return parent::current();
        }

        /**
         * @return string[]
         */
        public function toIds(): array
        {
            $array = [];

            foreach ($this as $entry) {
                $array[] = $entry->id;
            }

            return $array;
        }
    }