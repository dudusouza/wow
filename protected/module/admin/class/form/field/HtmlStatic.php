<?php

namespace admin\form\field;

/**
 * Classe de teste na administração
 *
 * @author eduardo
 */
class HtmlStatic extends \admin\form\Field {
    
    /**
     * Cria o Smarty
     * @var type 
     */
    private $smarty;
    
    /**
     * Arquivo para compilar
     * @var string
     */
    private $renderFile;
    
    public function __construct($name, $label) {
        parent::__construct($name, $label);
        $this->smarty = new \Smarty();
        $this->smarty->setCacheDir(PROTECTED_PATH.'cache/cache/');
        $this->smarty->setCompileDir(PROTECTED_PATH.'cache/compile/');
        $this->smarty->setTemplateDir(PROTECTED_PATH.'viewc/template/');
        $this->smarty->assign('SITE_URL',SITE_URL);
        $this->smarty->assign('ADMIN_URL',ADMIN_URL);
        $this->isNotReq();
    }
    
    /**
     * Arquivo HTML para renderizar
     * @param string $file
     */
    public function addFile($file){
        $this->renderFile = $file;
    }
    
    /**
     * Assina variavel de template
     * @param string $var
     * @param mixed $val
     */
    public function assignVar($var,$val){
        $this->smarty->assign($var, $val);
    }

    public function field() {
        return $this->smarty->fetch($this->renderFile);
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
