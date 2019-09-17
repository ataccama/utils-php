<?php

    namespace Ataccama\Common\Utils\Messenger;

    use Ataccama\Common\Env\BaseArray;
    use Nette\SmartObject;


    /**
     * Class Messenger
     * @package Ataccama\Common\Utils\Messenger
     * @property-read string    $last
     * @property-read Messenger $dangers
     * @property-read Messenger $successes
     * @property-read Messenger $warnings
     */
    class Messenger extends BaseArray
    {
        use SmartObject;

        /**
         * @param Message $message
         */
        public function add($message)
        {
            parent::add($message);

        }

        /**
         * @return Message
         */
        public function current(): Message
        {
            return parent::current();
        }

        /**
         * @return Message
         */
        public function getLast(): Message
        {
            return end($this->items);
        }

        /**
         * @param string $type
         * @return Messenger
         */
        protected function list(string $type = Message::SUCCESS): Messenger
        {
            $messages = new Messenger();
            foreach ($this as $message) {
                if ($message->type == $type) {
                    $messages->add($message);
                }
            }

            return $messages;
        }

        /**
         * @return Messenger
         */
        public function getDangers(): Messenger
        {
            return $this->list(Message::ERROR);
        }

        /**
         * @return Messenger
         */
        public function getSuccesses(): Messenger
        {
            return $this->list(Message::SUCCESS);
        }

        /**
         * @return Messenger
         */
        public function getWarnings(): Messenger
        {
            return $this->list(Message::WARNING);
        }
    }