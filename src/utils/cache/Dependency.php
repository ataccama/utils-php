<?php

    namespace Ataccama\Common\Utils\Cache;

    use Nette\SmartObject;


    /**
     * Class Dependency
     * @package Ataccama\Common\Utils\Cache
     * @property-read string $id
     */
    class Dependency implements IKey, \Countable
    {
        use SmartObject;

        /** @var IKey */
        private $key;

        /** @var Dependency[] */
        private $parents = [];

        /**
         * Dependency constructor.
         * @param IKey $key
         */
        public function __construct(IKey $key)
        {
            $this->key = $key;
        }

        public function addParent(Dependency $dependency): void
        {
            $this->parents[$dependency->getId()] = $dependency;
        }

        public function removeDependency(Dependency $dependency): void
        {
            unset($this->parents[$dependency->getId()]);
        }

        public function getId()
        {
            return DataStorage::getKey($this->key);
        }

        public function getPrefix(): ?string
        {
            return "dependency";
        }

        /**
         * @return Dependency[]
         */
        public function listParents(): array
        {
            return $this->parents;
        }

        /**
         * @return IKey
         */
        public function getKey(): IKey
        {
            return $this->key;
        }

        public function count(): int
        {
            return count($this->parents);
        }
    }