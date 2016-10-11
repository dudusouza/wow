<?php

use \admin\form\field;

/**
 * Classe do form do sistema
 *
 * @author eduardo
 */
class FormUsuarioSystem extends \admin\Form {

    public function __construct() {
        parent::__construct('Model\TblAdminUsuario');
    }

    private function submenus($id) {
        /* @var $dql Doctrine\ORM\QueryBuilder */
        $dql = \system\core\Conn::$em->createQueryBuilder()
                ->select('m')
                ->from('Model\TblAdminMenu', 'm')
                ->where('m.parentId=:parent')
                ->setParameter('parent', $id);

        $arrDql = $dql->getQuery()->getArrayResult();
        $arrItens = array();
        foreach ($arrDql as $arr) {
            $arrItens[$arr['menuId']] = $arr['nome'];
        }
        return $arrItens;
    }

    private function selectItens() {
        /* @var $dql Doctrine\ORM\QueryBuilder */
        $dql = \system\core\Conn::$em->createQueryBuilder()
                ->select('m')
                ->from('Model\TblAdminMenu', 'm')
                ->where('m.parentId=0');

        $arrDql = $dql->getQuery()->getArrayResult();
        $arrGroups = array();
        foreach ($arrDql as $arr) {
            $arrGroup = array();
            $arrGroup['group'] = $arr['nome'];
            $arrGroup['itens'] = $this->submenus($arr['menuId']);
            $arrGroups[] = $arrGroup;
        }
        return $arrGroups;
    }

    public function setup() {
        $nome = new field\Text('nome', 'Nome');
        $this->addField($nome);

        $email = new field\Text('email', 'E-Mail');
        $email->setFlags('IUD');
        $this->addField($email);

        $usuario = new field\Text('usuario', 'Usuário');
        $this->addField($usuario);

        $senha = new field\Pass('senha', 'Senha');
        $senha->setFlags('IUD');
        $senha->isNotReq();
        $this->addField($senha);

        $permissao = new field\MultipleGroup('permissao', 'Permissão');
        $permissao->setArrayBi($this->selectItens());
        $permissao->setTableFk('Model\TblAdminPermission', 'menu', 'user');
        $permissao->setFlags('IUD');
        $this->addField($permissao);

        
        $arrNivel = array(
            1 => 'Administrador', 0 => 'Super usuário', 2 => 'Usuario Normal'
        );
        $level = new field\Select('level', 'Nível');
        $level->setArray($arrNivel);
        $this->addField($level);
    }

}
