<?php

namespace system\core;

/**
 * Manipula o js e css da pagina
 *
 * @author eduardo
 */
class JsCss {
    /**
     * Javascripts adicionados
     * @var array
     */
    private static $arrJs;

    /**
     * Css's adicionados
     * @var array
     */
    private static $arrCss;

    /**
     * Diciona um JS
     * @param string $js
     * @param type $section
     */
    public static function addJs($js,$section='default') {
        self::$arrJs[$section][] = $js;
    }

    /**
     * Diciona um Css
     * @param string $css
     * @param type $section
     */
    public static function addCss($css,$section='default') {
        self::$arrCss[$section][] = $css;
    }

    /**
     * Gera os scripts js
     * @param string $section
     * @param string $mainLink link absoluto caso for feito relativo
     * @return string
     */
    public static function fetchJs($section='default', $mainLink=""){
        $jsScript = '';
        if(isset(self::$arrJs[$section])){
            foreach(self::$arrJs[$section] as $js){
                $jsScript .= '<script type="text/javascript" src="'.$mainLink.$js.'"></script>';
            }
        }
        return $jsScript;
    }
    
    
    /**
     * Gera os links css
     * @param type $section
     * @param string $mainLink
     * @return string
     */
    public static function fetchCss($section='default', $mainLink=""){
        $cssLinks = '';
        if(isset(self::$arrCss[$section])){
            foreach(self::$arrCss[$section] as $css){
                $cssLinks .= '<link rel="stylesheet" type="text/css" href="'.$mainLink.$css.'" />';
            }
        }
        return $cssLinks;
    }
    
    /**
     * Retorna o CSS minificado
     * @param string $mainLink
     * @param type $section
     * @return string
     */
    public static function getMinifyCss($mainLink="",$section='default'){
        $minify = new \MatthiasMullie\Minify\CSS();
        foreach(self::$arrCss[$section] as $css){
            $cssPath = $mainLink.$css;
            $minify->add($cssPath);
        }
        return $minify->minify();
    }
    
    /**
     * Retorna o CSS minificado
     * @param string $mainLink
     * @param type $section
     * @return string
     */
    public static function getMinifyJs($mainLink="",$section='default'){
        $minify = new \MatthiasMullie\Minify\JS();
        foreach(self::$arrJs[$section] as $js){
            $jsPath = $mainLink.$js;
            $minify->add($jsPath);
        }
        return $minify->minify();
    }
}
