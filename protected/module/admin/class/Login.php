<?php

namespace admin;

use \system\core\Conn;

/**
 * Login do usuario no sistema
 *
 * @author eduardo
 */
class Login {

    const SES_LOGIN = 'sys_adm_ses_login';

    /**
     * Tabela do usuario
     * @var \TblAdminUsuarios
     */
    private static $userObj = null;

    public function __construct() {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    /**
     * Checa se o usuário está logado
     * @return string
     */
    public function checkLoged() {
        return (isset($_SESSION[self::SES_LOGIN]) and ( ((int) $_SESSION[self::SES_LOGIN]) > 0));
    }

    /**
     * Destroi a sessao
     */
    public function logoff() {
        if ($this->checkLoged()) {
            unset($_SESSION[self::SES_LOGIN]);
        }
    }

    /**
     * Faz o login no sistema
     * @param string $user
     * @param string $pass
     * @return boolean
     */
    public function startLogin($user, $pass) {
        $pass = hash('whirlpool', $pass);
        $dql = Conn::$em->createQueryBuilder();
        $dql->from('Model\TblAdminUsuario', 'au')
                ->select('au')
                ->where("au.usuario = :user")
                ->andWhere("au.senha = :pass")
                ->setParameter('user', $user)
                ->setParameter('pass', $pass)
        ;
        $arr = $dql->getQuery()->getOneOrNullResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        if ($arr) {
            $_SESSION[self::SES_LOGIN] = $arr['usuarioId'];
            return true;
        } else {
            return false;
        }
    }

    /**
     * Retorna a tabela de usuario
     * @return \Model\TblAdminUsuario
     */
    public static function getUser() {
        if (is_null(self::$userObj)) {
            if (isset($_SESSION[self::SES_LOGIN])) {
                $usuario = $_SESSION[self::SES_LOGIN];
                self::$userObj = Conn::$em->find('Model\TblAdminUsuario', $usuario);
            }
        }
        return self::$userObj;
    }

    /**
     * Retorna se é permitido ou não o usuario para o menu
     * @param int $menuid
     * @return bool
     */
    public static function getPermission($menuid) {
        $tblUser = self::getUser();
        if ($tblUser->getLevel() == 0) {
            return true;
        }
        $dql = Conn::$em->createQueryBuilder()
                ->select('p')
                ->from('TblAdminPermission', 'p')
                ->where("p.user=:user")
                ->andWhere("p.menu=:menu")
                ->setParameter('user', $tblUser->getUsuarioId())
                ->setParameter('menu', $menuid);
        return $dql->getQuery()->getOneOrNullResult(\Doctrine\ORM\Query::HYDRATE_ARRAY) !== null;
    }

}
