<?php

    namespace Ataccama\Common\Env;

    use Nette\SmartObject;


    /**
     * Class Entry
     * @package Ataccama\Common\Env
     * @property-read mixed $id
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
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }
    }