<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    use Nette\SmartObject;


    /**
     * Trait IdentifiedByInteger
     * @package Ataccama\Common\Env
     * @property-read int $id
     */
    trait IdentifiedByInteger
    {
        use SmartObject;


        protected int $id;

        /**
         * @return string
         */
        public function getId(): int
        {
            return $this->id;
        }
    }