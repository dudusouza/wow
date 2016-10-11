<?php

namespace admin\form\field;

/**
 * Classe de teste na administração
 *
 * @author eduardo
 */
class Pass extends \admin\form\Field {

    private $length = 255;

    public function field() {
        $this->template->assign('max', $this->length);
        return $this->render('fields/text/pass.tpl');
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

    public function setValueDb($val) {
        parent::setValueDb('');
    }

    public function setValue($val) {
        if (!empty($val) and ! is_null($val)) {
            $this->value = hash('whirlpool', $val);
        }else{
            $this->value = null;
        }
    }

    public function getValueDb() {
        if (empty($this->value) or is_null($this->value)) {
            return null;
        }
        return $this->value;
    }

}
