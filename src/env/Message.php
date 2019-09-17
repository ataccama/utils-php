<?php

    namespace Ataccama\Common\Env;

    /**
     * Class Message
     * @package Ataccama\Common\Env
     */
    class Message
    {
        /** @var string */
        public $text;

        /**
         * Message constructor.
         * @param string $text
         */
        public function __construct(string $text)
        {
            $this->text = $text;
        }
    }