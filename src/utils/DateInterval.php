<?php

    namespace Ataccama\Common\Utils;

    use Nette\SmartObject;
    use Nette\Utils\DateTime;


    /**
     * Class DateInterval
     * @deprecated Use a new class DateRange
     * @package Ataccama\Common\Utils
     * @property-read \DateInterval $interval
     */
    class DateInterval
    {
        use SmartObject;

        /** @var DateTime */
        public $from;

        /** @var DateTime|null */
        public $to;

        /**
         * DateInterval constructor.
         * @param DateTime $from
         * @param DateTime $to
         */
        public function __construct(DateTime $from, DateTime $to = null)
        {
            $this->from = $from;
            $this->to = $to;
        }

        /**
         * @return \DateInterval
         */
        public function getInterval(): \DateInterval
        {
            return $this->from->diff($this->to);
        }
    }