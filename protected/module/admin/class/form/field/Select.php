<?php
namespace admin\form\field;

/**
 * Classe do <select>
 *
 * @author eduardo
 */
class Select extends FieldArray {
    
    public function field() {
        $this->template->assign('arr',$this->arr);
        return $this->render('fields/select/field.tpl');
    }
   
    
    public function lister() {
        $val = $this->value;
        if(isset($this->arr[$val])){
            return $this->arr[$val];
        }
        $val;
    }
    
}
