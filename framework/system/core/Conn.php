<?php

namespace system\core;

/**
 * Conexão do Doctrine
 *
 * @author eduardo
 */
class Conn {

    /**
     * Entitie Manager do doctrine
     * @var \Doctrine\ORM\EntityManager
     */
    public static $em;

    public static function loadModels() {
        $arrModels = glob(MODEL_PATH.'Model\*.php');
        foreach($arrModels as $model){
            include_once $model;
        }
    }

}
