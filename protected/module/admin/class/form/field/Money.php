<?php

namespace admin\form\field;

/**
 * Classe de teste na administração
 *
 * @author eduardo
 */
class Money extends \admin\form\Field {

    public function field() {
        return $this->render('fields/text/money.tpl');
    }

    /**
     * Converte o valor em float e seta no campo
     * @param string $val
     */
    public function setValue($val) {
        if (!empty($val)) {
            $this->value = (float) str_replace(array('.', ','), array('', '.'), $val);
        }
    }
    
    public function getValue() {
        return \system\core\TextHelper::formatPrice($this->value);
    }

}
