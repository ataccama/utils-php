<?php


    namespace Ataccama\Environment\Entities\Base;


    use Ataccama\Utils\Name;


    /**
     * Class NamedEntry
     * @package Ataccama\Environment\Entities\Base
     * @property-read Name $name
     */
    class NamedEntry extends Entry
    {
        /** @var Name */
        protected $name;

        /**
         * Person constructor.
         * @param string $id
         * @param Name   $name
         */
        public function __construct(string $id, Name $name)
        {
            parent::__construct($id);
            $this->name = $name;
        }

        /**
         * @return Name
         */
        public function getName(): Name
        {
            return $this->name;
        }
    }