<?php

    namespace Ataccama\Utils;

    use Nette\SmartObject;


    /**
     * Class Email
     * @package Ataccama\Utils
     * @property-read string $domain
     */
    class Email
    {
        use SmartObject;

        /** @var string */
        public $definition;

        /**
         * Email constructor.
         * @param string $definition
         */
        public function __construct(string $definition)
        {
            $this->definition = $definition;
        }

        /**
         * @return string|null
         */
        public function getDomain(): ?string
        {
            $exploded = explode("@", $this->definition);

            if (isset($exploded[1])) {
                return $exploded[1];
            }

            return null;
        }

        public function __toString()
        {
            return $this->definition;
        }


    }