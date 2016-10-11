<?php

namespace admin\form\field;

/**
 * Classe de teste na administração
 *
 * @author eduardo
 */
class Html extends \admin\form\Field {
    
    /**
     * Numero de caracteres
     * @var int
     */
    private $length = 0;

    public function field() {
        $this->template->assign('max', $this->length);
        return $this->render('fields/html/field.tpl');
    }

    /**
     * Retorna o tamanho do campo
     * @return string
     */
    public function getLength() {
        return $this->length;
    }

    /**
     * Seta o tamanho
     * @param int $length Tamanho do campo
     * @return \Text
     */
    public function setLength($length) {
        $this->length = $length;
        return $this;
    }

    public function lister() {
        $val = $this->value;
        $val = strip_tags($val);
        return substr($val, 0, 128).' ...';
    }

}
