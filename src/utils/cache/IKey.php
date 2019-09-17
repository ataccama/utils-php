<?php

    namespace Ataccama\Common\Utils\Cache;

    use Ataccama\Common\Env\IEntry;


    /**
     * Interface IKey
     * @package Ataccama\Common\Utils\Cache
     */
    interface IKey extends IEntry
    {
        public function getPrefix(): ?string;
    }