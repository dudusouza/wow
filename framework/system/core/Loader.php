<?php

namespace system\core;

/**
 * carrega os dados de classes e configurações
 *
 * @author eduardo
 */
class Loader {

    /**
     * Inclui um arquivo se ele existe
     * @param string $file
     */
    private static function includefile($file) {
        if (file_exists($file)) {
            include_once $file;
            return true;
        }
        return false;
    }

    /**
     * Carrega os route dos módulos
     */
    private function loadModulesRoute() {
        $arr = glob(MODULE_PATH . '*/routes.php');
        foreach ($arr as $file) {
            self::includefile($file);
        }
    }

    /**
     * Carrega os arquivos de configuração
     */
    public function config() {
        $cfgdir = PROTECTED_PATH . 'config/';
        self::includefile($cfgdir . 'routes.php');
        self::includefile($cfgdir . 'db.php');
        self::includefile($cfgdir . 'assets.php');
        $this->loadModulesRoute();
    }

    /**
     * Metodo de autload
     * @param string $class
     */
    public static function loadClass($class) {
        $classfile = str_replace('\\', '/', $class) . '.php';
        $isOk = self::includefile(FRAMEWORK_PATH . $classfile);
        if (!$isOk) {
            $arrClass = explode('/', $classfile);
            if (count($arrClass) > 1) {
                $namespace = $arrClass[0];
                unset($arrClass[0]);
                $isOk = self::includefile(MODULE_PATH . $namespace . '/' . 'class/' . implode('/', $arrClass));
            }
        }
        $isOk = $isOk || self::includefile(ADMIN_PATH . 'class/' . $classfile);
    }

    public static function autoload() {
        self::includefile(FRAMEWORK_PATH . 'system/core/simple_html_dom.php');
        spl_autoload_register(array('\system\core\Loader', 'loadClass'));
    }

}
