<?php

    namespace Ataccama\Common\Utils\Cache;

    use Nette\SmartObject;


    /**
     * Class Key
     * @package       Ataccama\Common\Utils\Cache
     * @property-read mixed $id
     * @property-read ?string $prefix
     */
    class Key implements IKey
    {
        use SmartObject;

        private $id, $prefix;

        /**
         * Key constructor.
         * @param $id
         * @param $prefix
         */
        public function __construct($id, $prefix = null)
        {
            $this->id = $id;
            $this->prefix = $prefix;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @return string|null
         */
        public function getPrefix(): ?string
        {
            return $this->prefix;
        }
    }