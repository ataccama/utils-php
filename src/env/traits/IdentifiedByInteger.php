<?php
    declare(strict_types=1);

    namespace Stolfam\Traits;

    use Nette\SmartObject;


    /**
     * Trait IdentifiedByInteger
     * @package Ataccama\Common\Traits
     * @property-read int $id
     */
    trait IdentifiedByInteger
    {
        use SmartObject;


        protected int $id;

        /**
         * @return int
         */
        public function getId(): int
        {
            return $this->id;
        }
    }