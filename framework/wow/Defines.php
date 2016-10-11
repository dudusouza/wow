<?php

namespace system\core;

/**
 * Classe para definição de variáveis
 *
 * @author eduardo
 */
class Defines {

    /**
     * Define os Caminhos do site
     * @param string $baseDir Caminho do diretório de base
     */
    public static function  path($baseDir) {
        define('SITE_PATH', $baseDir);
        define('PROTECTED_PATH', SITE_PATH . 'protected/');
        define('CONTROLLER_PATH', PROTECTED_PATH . 'controller/');
        define('MODEL_PATH', PROTECTED_PATH . 'model/');
        define('MODULE_PATH', PROTECTED_PATH . 'module/');
        define('ADMIN_PATH', MODULE_PATH . 'admin/');
        define('FRAMEWORK_PATH', SITE_PATH . 'framework/');
    }

    /**
     * Define as urls do site
     * @param string $baseurl url de base do sistema
     */
    public static function urls($baseurl) {
        define('SITE_URL', $baseurl);
        define('PUBLIC_URL', SITE_URL . 'public/');
        define('CSS_URL', PUBLIC_URL . 'css/');
        define('JS_URL', PUBLIC_URL . 'js/');
        define('IMG_URL', PUBLIC_URL . 'img/');
        define('ADMIN_URL', SITE_URL . ADMIN_ROUTE .'/');
        define('ADMIN_PUBLIC_URL', PUBLIC_URL . 'admin/');
    }

}
