<?php


    namespace Ataccama\Environment\Entities\Base;

    use Ataccama\Utils\Email;
    use Ataccama\Utils\Name;


    /**
     * Class Person
     * @package Ataccama\Environment\Base
     * @property-read Email $email
     */
    class Person extends NamedEntry
    {
        /** @var Email */
        protected $email;

        /**
         * Person constructor.
         * @param string $id
         * @param Name   $name
         * @param Email  $email
         */
        public function __construct(string $id, Name $name, Email $email)
        {
            parent::__construct($id, $name);
            $this->email = $email;
        }

        /**
         * @return Email
         */
        public function getEmail(): Email
        {
            return $this->email;
        }
    }