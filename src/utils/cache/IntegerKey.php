<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Utils\Cache;

    use Ataccama\Common\Interfaces\IdentifiableByInteger;
    use Nette\SmartObject;


    /**
     * Class IntegerKey
     * @package Ataccama\Common\Utils\Cache
     * @property-read string $id
     * @property-read string $prefix
     */
    abstract class IntegerKey implements IKey
    {
        use SmartObject;


        protected int $id;

        /**
         * ContentKey constructor.
         * @param IdentifiableByInteger $object
         */
        public function __construct(IdentifiableByInteger $object)
        {
            $this->id = $object->id;
        }

        /**
         * @return string
         */
        public function getId(): string
        {
            return (string) $this->id;
        }
    }