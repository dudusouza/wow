<?php
namespace admin;

/**
 * Controller do admin
 *
 * @author eduardo
 */
class AdminController extends \wow\Controller {

    /**
     * Array com os dados do menu
     * @var array
     */
    private $arrForm;

    public function __construct() {
        $login = new \admin\Login();
        if (!$login->checkLoged()) {
            header('Location:' . ADMIN_URL . 'login');
            die;
        }
    }

    private function alias() {
        if (!defined('__ALIAS__MENU')) {
            $formalias = $this->getParam('menu');
            define('__ALIAS__MENU', $formalias);
            $this->arrForm = \admin\Menu::loadMenuDataByAlias(__ALIAS__MENU);
            if (!Login::getPermission($this->getParam('menu_id'))) {
                header("HTTP/1.0 403 FORBIDEN");
                $this->render('forbiden');
                die;
            }
        }
    }

    private function checkConfig($formObj) {
        $reflection = new \ReflectionObject($formObj);
        try {
            $reflection->getMethod('lister');
            return false;
        } catch (\ReflectionException $ex) {
            return true;
        }
    }

    public function index() {
        $this->render('index');
    }

    public function lister() {
        $this->alias();
        $arrForm = $this->arrForm;
        $formObj = \admin\Admin::loadForm($arrForm['file']);
        if (!$this->checkConfig($formObj)) {
            $pg = filter_input(INPUT_GET, '--pg--');
            $pg = !is_null($pg) ? $pg : 1;
            $htmltable = $formObj->lister($pg);
            $this->assign('arrForm',$arrForm);
            $this->assign('table',$htmltable);
            $this->render('lister');
        } else {
            if (count($_POST)) {
                /* @var $formObj admin\FormConfig */
                $formObj->save();
            }
            
            $this->assign('arrForm',$arrForm);
            
            $this->assign('form',$formObj->formSave());
            $this->render('form');
        }
    }

    public function visual() {
        $this->alias();
        $arrForm = $this->arrForm;
        $formObj = \admin\Admin::loadForm($arrForm['file']);
        if (!$this->checkConfig($formObj)) {
            $htmltable = $formObj->visual();
            $arrData['arrForm'] = $arrForm;
            $arrData['table'] = $htmltable;
            echo $htmltable;
            //$this->render('lister', $arrData);
        } else {
            if (count($_POST)) {
                /* @var $formObj admin\FormConfig */
                $formObj->save();
            }
            $arrData['arrForm'] = $arrForm;
            $arrData['form'] = $formObj->formSave();
            $this->render('form', $arrData);
        }
    }

    public function insert() {
        $this->alias();
        $arrForm = $this->arrForm;
        $formObj = \admin\Admin::loadForm($arrForm['file']);
        $this->assign('form', $formObj->formInsert());
        $this->assign('arrForm', $arrForm);
        $this->render('form');
    }

    public function insertAction() {
        $this->alias();
        $arrForm = $this->arrForm;
        $formObj = \admin\Admin::loadForm($arrForm['file']);
        try {
            $formObj->insert();
        } catch (Exception $ex) {
            \admin\Alert::alert($ex->getMessage());
            $arrData['arrForm'] = $arrForm;
            $arrData['form'] = $formObj->formInsert(true);
            $this->render('form', $arrData);
        }
        $this->insert();
    }

    public function update() {
        $this->alias();
        $id = $this->getParam('id');
        $arrForm = $this->arrForm;
        $formObj = \admin\Admin::loadForm($arrForm['file']);
        $formObj->setPk($id);
        $this->assign('form', $formObj->formUpdate());
        $this->assign('arrForm', $arrForm);
        $this->render('form');
    }

    public function updateAction() {
        $this->alias();
        $id = $this->getParam('id');
        $arrForm = $this->arrForm;
        $formObj = \admin\Admin::loadForm($arrForm['file']);
        $formObj->setPk($id);
        try {
            $formObj->update();
            header('Location: ' . ADMIN_URL . 'menu/' . __ALIAS__MENU);
            die;
        } catch (Exception $ex) {
            \admin\Alert::alert($ex->getMessage());
            $formObj->setPk($id);
            $arrData['arrForm'] = $arrForm;
            $arrData['form'] = $formObj->formUpdate(true);
            $this->render('form', $arrData);
        }
    }

    public function removeAction() {
        $this->alias();
        $id = $this->getParam('id');
        $arrForm = $this->arrForm;
        $formObj = \admin\Admin::loadForm($arrForm['file']);
        $formObj->setPk($id);
        $formObj->remove();
        @header('Location: ' . ADMIN_URL . 'menu/' . __ALIAS__MENU);
        die;
    }

    public function account() {
        $this->render('account');
    }

    public function accountSave() {
        $arrMsg = $this->validaccount();
        if (!count($arrMsg)) {
            $tblUsuario = admin\Login::getUser();
            $tblUsuario->nome = filter_input(INPUT_POST, 'nome');
            $tblUsuario->email = filter_input(INPUT_POST, 'email');
            $tblUsuario->usuario = filter_input(INPUT_POST, 'usuario');
            $senha = filter_input(INPUT_POST, 'senha');
            if (!empty($senha)) {
                $tblUsuario->senha = hash('whirlpool', $senha);
            }
            $tblUsuario->save();
            \admin\Alert::alert('Conta salva coom sucesso');
        } else {
            \admin\Alert::alert('Erro: ' . implode('<br>', $arrMsg));
        }
        $this->account();
    }

    private function validaccount() {
        $confirm = filter_input(INPUT_POST, 'confirmsenha');
        $validatorObj = new admin\Validator();
        $validatorObj->addFieldPost('nome', admin\Validator::VALID_REQ, 'Nome');
        $validatorObj->addFieldPost('email', array(admin\Validator::VALID_REQ, admin\Validator::VALID_EMAIL), 'Email');
        $validatorObj->addFieldPost('usuario', admin\Validator::VALID_REQ, 'Usuário');
        $validatorObj->addFieldPost('senha', admin\Validator::VALID_CONFIRM, 'Senha', array('confirm' => $confirm));
        return $validatorObj->valid();
    }

    public function sorter() {
        if (isset($_POST['itens'])) {
            $this->alias();
            $arrForm = $this->arrForm;
            $formObj = \admin\Admin::loadForm($arrForm['file']);
            $formObj->order($_POST['itens']);
        }
    }

    /**
     * Valida a conta
     */
    public function accountValidator() {
        $arrMsg = $this->validaccount();
        $arrJson = array('success' => true);
        if (count($arrMsg)) {
            $msg = implode("<br>", $arrMsg);
            $arrJson = array('success' => false, 'msg' => $msg);
        }
        echo json_encode($arrJson);
    }

    public function visualSave() {
        $this->alias();
        $arrForm = $this->arrForm;
        $formObj = \admin\Admin::loadForm($arrForm['file']);
        echo '<pre>';
        print_r($_POST);
    }

}
