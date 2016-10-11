<?php

namespace admin;

/**
 * Validação dos dados
 *
 * @author eduardo
 */
class Validator {

    const VALID_REQ = 'req';
    const VALID_EMAIL = 'email';
    const VALID_CONFIRM = 'confirm';

    /**
     * Campos para validacao
     * @var array
     */
    private $arrFields = array();

    /**
     * Adiciona um valor
     * @param string $val
     * @param string $type
     * @param string $label
     * @param array $opt
     * @return Validator
     */
    public function addVal($val, $type, $label, $opt = array()) {
        $obj = new \stdClass();
        $obj->val = $val;
        $obj->type = (array) $type;
        $obj->label = $label;
        $obj->opt = $opt;
        $this->arrFields[] = $obj;
        return $this;
    }

    /**
     * Adiciona fields do POST
     * @param String $name
     * @param type $type
     * @param type $label
     * @param type $opt
     * @return Validator
     */
    public function addFieldPost($name, $type, $label, $opt = array()) {
        return $this->addVal(filter_input(INPUT_POST, $name), $type, $label, $opt);
    }

    /**
     * Valida os dados retorna um array com as mensagens de erro, <br> se tiver vazio quer dizer que é válido
     * @return array retorna um array com as mensagens de erro
     */
    public function valid() {
        $arrMsg = array();
        foreach ($this->arrFields as $fieldObj) {
            $notvalid = false;
            $arrValidation = $fieldObj->type;
            foreach ($arrValidation as $validation) {
                if (!$notvalid) {
                    if ($validation == 'confirm') {
                        if (!$this->confirm($fieldObj->val, $fieldObj->opt['confirm'])) {
                            $arrMsg[] = "Os campos {$fieldObj->label} não conhecidem";
                        }
                    } else {
                        if (!$this->$validation($fieldObj->val)) {
                            $arrMsg[] = "Campo {$fieldObj->label} inválido";
                        }
                    }
                }
            }
        }
        return $arrMsg;
    }

    /**
     * Valida Campos requeridos
     * @param string $val
     * @return bool
     */
    public function req($val) {
        return (!is_null($val) && (!empty($val) or $val == 0));
    }

    /**
     * Valida e-mail
     * @param string $val
     * @return bool
     */
    public function email($val) {
        return (bool) filter_var($val, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Valida se os campos conhecidem
     * @param string $val
     * @return bool
     */
    public function confirm($val, $val1) {
        return ($val == $val1);
    }

}
