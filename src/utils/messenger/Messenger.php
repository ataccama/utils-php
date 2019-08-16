<?php

    namespace Ataccama\Utils;

    use Ataccama\Environment\IArray;
    use Nette\SmartObject;


    /**
     * Class Errors
     * @package Ataccama\Utils
     * @property-read string    $last
     * @property-read Messenger $dangers
     * @property-read Messenger $successes
     * @property-read Messenger $warnings
     */
    class Messenger implements \Countable, \Iterator, IArray
    {
        use SmartObject;

        /** @var Message[] */
        private $messages = [];

        /**
         * @param Message $message
         * @return Messenger
         */
        public function add(Message $message): Messenger
        {
            $this->messages[] = $message;

            return $this;
        }

        public function current(): Message
        {
            return current($this->messages);
        }

        public function next(): void
        {
            next($this->messages);
        }

        public function key(): int
        {
            return key($this->messages);
        }

        public function valid(): bool
        {
            return isset($this->messages[$this->key()]);
        }

        public function rewind(): void
        {
            reset($this->messages);
        }

        public function count()
        {
            return count($this->messages);
        }

        public function toArray(): array
        {
            return $this->messages;
        }

        /**
         * @return string
         */
        public function getLast(): string
        {
            return end($this->messages);
        }

        /**
         * @param string $type
         * @return Messenger
         */
        protected function list(string $type = Message::SUCCESS): Messenger
        {
            $messages = new Messenger();
            foreach ($this->messages as $message) {
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