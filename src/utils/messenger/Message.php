<?php
    declare(strict_types=1);

    namespace Ataccama\Common\Utils\Messenger;

    use Nette\Utils\DateTime;


    /**
     * Class Message
     * @package Ataccama\Common\Utils\Messsenger
     */
    class Message extends \Ataccama\Common\Env\Message
    {
        const ERROR = "danger";
        const SUCCESS = "success";
        const WARNING = "warning";

        public int $code;
        public DateTime $date;
        public string $type;

        /**
         * Message constructor.
         * @param string        $message
         * @param string        $type
         * @param int|null      $code
         * @param DateTime|null $date
         */
        public function __construct(
            string $message,
            string $type = self::ERROR,
            int $code = null,
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