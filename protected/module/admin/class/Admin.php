<?php

namespace admin;

/**
 * Description of Admin
 *
 * @author eduardo
 */
class Admin {

    /**
     * Módulo do admin
     * @var \Smarty
     */
    private static $templateObj = null;

    /**
     * Retorna o objeto do template
     * @return \Smarty
     */
    public static function template() {
        if (is_null(self::$templateObj)) {
            self::$templateObj = new \Smarty();
            self::$templateObj->setCompileDir(ADMIN_PATH . 'cache/compiler/');
            self::$templateObj->setCacheDir(ADMIN_PATH . 'cache/cache/');
            self::$templateObj->setTemplateDir(ADMIN_PATH . 'view/templates/');
        }
        return self::$templateObj;
    }

    /**
     * Faz o autoload do admin
     * @param string $class
     */
    public static function autoload($class) {
        $class = str_replace('admin\\', '', $class);
        $class = str_replace('\\', '/', $class);
        if (substr($class, 0, 1) == '/') {
            $class = substr($class, 1);
        }
        $file = ADMIN_PATH . 'class/' . $class . '.php';
        if (file_exists($file)) {
            include_once $file;
        }
    }

    /**
     * Carrega todas as bibliotecas do admin
     */
    public static function loadLibs() {
        $file = ADMIN_PATH . 'lib/*';
        $arrDirs = glob($file);
        if (is_array($arrDirs)) {
            foreach ($arrDirs as $dir) {
                $file = $dir . '/config.php';
                if (file_exists($file)) {
                    include_once $file;
                }
            }
        }
    }

    /**
     * Carrega um form
     * @param string $formName
     * @return Form
     */
    public static function loadForm($formName) {
        $arrPath = array(
            ADMIN_PATH . 'class/forms-default/',
            SITE_PATH . 'protected/admin/',
        );
        foreach ($arrPath as $path) {
            $path .= $formName . '.php';
            if (file_exists($path)) {
                include_once $path;
                return new $formName();
            }
        }
        return false;
    }

}
