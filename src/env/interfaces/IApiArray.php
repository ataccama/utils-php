<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    /**
     * Interface IApiArray
     * @package Ataccama\Common\Env
     */
    interface IApiArray
    {
        public function toApiArray(): array;
    }