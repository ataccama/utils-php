<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    /**
     * Interface IPair
     * @package Ataccama\Common\Env
     */
    interface IPair
    {
        public function getKey(): int|string;

        public function getValue(): mixed;
    }