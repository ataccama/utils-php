<?php

    namespace Ataccama\Common\Utils;

    use Nette\SmartObject;
    use Nette\Utils\DateTime;


    /**
     * Class DateRange
     * @package Ataccama\Common\Utils
     * @property-read \DateInterval $interval
     */
    class DateRange
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