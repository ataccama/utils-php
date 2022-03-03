<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    use Nette\SmartObject;


    /**
     * Trait IdentifiedByString
     * @package Ataccama\Common\Env
     * @property-read string $id
     */
    trait IdentifiedByString
    {
        use SmartObject;


        protected string $id;

        /**
         * @return string
         */
        public function getId(): string
        {
            return $this->id;
        }
    }