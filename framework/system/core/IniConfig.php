<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace system\core;

/**
 * Description of IniParser
 *
 * @author eduardo
 */
class IniConfig {

    /**
     * Arquivo Ini de configuracao
     * @var type 
     */
    private $arrIni;

    public function __construct() {
        $this->setData();
        $this->defineDev();
    }

    /**
     * Seta os dados do config
     */
    private function setData() {
        $file = SITE_PATH . 'config.ini';
        $this->arrIni = parse_ini_file($file, true);
    }

    /**
     * Sefine o dev
     */
    private function defineDev() {
        $isLocal = ($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '127.0.0.1');
        if (!$isLocal) {
            $arrIp = explode('.', $_SERVER['REMOTE_ADDR']);
            $radius = $arrIp[0] . '.' . $arrIp[1];
            $isLocal = (in_array($radius, array('10.0', '172.16', '192.168', '127.0')));
        }
        define('IS_DEV', $isLocal);
    }
    
    /**
     * Define um array de variaveis
     * @param array $arr
     */
    private function defineArr($arr){
        foreach($arr as $name=>$val){
            $name = strtoupper(str_replace('-', '_', $name));
            define($name,trim($val));
        }
    }
    
    /**
     * Define todas as constantes
     */
    public function defineConstants(){
        if(IS_DEV){
            $this->defineArr($this->arrIni['dev']);
        }else{
            $this->defineArr($this->arrIni['prod']);
        }
        $this->defineArr($this->arrIni['any']);
    }

}