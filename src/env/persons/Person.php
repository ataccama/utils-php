<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Env;

    use Ataccama\Common\Env\Prototypes\StringId;


    /**
     * Class Person
     * @package Ataccama\Common\Env
     */
    class Person extends StringId
    {
        public Name $name;
        public Email $email;

        /**
         * Person constructor.
         * @param string $id
         * @param Name  $name
         * @param Email $email
         */
        public function __construct(string $id, Name $name, Email $email)
        {
            parent::__construct($id);
            $this->email = $email;
            $this->name = $name;
        }
    }