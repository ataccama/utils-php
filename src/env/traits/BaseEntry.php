<?php
    declare(strict_types=1);

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
        protected mixed $id;

        /**
         * @return mixed
         */
        public function getId(): mixed
        {
            return $this->id;
        }
    }