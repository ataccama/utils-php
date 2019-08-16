<?php

    namespace Ataccama\Environment\Entities\Base;

    use Nette\SmartObject;


    /**
     * Class Message
     * @package Ataccama\Environment\Entities\Base
     */
    class Message
    {
        use SmartObject;

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