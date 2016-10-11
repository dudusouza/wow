<?php

namespace system\core\helper;

/**
 * Helper do path
 *
 * @author eduardo
 */
class Path {
    
    /**
     * Deixa o caminho do diretório padrao, com uma barra no final e com saparador '/'
     * @param string $path
     * @return string
     */
    public function clear($path){
        $path = str_replace('\\', '/', $path);
        if(substr($path, -1)!='/'){
            $path = '/';
        }
        return $path;
    }
    
}
