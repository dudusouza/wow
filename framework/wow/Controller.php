<?php

namespace wow;

/**
 * Classe padrão do controlador
 *
 * @author eduardo
 */
class Controller {

    /**
     * Array de parametros
     * @var array
     */
    private $arrParams;

    /**
     * Nome do módulo
     * @var bool|string
     */
    private $module = false;

    /**
     * Array de variaveis
     * @var array
     */
    private $arrVar = array();

    /**
     * Retorna o Path do controlador
     * @return string
     */
    private function getViewPath() {
        if ($this->module) {
            return MODULE_PATH . $this->module . '/view/';
        } else {
            return PROTECTED_PATH . 'view/';
        }
    }

    /**
     * Assina uma variavel
     * @param string $var
     * @param string $val
     */
    public function assign($var, $val) {
        $this->arrVar['default'][$var] = $val;
    }

    /**
     * Assina uma variavel global
     * @param string $var
     * @param string $val
     */
    public function assignGlobal($var, $val) {
        $this->arrVar['global'][$var] = $val;
    }

    /**
     * Apaga as variaveis globais
     */
    public function clearGlobal() {
        $this->arrVar['global'] = array();
    }

    /**
     * Apaga as variaveis
     */
    public function clear() {
        $this->arrVar['default'] = array();
    }

    /**
     * Seta todos os parametros
     * @param string $arrParams
     */
    public function setAllParams($arrParams) {
        $this->arrParams = $arrParams;
    }

    /**
     * Seta o módulo
     * @param string $moduleName
     */
    public function module($moduleName) {
        $this->module = $moduleName;
    }

    /**
     * Retorna um parametro
     * @param string $param
     * @return string
     */
    protected function getParam($param) {
        if (isset($this->arrParams[$param])) {
            return $this->arrParams[$param];
        }
        return null;
    }

    /**
     * Retorna uma string com o arquivo renderizado
     * @return string
     */
    protected function fetch($file) {
        ob_start();
        $controller = $this->getViewPath();
        $controller .= $file . '.php';
        if (file_exists($controller)) {
            foreach ($this->arrVar as $arrVars) {
                if (is_array($arrVars)) {
                    foreach ($arrVars as $var => $val) {
                        $$var = $val;
                    }
                }
            }
            include $controller;
        }
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    private function removeAdmTags($content) {
        $login = new \admin\Login;
        if (!$login->checkLoged()) {
            $html = str_get_html($content);
            $tags = $html->find('adm');
            foreach ($tags as $tag) {
                $tag->outertext = "";
            }
            $arrTags = array('adm-type', 'adm-field-type', 'adm-field', 'adm-form', 'adm-config');
            foreach ($arrTags as $tag) {
                foreach ($html->find("[$tag]") as $item) {
                    $item->setAttribute($tag, null);
                }
            }
            $content = (string) $html;
        }
        return $content;
    }

    /**
     * Seta o editor visual caso estiver logado
     * @param string $content
     * @return string
     */
    private function setVisualEditorAdmin($content) {
        $login = new \admin\Login;
        if ($login->checkLoged()) {
            $visualObj = new \admin\VisualEditor($content);
            return $visualObj->render();
        }
        return $content;
    }

    /**
     * Renderiza o arquivo php
     * @param string $file
     */
    protected function render($file) {
        $content = $this->fetch($file);
        $content = $this->removeAdmTags($content);
        $content = $this->setVisualEditorAdmin($content);
        echo $content;
    }

}
