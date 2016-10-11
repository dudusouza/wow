<?php

namespace admin\form\field;

/**
 * Classe de teste na administração
 *
 * @author eduardo
 */
class Text extends \admin\form\Field {

    private $length = 255;

    public function field() {
        $this->template->assign('max',$this->length);
        return $this->render('fields/text/field.tpl');
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
    
    public function getValueDb() {
        return trim(parent::getValueDb());
    }

}
