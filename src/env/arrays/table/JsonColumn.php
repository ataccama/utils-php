<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    /**
     * Class JsonColumn
     * @package Ataccama\Common\Env
     */
    class JsonColumn extends NullableJsonColumn
    {
        /**
         * JsonColumn constructor.
         * @param string $name
         * @param string $value
         */
        public function __construct(string $name, string $value)
        {
            parent::__construct($name, $value);
        }

        public function getValue(): string
        {
            return parent::getValue();
        }
    }