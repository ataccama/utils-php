<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    use Ataccama\Common\Env\Interfaces\IColumn;


    /**
     * Class Column
     * @package Ataccama\Common\Env
     */
    class Column implements IColumn
    {
        protected string $name;
        protected mixed $value;

        /**
         * Column constructor.
         * @param string     $name
         * @param mixed|null $value
         */
        public function __construct(string $name, $value = null)
        {
            $this->name = $name;
            $this->value = $value;
        }

        public function getName(): string
        {
            return $this->name;
        }

        public function getValue(): mixed
        {
            return $this->value;
        }
    }