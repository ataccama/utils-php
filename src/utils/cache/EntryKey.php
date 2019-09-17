<?php

    namespace Ataccama\Common\Utils\Cache;

    use Ataccama\Common\Env\IEntry;
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

        /** @var mixed */
        protected $id;

        /**
         * ContentKey constructor.
         * @param IEntry $entry
         */
        public function __construct(IEntry $entry)
        {
            $this->id = $entry->id;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }
    }