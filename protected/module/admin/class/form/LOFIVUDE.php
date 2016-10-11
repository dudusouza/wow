<?php

namespace admin\form;

/**
 * Tratamento das flags de insert update e delete
 * L ister
 * O rder
 * F ilter
 * I nsert
 * V iew
 * U pdate
 * D elete
 * E xport
 * @author eduardo
 */
class LOFIVUDE {

    const FLAGS = 'LOFIUDE';

    /**
     * Retorna as permissoes de apenas leitura
     * @return string
     */
    public static function getOnlyRead() {
        return 'LOVEU';
    }

    /**
     * Retorna as permissoes de apenas leitura e insersão
     * @return string
     */
    public static function getOnlyInsert() {
        return 'LOVEI';
    }

    /**
     * Retorna as permissoes de apenas leitura e insersão
     * @return string
     */
    public static function getDontDelete() {
        return 'LOFIVUE';
    }

    /**
     * Retorna Todas as permissoes
     * @return string
     */
    public static function all() {
        return 'LOFIVUDE';
    }
    
    /**
     * Action do front-end
     * @return string
     */
    public static function getActionFront(){
        return 'F';
    }
    
    /**
     * Action do backend
     * @return string
     */
    public static function getActionBack(){
        return 'B';
    }
    
    /**
     * Verifica se existe essa flag
     * @param string $flag
     * @param string $flags
     * @return bool
     */
    public static function checkFlag($flag,$flags){
        return strpos($flags, $flag) !== false;
    }

}
