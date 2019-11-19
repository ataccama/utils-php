<?php

    namespace Ataccama\Utils;

    use Nette\Utils\DateTime;
    use Nette\Utils\Strings;


    /**
     * Class Clock
     * @package Ataccama\Utils
     */
    class Clock
    {
        private static $dataPath = __DIR__ . "/../../../temp/clocks";

        /** @var string */
        private $id;

        /** @var string */
        private $tickLength;

        /**
         * @param string $path
         */
        public static function setDataPath(string $path): void
        {
            self::$dataPath = $path;
        }

        /**
         * Clock constructor.
         * @param string $id
         * @param string $tickLength
         */
        public function __construct(string $id, string $tickLength)
        {
            $this->id = $id;
            $this->tickLength = $tickLength;

            if (!file_exists(self::$dataPath)) {
                mkdir(self::$dataPath);
            }
        }

        public function nextTick(): bool
        {
            $filename = self::$dataPath . "/clock_" . $this->getId() . ".json";
            if (file_exists($filename)) {
                $file = file_get_contents($filename);
                $state = json_decode($file);
                $lastTick = DateTime::from($state->dt);
                if ($lastTick->getTimestamp() < DateTime::from("-" . $this->tickLength)
                        ->getTimestamp()) {
                    return true;
                }

                return false;
            }

            return true;
        }

        public function tick(): void
        {
            file_put_contents(self::$dataPath . "/clock_" . $this->getId() . ".json", $this->getState());
        }

        /**
         * @return string
         */
        public function getId(): string
        {
            return str_replace("-", "", Strings::webalize($this->id));
        }

        /**
         * @return string
         */
        protected function getState(): string
        {
            return json_encode([
                "dt" => DateTime::from("now")
                    ->format("Y-m-d H:i:s"),
                "id" => $this->id,
                "tl" => $this->tickLength
            ]);
        }

        /**
         * Resets the clock.
         */
        public function reset(): void
        {
            if (file_exists(self::$dataPath . "/clock_" . $this->getId() . ".json")) {
                unlink(self::$dataPath . "/clock_" . $this->getId() . ".json");
            }
        }
    }