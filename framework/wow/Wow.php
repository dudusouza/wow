<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace wow;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

/**
 * Description of Wow
 *
 * @author eduardo
 */
class Wow {

    /**
     * Slim aplication
     * @var \Slim\App
     */
    private $app;

    /**
     * Cache do sistema
     * @var Cache 
     */
    public static $cache;

    public function __construct() {
        $configuration = [
            'settings' => [
                'displayErrorDetails' => true,
            ],
        ];
        $c = new \Slim\Container($configuration);
        $this->app = new \Slim\App($c);
    }

    private function routesToSlim() {
        $arrRoutes = Router::getAllRouter();
        foreach ($arrRoutes as $type => $arrRoute) {
            foreach ($arrRoute as $route) {
                $this->addRouteSlim($type, $route);
            }
        }
    }

    /**
     * Carrega um arquivo do system
     * @param string $file
     */
    private function loadSystem($file) {
        $sysdir = realpath(dirname(__FILE__) . '/../system/') . '/';
        if (file_exists($sysdir . $file)) {
            include_once $sysdir . $file;
        }
    }

    /**
     * Define as constantes de caminhos
     */
    private function definePath() {
        include_once 'Defines.php';
        $arrFiles = get_included_files();
        $dir = dirname($arrFiles[0]) . '/';
        $dir = str_replace('\\', '/', $dir);
        \system\core\Defines::path($dir);
    }

    /**
     * Faz o auload das classes
     */
    private function loadClass() {
        $this->loadSystem('core/Loader.php');
        \system\core\Loader::autoload();
    }

    /**
     * Seta o cache
     */
    private function setCache() {
        self::$cache = new Cache();
        self::$cache->setCachePath(PROTECTED_PATH . 'cache/cache/');
    }

    /**
     * Cria o sistema de roteamento no Slim
     * @param type $type
     * @param type $arrRoute
     */
    private function addRouteSlim($type, $arrRoute) {
        $this->app->$type($arrRoute['route'], function(Request $request, Response $response)use($arrRoute) {

            //pega o metodo e o controlador a ser chamado
            $controller = $arrRoute['controller'];
            $method = $arrRoute['method'];

            \system\core\Defines::urls($request->getUri()->getBaseUrl() . '/');
            //carrega o controlador
            Wow::loadController($controller);

            //Recupera os parametros
            $arrRoute = $request->getAttributes();
            $param = $arrRoute['routeInfo'][2];

            //instancia o controler e seta os parametros
            $controllerObj = new $controller();
            /* @var $controllerObj wow\Controller */
            $controllerObj->setAllParams($param);
            $arrController = explode('\\', $controller);
            if (count($arrController) > 1) {
                $controllerObj->module($arrController[0]);
            }

            //chama a função do controlador
            $controllerObj->$method();
        });
    }

    /**
     * Adiciona o slash no final das rotas
     */
    private function SlimSlash() {
        $this->app->add(function (Request $request, Response $response, callable $next) {
            $uri = $request->getUri();
            $path = $uri->getPath();
            if ($path != '/' && substr($path, -1) == '/') {
                // permanently redirect paths with a trailing slash
                // to their non-trailing counterpart
                $uri = $uri->withPath(substr($path, 0, -1));
                return $response->withRedirect((string) $uri, 301);
            }

            return $next($request, $response);
        });
    }

    /**
     * Carrega um controlador
     * @param string $controller Classe do controlador
     */
    public static function loadController($controller) {
        $arrCotroller = explode('\\', $controller);
        if (count($arrCotroller) == 1) {
            $file = CONTROLLER_PATH . $controller . '.php';
            if (file_exists($file)) {
                include_once $file;
            }
        } else {
            $file = MODULE_PATH . $arrCotroller[0] . '/controller/' . $arrCotroller[1] . '.php';
            if (file_exists($file)) {
                include_once $file;
            }
        }
    }

    /**
     * Inicia a execução do framework
     */
    public function run() {
        $this->definePath();
        $this->loadClass();
        //carrega os INI
        $ini = new \system\core\IniConfig();
        $ini->defineConstants();

        //Carrega os arquivos de configuração
        $loader = new \system\core\Loader();
        $loader->config();

        $this->setCache();


        $this->SlimSlash();
        $this->routesToSlim();
        $this->app->run();
    }

    /**
     * Cria uma nova instância do framework
     * @return \wow\Wow
     */
    public static function create() {
        return new Wow();
    }

}
