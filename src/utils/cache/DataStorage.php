<?php

    namespace Ataccama\Common\Utils\Cache;

    use Nette\Caching\Cache;
    use Nette\Caching\Storages\FileStorage;


    /**
     * Class DataStorage
     * @package Ataccama\Common\Utils\Cache
     */
    class DataStorage
    {
        /** @var array */
        protected $objects = [];

        /** @var bool */
        public $cache = true;

        /** @var Cache */
        private $cachedStorage;

        /**
         * DataStorage constructor.
         * @param string $persistDir
         * @param bool   $cache
         */
        public function __construct(string $persistDir, bool $cache = true)
        {
            if (!file_exists($persistDir)) {
                mkdir($persistDir);
            }
            $storage = new FileStorage($persistDir);
            $this->cachedStorage = new Cache($storage, "layer.data");
            $this->cache = $cache;
        }

        /**
         * Returns the stored (and cached) object under the $key.
         *
         * @param IKey $key
         * @return mixed|null
         * @throws \Throwable
         */
        public function get(IKey $key)
        {
            $key = self::getKey($key);

            if ($this->cache) {
                $o = $this->cachedStorage->load($key);
                if ($o !== null) {
                    return $o;
                }
            }

            if (isset($this->objects[$key])) {
                if ($this->cache) {
                    $this->cachedStorage->save($key, $this->objects[$key], [
                        Cache::EXPIRE  => '2 months',
                        Cache::SLIDING => true
                    ]);
                }

                return $this->objects[$key];
            }

            return null;
        }

        /**
         * Adds object to data storage and cached it.
         *
         * @param IKey   $key
         * @param        $o
         * @param string $expireIn
         * @param bool   $cacheSliding
         * @return mixed
         * @throws \Throwable
         */
        public function add(IKey $key, $o, $expireIn = '2 months', $cacheSliding = true)
        {
            $key = self::getKey($key);

            $this->objects[$key] = $o;
            if ($this->cache) {
                $this->cachedStorage->save($key, $o, [
                    Cache::EXPIRE  => $expireIn,
                    Cache::SLIDING => $cacheSliding
                ]);
            }

            return $o;
        }

        /**
         * Call this function when stored data are changed.
         *
         * @param IKey $key
         */
        public function notifyChange(IKey $key): void
        {
            if ($this->cache) {
                $this->cachedStorage->remove(self::getKey($key));
            }
            unset($this->objects[self::getKey($key)]);
        }

        /**
         * @param IKey $key
         * @return string
         */
        public static function getKey(IKey $key): string
        {
            return (!empty($key->getPrefix()) ? $key->getPrefix() . '_' : '') . $key->id;
        }
    }