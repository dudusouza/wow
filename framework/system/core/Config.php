<?php

namespace system\core;

use \Doctrine\ORM\AbstractQuery;
use \Doctrine\ORM\EntityRepository;

/**
 * Configuração do site
 *
 * @author eduardo
 */
class Config extends EntityRepository {

    const CACHE_CONFIG = 'cache_config';

    /**
     * Array de configuração
     * @var string
     */
    private static $arrConfig = null;

    /**
     * Gera o array de configuração
     */
    private static function genArr() {
        $arrConfig = Conn::$em->getRepository('Model\TblConfig')->createQueryBuilder('config')
                ->from('Model\TblConfig', 'c')
                ->select('c')
                ->getQuery()
                ->getResult(AbstractQuery::HYDRATE_ARRAY);
        foreach ($arrConfig as $arr) {
            self::$arrConfig[$arr['name']] = $arr['val'];
        }
    }

    /**
     * Seta um array com o cache
     */
    private static function setArrCache() {
        if (is_null(self::$arrConfig)) {
            if (!\wow\Wow::$cache->isCached('cache_config')) {
                self::genArr();
                \wow\Wow::$cache->store('cache_config', self::$arrConfig);
            } else {
                self::$arrConfig = \wow\Wow::$cache->retrieve('cache_config');
            }
        }
    }

    /**
     * Retorna um item de configuracao
     * @param string $name
     * @return string|boolean
     */
    public static function get($name) {
        self::setArrCache();
        if (isset(self::$arrConfig[$name])) {
            return self::$arrConfig[$name];
        }
        return false;
    }

    /**
     * Remove o cache após atualizar os dados de configuração
     */
    public static function deleteCache() {
        \wow\Wow::$cache->erase(self::CACHE_CONFIG);
    }

}
