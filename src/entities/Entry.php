<?php

    namespace Ataccama\Environment\Entities\Base;

    use Nette\SmartObject;


    /**
     * Class Entry
     * @package Ataccama\Environment\Base
     * @property-read string $id
     */
    class Entry implements IEntry
    {
        use SmartObject;

        /** @var string */
        protected $id;

        /**
         * Entry constructor.
         * @param string $id
         */
        public function __construct(string $id)
        {
            $this->id = $id;
        }

        /**
         * @return string
         */
        public function getId(): string
        {
            return $this->id;
        }
    }