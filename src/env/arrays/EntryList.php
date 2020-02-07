<?php

    namespace Ataccama\Common\Env;

    /**
     * Class EntryList
     * @package Ataccama\Common\Env
     */
    class EntryList
    {
        use TArray;

        /**
         * Adds IEntry to array.
         *
         * @param IEntry $entry
         * @return EntryList
         */
        public function add(IEntry $entry)
        {
            $this->items[$entry->id] = $entry;

            return $this;
        }

        /**
         * @return IEntry
         */
        public function current(): IEntry
        {
            return parent::current();
        }
    }