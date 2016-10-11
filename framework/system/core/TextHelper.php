<?php

namespace system\core;

/**
 * Biblioteca de texto
 *
 * @author eduardo
 */
class TextHelper {

    public static function url($url) {
        if (preg_match('/(http(s)?:\/\/)?(.*)/', $url, $arrItens)) {
            $newUrl = "";
            if (!empty($arrItens[1])) {
                return $url;
            } else {
                return 'http://' . $url;
            }
        }
    }

    /**
     * Coloca em formato de moeda conforme as configurações do sistema
     * @param float $number
     * @return string
     */
    public static function formatPrice($number) {
        $decimal = defined('FORMAT_MONEY_DECIMAL') ? FORMAT_MONEY_DECIMAL : ',';
        $milhar = defined('FORMAT_MONEY_MILHAR') ? FORMAT_MONEY_MILHAR : ',';
        return number_format($number, 2, $decimal, $milhar);
    }

    /**
     * Separa o codigo de area do telefone e retira a mascara
     * @param string $fone
     * @return array
     */
    public static function parseFone($fone) {
        $regEx = "/\(([0-9]{2})\)(\s)?([0-9]{4})-([0-9]{4})([0-9])?/";
        if (preg_match($regEx, $fone, $arrFone)) {
            $number = "{$arrFone[3]}{$arrFone[4]}";
            if (isset($arrFone[5])) {
                $number .= $arrFone[5];
            }
            return array(
                'area' => $arrFone[1],
                'number' => $number
            );
        }
        return null;
    }

}
