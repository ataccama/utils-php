<?php

    namespace Ataccama\Common\Utils;

    use Nette\SmartObject;
    use Nette\Utils\DateTime;


    /**
     * Class DateRange
     * @package Ataccama\Common\Utils
     * @property-read \DateInterval $interval
     * @property-read int           $dTimestamp
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
         * @return \Ataccama\Common\Utils\DT\DateInterval
         * @throws \Exception
         */
        public function getInterval(): \Ataccama\Common\Utils\DT\DateInterval
        {
            $d = $this->from->diff($this->to);
            if ($d !== false) {
                return \Ataccama\Common\Utils\DT\DateInterval::create($d);
            }

            throw new \Exception("Difference between two dates is not possible");
        }

        /**
         * Returns a difference between FROM and TO in seconds.
         *
         * @return int
         */
        public function getDTimestamp(): int
        {
            return $this->to->getTimestamp() - $this->from->getTimestamp();
        }
    }