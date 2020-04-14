<?php

    declare(strict_types=1);

    namespace Ataccama\Common\Env\Prototypes;

    use Ataccama\Common\Interfaces\IdentifiableByInteger;
    use Nette\SmartObject;


    /**
     * Class IntegerId
     * @package Ataccama\Common\Env\Prototypes
     * @property-read int $id
     */
    class IntegerId implements IdentifiableByInteger
    {
        use SmartObject;

        protected int $id;

        public function getId(): int
        {
            return $this->id;
        }
    }