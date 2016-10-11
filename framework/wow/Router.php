<?php

namespace wow;

/**
 * Classe de Roteamento
 *
 * @author eduardo
 */
class Router {

    /**
     * Array de rotas
     * @var array
     */
    protected static $arrRoutes = array();

    /**
     * Adiciona uma rota
     * @param string $route rota para cadastrar
     * @param string $controller Controlador
     * @param string $method metodo do controlador
     * @param string $type tipo post|get|any, o padrão é any
     */
    public static function addRoute($route, $controller, $method, $type = 'any') {
        self::$arrRoutes[$type][$route] = array(
            'route' => $route,
            'controller' => $controller,
            'method' => $method
        );
    }

    /**
     * Adiciona uma rota para o ADMIN
     * @param string $route rota para cadastrar
     * @param string $controller Controlador
     * @param string $method metodo do controlador
     * @param string $type tipo post|get|any, o padrão é any
     */
    public static function addRouteAdmin($route, $controller, $method, $type = 'any') {
        if($route=='/'){
            $route = '';
        }
        self::addRoute('/'.ADMIN_ROUTE.$route, 'admin\\'.$controller, $method, $type);
    }

    /**
     * Retorna todas as rotas
     * @return array
     */
    public static function getAllRouter() {
        return self::$arrRoutes;
    }

}
