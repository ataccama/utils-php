<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Utils\Cache;

    use Nette\SmartObject;


    /**
     * Class Key
     * @package       Ataccama\Common\Utils\Cache
     * @property-read string  $id
     * @property-read ?string $prefix
     */
    class Key implements IKey
    {
        use SmartObject;


        private string $id;
        public ?string $prefix;

        /**
         * Key constructor.
         * @param $id
         * @param $prefix
         */
        public function __construct(string $id, ?string $prefix = null)
        {
            $this->id = $id;
            $this->prefix = $prefix;
        }

        /**
         * @return string
         */
        public function getId(): string
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