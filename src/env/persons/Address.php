<?php

    namespace Ataccama\Common\Env\User;

    /**
     * Class Address
     * @package Ataccama\Common\Env\User
     */
    class Address
    {
        /** @var string */
        public $street;

        /** @var string */
        public $city;

        /** @var string */
        public $postcode;

        /** @var string */
        public $country;

        /** @var string|null */
        public $state;

        /** @var string|null */
        public $additionalDetail;

        /**
         * Address constructor.
         * @param string      $street
         * @param string      $city
         * @param string      $postcode
         * @param string      $country
         * @param string|null $state
         * @param string|null $additionalDetail
         */
        public function __construct(
            string $street,
            string $city,
            string $postcode,
            string $country,
            ?string $state = null,
            ?string $additionalDetail = null
        ) {
            $this->street = $street;
            $this->city = $city;
            $this->postcode = $postcode;
            $this->country = $country;
            $this->state = $state;
            $this->additionalDetail = $additionalDetail;
        }
    }