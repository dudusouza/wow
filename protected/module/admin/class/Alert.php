<?php

namespace admin;

/**
 * Classe de Alerta do admin
 *
 * @author eduardo
 */
class Alert {
    
    const SES = 'ses_admin_alert';
    
    /**
     * Cria um alerta
     * @param string $msg
     */
    public static function alert($msg){
        $_SESSION[self::SES] = $msg;
    }
    
    /**
     * Retorna o alert, caso não tiver nenhum retorna false
     * @return boolean
     */
    public static function fetch(){
        if(isset($_SESSION[self::SES])){
            $alert = $_SESSION[self::SES];
            unset($_SESSION[self::SES]);
            return $alert;
        }
        return false;
    }
    
    /**
     * Retorna o alert, caso não tiver nenhum retorna false
     * @return boolean
     */
    public static function alertScript(){
        $msg = self::fetch();
        if($msg){
            echo '<script>alert("'.$msg.'")</script>';
        }
    }
    
}
