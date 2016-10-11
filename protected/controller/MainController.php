<?php

/**
 * Controlador principal
 * @author darkredz
 */
class MainController extends wow\Controller {

    public function index() {
        $arr = system\core\Conn::$em->createQueryBuilder()
                ->select('u')
                ->from('Model\TblAdminUsuario', 'u')
                ->getQuery()->getArrayResult();
        $this->assign('arrUsuario', $arr);
        $this->render('index');
    }
}

?>