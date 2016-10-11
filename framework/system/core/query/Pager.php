<?php

namespace system\core\query;

/**
 * Páginação
 *
 * @author eduardo
 */
class Pager {

    /**
     * DQL
     * @var \Doctrine\ORM\QueryBuilder
     */
    private $dql;

    /**
     * Quantidades de registros por página
     * @var int
     */
    private $rp;

    /**
     * Pagina Atual
     * @var string
     */
    private $page;

    /**
     * Número total de páginas
     * @var int 
     */
    private $totalPage;

    public function __construct($dql, $rp, $page) {
        $this->dql = $dql;
        $this->rp = $rp;
        $this->page = $page;
    }

    public function execute() {
        $pager = new \Doctrine\ORM\Tools\Pagination\Paginator($this->dql);
        $pager->getQuery()
                ->setFirstResult($this->rp * ($this->page - 1))
                ->setMaxResults($this->totalPage);
        $this->totalPage = ceil(count($pager) / $this->rp);
        return $pager;
    }

    public function getPage() {
        return $this->page;
    }

    public function getTotalPage() {
        return $this->totalPage;
    }

    public function setPage($page) {
        $this->page = $page;
        return $this;
    }

}
