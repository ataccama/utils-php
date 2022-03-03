<?php

    namespace Ataccama\Common\Utils\Cache;

    use Ataccama\Common\Interfaces\IdentifiableByString;
    use Nette\SmartObject;


    /**
     * Class EntryKey
     * @package Ataccama\Common\Utils\Cache
     * @property-read mixed  $id
     * @property-read string $prefix
     */
    abstract class EntryKey implements IKey
    {
        use SmartObject;


        protected $id;

        /**
         * ContentKey constructor.
         * @param IdentifiableByString $entry
         */
        public function __construct(IdentifiableByString $entry)
        {
            $this->id = $entry->id;
        }

        /**
         * @return string
         */
        public function getId(): string
        {
            return $this->id;
        }
    }