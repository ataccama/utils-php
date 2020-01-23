<?php

    namespace Ataccama\Common\Utils;

    /**
     * Class DateTime
     * @package Ataccama\Common\Utils
     */
    class DateTime extends \Nette\Utils\DateTime
    {
        public static function now(): DateTime
        {
            return DateTime::from("now");
        }
    }