<?php

    namespace Ataccama\Common\Utils\Paginators;

    use Ataccama\Common\Exceptions\NotDefined;
    use Nette\Utils\Paginator;


    /**
     * Class PaginatorList
     * @package Ataccama\Common\Utils\Paginators
     */
    class PaginatorList
    {
        private $paginators = [];

        /**
         * @param Paginator $paginator
         * @param string    $id
         * @return PaginatorList
         */
        public function add(Paginator $paginator, string $id): PaginatorList
        {
            $this->paginators[$id] = $paginator;

            return $this;
        }

        /**
         * @param string $id
         * @param int    $limit
         * @return Paginator
         */
        public function createPaginator(string $id, int $limit = 10): Paginator
        {
            $this->add((new Paginator())->setItemsPerPage($limit), $id);

            return $this->{$id};
        }

        /**
         * @param $id
         * @return Paginator
         * @throws NotDefined
         */
        public function __get($id)
        {
            if (isset($this->paginators[$id])) {
                return $this->paginators[$id];
            }

            throw new NotDefined("Paginator with ID $id does not exist.");
        }

        /**
         * @param string $id
         * @return Paginator
         * @throws NotDefined
         */
        public function get(string $id): Paginator
        {
            return $this->__get($id);
        }
    }