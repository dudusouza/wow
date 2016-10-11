<?php

namespace admin\form\field;

/**
 * Classe padrão de fildes de array
 *
 * @author eduardo
 */
abstract class FieldArray extends \admin\form\Field {

    /**
     * Array de valores e label
     * @var array
     */
    protected $arr;

    /**
     * Adiciona valores em um label
     * @param string $val
     * @param string $label
     */
    public function addVal($val, $label) {
        $this->arr[$val] = $label;
    }

    /**
     * Seta um array bimenciona
     * @param array $arr
     * @param string $val índice do valor
     * @param string $label índice array
     */
    public function setArrayBi($arr, $val, $label) {
        foreach ($arr as $arrItem) {
            $this->addVal($arrItem[$val], $arrItem[$label]);
        }
    }

    /**
     * Seta um array na formatacao onde valor é indice e label é valor
     * @param array $arr
     */
    public function setArray($arr) {
        $this->arr = $arr;
    }

    /**
     * Seta uma DQL
     * @param \Doctrine\ORM\QueryBuilder $dql
     * @param string $val coluna do valor
     * @param string $label coluna do label
     */
    public function setDql($dql, $val, $label) {
        $arr = $dql->getQuery()->getArrayResult();
        $this->setArrayBi($arr, $val, $label);
    }
    

}
