<?php

namespace admin;

/**
 * Manipulação de edição visual
 *
 * @author eduardo
 */
class VisualEditor {

    /**
     * Conteúdo
     * @var \simple_html_dom
     */
    private $content;

    public function __construct($content) {
        $this->content = str_get_html($content);
        $this->addCssJs();
    }

    /**
     * Adiciona todo o JS e css do visual
     */
    private function addCssJs() {
        \system\core\JsCss::addCss(ADMIN_PUBLIC_URL . 'css/visual.editor.css', 'visual-edition');
        \system\core\JsCss::addCss(ADMIN_PUBLIC_URL . 'css/editable.css', 'visual-edition');
        \system\core\JsCss::addJs(ADMIN_PUBLIC_URL . 'js/visual.editor.js', 'visual-edition');
        \system\core\JsCss::addJs(ADMIN_PUBLIC_URL . 'js/visualeditor/visual.editor.save.js', 'visual-edition');
        \system\core\JsCss::addJs(ADMIN_PUBLIC_URL . 'js/visualeditor/visual.editor.add.js', 'visual-edition');
        \system\core\JsCss::addJs(ADMIN_PUBLIC_URL . 'js/editable.js', 'visual-edition');
        \system\core\JsCss::addJs(ADMIN_PUBLIC_URL . 'js/editable/editable.fn.js', 'visual-edition');
        \system\core\JsCss::addJs(ADMIN_PUBLIC_URL . 'js/editable/editable.dialogs.js', 'visual-edition');
        \system\core\JsCss::addJs(ADMIN_PUBLIC_URL . 'js/editable/editable.btns.js', 'visual-edition');
        \system\core\JsCss::addJs(ADMIN_PUBLIC_URL . 'js/editable/palete/editable.palete.fn.js', 'visual-edition');
        \system\core\JsCss::addJs(ADMIN_PUBLIC_URL . 'js/editable/editable.palete.js', 'visual-edition');
        \system\core\JsCss::addJs(ADMIN_PUBLIC_URL . 'js/editable/editable.actions.js', 'visual-edition');
    }

    /**
     * Retorna os scripts e links de js e css para colocar na página
     * @return string
     */
    private function setScriptsAndLinks() {
        $css = \system\core\JsCss::fetchCss('visual-edition');
        $js = \system\core\JsCss::fetchJs('visual-edition');
        $script = '<script>ADMIN_URL="' . ADMIN_URL . '"</script>';
        $scripts = $this->content->find('adm[type=scripts]', 0);
        if (!is_null($scripts)) {
            $this->content->find('adm[type=scripts]', 0)->innertext = $script . $css . $js;
        }
    }
    

    /**
     * Carrega randomicamente o lorem
     * @param int $amount
     * @param string $what
     * @param int $start
     * @return string
     */
    private function randonLipsum($amount = 1, $what = 'words') {
        $loremObj = new \system\core\LoremIpsum();
        switch ($what) {
            case 'parag':
                return $loremObj->paragraphs($amount);
                break;
            case 'sent':
                return $loremObj->sentences($amount);
                break;

            default:
                return $loremObj->words($amount);
                break;
        }
    }

    private function setLorem() {
        $arrLorem = $this->content->find('adm[type=lorem]');
        foreach ($arrLorem as $index => $lorem) {
            $type = $lorem->style;
            $length = $lorem->length;
            if (!$type) {
                $type = 'words';
            }
            if (!$length) {
                $length = 5;
            }
            $this->content->find('adm[type=lorem]', $index)->outertext = $this->randonLipsum($length, $type);
        }
    }

    public function render() {
        $this->setScriptsAndLinks();
        $this->setLorem();
        echo $this->content;
    }

}
