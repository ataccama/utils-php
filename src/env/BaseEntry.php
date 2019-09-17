<?php

    namespace Ataccama\Common\Env;

    use Nette\SmartObject;


    /**
     * Trait BaseEntry
     * @package Ataccama\Common\Env
     * @property-read mixed $id
     */
    trait BaseEntry
    {
        use SmartObject;

        /** @var mixed */
        protected $id;

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }
    }