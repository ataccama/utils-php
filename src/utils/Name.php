<?php


    namespace Ataccama\Utils;

    use Nette\SmartObject;


    /**
     * Class Name
     * @package Ataccama\Environment\Base
     * @property string      $full
     * @property-read string $first
     * @property-read string $last
     */
    class Name
    {
        use SmartObject;

        /** @var string */
        protected $fullname;

        /** @var string[[ */
        private $exploded = [];

        /**
         * Name constructor.
         * @param string $fullname
         */
        public function __construct(string $fullname)
        {
            $this->fullname = $fullname;
            $this->exploded = explode(" ", trim($fullname));
        }

        /**
         * @return string
         */
        public function getFirst(): string
        {
            return $this->exploded[0];
        }

        /**
         * @return string
         */
        public function getLast(): string
        {
            $lastNames = [];
            for ($i = 1; $i < count($this->exploded); $i++) {
                $lastNames[] = $this->exploded[$i];
            }

            return implode(" ", $lastNames);
        }

        /**
         * @return string
         */
        public function getFull(): string
        {
            return $this->fullname;
        }

        /**
         * @param string $fullname
         */
        public function setFull(string $fullname): void
        {
            $this->fullname = $fullname;
            $this->exploded = explode(" ", trim($fullname));
        }

        /**
         * @return string
         */
        public function __toString()
        {
            return $this->fullname;
        }


    }