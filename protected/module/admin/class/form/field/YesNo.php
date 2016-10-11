<?php

namespace admin\form\field;

/**
 * Classe de teste na administração
 *
 * @author eduardo
 */
class YesNo extends \admin\form\Field {


    public function field() {
        return $this->render('fields/text/yesno.tpl');
    }

}
