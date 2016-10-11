<?php

use \admin\form\field;

/**
 * Formulario inicial
 *
 * @author eduardo
 */
class FormMenuSystem extends \admin\Form {

    public function __construct() {
        parent::__construct('Model\TblAdminMenu');
        $this->sortField = 'ordermenu'; 
    }

    private function loadFiles() {
        $arr = glob(PROTECTED_PATH . '/admin/*.php');
        $arrnew = array();
        foreach ($arr as $file) {
            $arrFile = explode('/', $file);
            $file = end($arrFile);
            $arrFile = explode('.', $file);
            unset($arrFile[count($arrFile)-1]);
            $file = implode('.', $arrFile);
            $arrnew[$file] = $file;
        }
        return $arrnew;
    }

    public function setup() {
        $nameObj = new field\Text('nome', 'Nome');
        $this->addField($nameObj);

        $aliasObj = new field\Text('alias', 'Alias');
        $this->addField($aliasObj);
        
        $userObj = new admin\Login();
        /* @var $dql Doctrine\ORM\QueryBuilder */
        $dql = system\core\Conn::$em->createQueryBuilder()
                ->select('m')
                ->from('Model\TblAdminMenu','m')
                ->where('m.parentId=0');
        if($userObj->getUser()->getLevel()>0){
            $dql->andWhere("m.super<>1");
        }
        $formObj = new field\Select('file', 'Formulário');
        $formObj->setArray($this->loadFiles());
        $formObj->setFlags('LIUD');
        $formObj->isNotReq();
        $this->addField($formObj);

        $formParent = new field\Select('parentId', 'Parent');
        $formParent->setDql($dql, 'menuId', 'nome');
        $formParent->isNotReq();
        $this->addField($formParent);
        
        $super = new field\YesNo('super', 'Super usuario');
        $super->setFlags('IU');
        $this->addField($super);
    }
    public function prePost() {
        if (empty($this->tableObj->alias) or is_null($this->tableObj->alias)) {
            $val = str_replace(' ', '-', $this->getField('nome')->getValue());
            $val = strtolower($val);
            $this->tableObj->setAlias($val);
        }
    }

}
