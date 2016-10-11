<?php
namespace admin;

/**
 * Login do sistema
 *
 * @author eduardo
 */
class LoginController extends \wow\Controller {

    public function index() {
        $this->render('login');
    }

    public function enter() {
        $login = new Login();
        $loged = $login->startLogin(filter_input(INPUT_POST, 'usuario'), filter_input(INPUT_POST, 'senha'));
        if($loged){ 
            header('Location:'.ADMIN_URL);
            die;
        }
        $this->index();
    }
    
    public function logoff() {
        $login = new Login();
        $login->logoff();
        header('Location:'.ADMIN_URL.'login');
        die;
    }

}
