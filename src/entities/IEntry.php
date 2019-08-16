<?php


    namespace Ataccama\Environment\Entities\Base;

    /**
     * Interface IEntry
     * @package Ataccama\Environment\Base
     * @property-read string $id
     */
    interface IEntry
    {
        public function getId(): string;
    }