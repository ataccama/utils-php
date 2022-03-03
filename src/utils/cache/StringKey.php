<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Utils\Cache;

    use Ataccama\Common\Interfaces\IdentifiableByString;
    use Nette\SmartObject;


    /**
     * Class StringKey
     * @package Ataccama\Common\Utils\Cache
     * @property-read string $id
     * @property-read string $prefix
     */
    abstract class StringKey implements IKey
    {
        use SmartObject;


        protected string $id;

        /**
         * ContentKey constructor.
         * @param IdentifiableByString $object
         */
        public function __construct(IdentifiableByString $object)
        {
            $this->id = $object->id;
        }

        /**
         * @return string
         */
        public function getId(): string
        {
            return $this->id;
        }
    }