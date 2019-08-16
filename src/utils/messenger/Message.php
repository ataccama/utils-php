<?php

    namespace Ataccama\Utils;

    use Nette\Utils\DateTime;


    /**
     * Class Error
     * @package Ataccama\Utils
     */
    class Message extends \Ataccama\Environment\Entities\Base\Message
    {
        const ERROR = "danger";
        const SUCCESS = "success";
        const WARNING = "warning";

        /** @var string */
        public $code;

        /** @var DateTime */
        public $date;

        /** @var string */
        public $type;

        /**
         * Message constructor.
         * @param string        $message
         * @param string        $type
         * @param string|null   $code
         * @param DateTime|null $date
         */
        public function __construct(
            string $message,
            string $type = self::ERROR,
            string $code = null,
            DateTime $date = null
        ) {
            parent::__construct($message);
            $this->code = $code;
            $this->text = $message;
            $this->type = $type;
            if (!isset($date)) {
                $date = DateTime::from("now");
            }
            $this->date = $date;
        }
    }