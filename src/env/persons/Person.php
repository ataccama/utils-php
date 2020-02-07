<?php

    namespace Ataccama\Common\Env;

    /**
     * Class Person
     * @package Ataccama\Common\Env
     */
    class Person extends Entry
    {
        /** @var Name */
        public $name;

        /** @var Email */
        public $email;

        /**
         * Person constructor.
         * @param mixed $id
         * @param Name  $name
         * @param Email $email
         */
        public function __construct($id, Name $name, Email $email)
        {
            parent::__construct($id);
            $this->email = $email;
            $this->name = $name;
        }
    }