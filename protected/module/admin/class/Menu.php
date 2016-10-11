<?php

namespace admin;

/**
 * Faz o carregamento dos menus
 *
 * @author eduardo
 */
class Menu {

    /**
     * Carrega todos os menus
     * @var array
     */
    private static $arrMenus = array();

    /**
     * Recupera os dados do menu através do IS
     * @param int $id
     * @return array
     */
    public static function getByID($id) {
        $dql = \system\core\Conn::$em->createQueryBuilder()
                ->select('m')
                ->from('Model\TblAdminMenu', 'm')
                ->where('m.menuId=:id')
                ->setParameter('id', $id)
                ->getQuery();
        return $dql->getOneOrNullResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
    }

    /**
     * Retorna os dados do menu segundo o alias
     * @param string $alias
     * @return string
     */
    public static function loadMenuDataByAlias($alias) {
        $dql = \system\core\Conn::$em->createQueryBuilder()
                ->select('m')
                ->from('Model\TblAdminMenu', 'm')
                ->where('m.alias=:alias')
                ->setParameter('alias', $alias)
                ->getQuery();
        $arrMenu = $dql->getOneOrNullResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        ;
        if ($arrMenu) {
            $arrMenu['parent'] = self::getByID($arrMenu['parentId']);
        }
        return $arrMenu;
    }

    /**
     * Carrega todos os menus
     * @param int $id
     * @return array
     */
    public static function loadMenus($id = false) {
        $arrMenus = array();
        $userObj = Login::getUser();
        /* @var $dqlObj \Doctrine\ORM\QueryBuilder */
        $dqlObj = \system\core\Conn::$em->createQueryBuilder();
        $dqlObj->select('m')
                ->from('Model\TblAdminMenu', 'm')
                ->where('m.parentId=:id')
                ->orderBy('m.ordermenu')
                ->setParameter('id', (int) $id);
        if ($userObj->getLevel() > 0 and $id) {
//            'm.TblAdminPermission p'
            $dqlObj->select('m,p')
                    ->innerJoin('m.permission', 'p')
                    ->andWhere('p.user=:iduser')
                    ->andWhere('m.super=0')
                    ->setParameter('iduser', $userObj->getUsuarioId());
        }
        $arrData = $dqlObj->getQuery()->getArrayResult();
        
        foreach ($arrData as $arr) {
            $submenu = self::loadMenus($arr['menuId']);
            if ($id) {
                $arrMenus[$arr['alias']]['menu'] = $arr;
            }
            if (!empty($submenu)) {
                $arrMenus[$arr['alias']]['menu'] = $arr;
                $arrMenus[$arr['alias']]['submenu'] = $submenu;
            }
        }
        return $arrMenus;
    }

    /**
     * Retorna um array de menus
     * @return array
     */
    public static function getArrMenus() {
        if (empty(self::$arrMenus)) {
            self::$arrMenus = self::loadMenus();
        }
        return self::$arrMenus;
    }

}
