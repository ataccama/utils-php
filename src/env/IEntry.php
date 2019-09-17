<?php

    namespace Ataccama\Common\Env;

    /**
     * Interface IEntry
     * @package Ataccama\Common\Env
     * @property-read mixed $id
     */
    interface IEntry
    {
        /**
         * @return mixed
         */
        public function getId();
    }