<?php

namespace admin\form;

/**
 * Field atual
 *
 * @author eduardo
 */
class Field {

    /**
     * Nome do campo
     * @var string
     */
    protected $name;

    /**
     * Label do campo
     * @var string
     */
    private $label;

    /**
     * Valor do campo
     * @var string
     */
    protected $value;

    /**
     * Tabela do form a qual o campo pertence
     * @var \Doctrine_Record 
     */
    protected $tblObj;

    /**
     * Flags do campo
     * @var string
     */
    private $actionFlag;

    /**
     * Flag atual do campo
     * @var string
     */
    private $currentFlag;

    /**
     * Template do smarty
     * @var \Smarty
     */
    protected $template;
    
    /**
     * Informa se o campo é requerido ou não
     * @var bool
     */
    protected $isReq = true;
    
    public $msgReq = "Preencha o campo {name}";
    public $msgValidade = "Preencha o campo {name} corretamente";

    /**
     * Nome da chave primária
     * @var string
     */
    protected $pkName = null;


    public function __construct($name, $label) {
        $this->name = $name;
        $this->label = $label;
        $this->actionFlag = LOFIVUDE::all();
        $this->template = \admin\Admin::template();
        $this->template->clearAllAssign();
    }

    /**
     * Campo será requerido
     */
    public function isReq(){
        $this->isReq = true;
    }
    
    /**
     * Campo não será requerido
     */
    public function isNotReq(){
        $this->isReq = false;
    }
    
    
    /**
     * Seta a tabela atual
     * @param Object $tableObj
     */
    public function setTable($tableObj) {
        $this->tblObj = $tableObj;
        $reflection = new \ReflectionObject($this->tblObj);
        $this->pkName = \system\core\Conn::$em->getClassMetadata($reflection->name)->identifier[0];
    }

    /**
     * Seta as flags
     * @param string $flags
     */
    public function setFlags($flags) {
        $this->actionFlag = $flags;
    }

    /**
     * Seta a flag atual do campo
     * @param string $flag
     */
    public function setCurFlag($flag) {
        $this->currentFlag = $flag;
    }

    /**
     * Verifica se o campo está disponivel para a ação conforme a Flag
     * @param string $flag
     * @return string
     */
    public function checkFlag($flag) {
        return LOFIVUDE::checkFlag($flag, $this->actionFlag);
    }

    /**
     * Retorna o valor no padrão do banco
     * @return string
     */
    public function getValueDb() {
        return $this->value;
    }

    /**
     * Retorna o nome do campo
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Retorna o label do campo
     * @return string
     */
    public function getLabel() {
        return $this->label;
    }

    /**
     * Retorna o valor
     * @return string
     */
    public function getValue() {
        return $this->value;
    }

    /**
     * Seta o valor atual
     * @param string $val
     */
    public function setValueDb($val) {
        $this->value = $val;
    }

    /**
     * Seta o valor do campo
     * @param string $val
     */
    public function setValue($val) {
        $this->value = $val;
    }

    /**
     * Retorna o filtro do banco de dados
     * @return type
     */
    public function filter() {
        $val = addslashes($this->value);
        return "{alias}{$this->name} = '$val'";
    }

    /**
     * Retorna um lister
     * @return string
     */
    public function lister() {
        return $this->getValue();
    }

    /**
     * Renderiza o objeto
     * @param string $template teplate TPL
     * @return string
     */
    public function render($template) {
        $this->template->assign('name', $this->name);
        $val = is_null($this->value)?"":$this->value;
        $this->template->assign('val', $val);
        $render = $this->template->fetch($template);
        $this->template->clearAllAssign();
        return $render;
    }

    /**
     * Retorna o campo
     * @return string
     */
    public function field() {
        return $this->getValue();
    }

    /**
     * Retorna o campo
     * @return string
     */
    public function fieldFilter() {
        return $this->field();
    }

    /**
     * Retorna o campo para export
     * @return string
     */
    public function export() {
        return $this->lister();
    }

    /**
     * Seta o valor através do POST
     */
    public function setValByPost() {
        $val = filter_input(INPUT_POST, $this->name);
        if ($val !== "") {
            $this->setValue($val);
        }
    }

    /**
     * Seta o valor através do GET
     */
    public function setValByGet() {
        $val = filter_input(INPUT_GET, $this->name);
        if ($val !== "") {
            $this->setValue($val);
        }
    }
    
    /**
     * Valida se foi requerido
     * @return boolean
     */
    public function validadeReq(){
        if($this->isReq){
            if($this->value === "" or is_null($this->value)){
                return false;
            }
        }
        return true;
    }
    
    /**
     * Valida o campo
     * @return boolean
     */
    public function validade(){
        return true;
    }

    public function onPrePost() {
        
    }

    public function onPosPost() {
        
    }

    public function onPreForm() {
        
    }

    public function onPosForm() {
        
    }

    public function onPreList() {
        
    }

    public function onPosList() {
        
    }

}
