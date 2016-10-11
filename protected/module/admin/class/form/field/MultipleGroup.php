<?php

namespace admin\form\field;

use system\core\helper;

/**
 * Classe do <select>
 *
 * @author eduardo
 */
class MultipleGroup extends FieldArray {

    /**
     * Nome da tabela em questão para gravar
     * @var string
     */
    private $tablefk;

    /**
     * Nome do campo da fk
     * @var string
     */
    private $fk;

    /**
     * Nome do campo da fk referente ao campo da tabela atual
     * @var string
     */
    private $fkthis;

    public function __construct($name, $label) {
        parent::__construct($name, $label);
        $this->value = array();
    }

    /**
     * Seta o valor referente ao banco
     */
    private function setDbVal() {
        $pkName = 'get' . ucfirst(helper\Text::camelCase($this->pkName));
        $fkName = $this->fk;
        $val = $this->tblObj->$pkName();
        if (is_null($this->tablefk) or empty($this->tablefk)) {
            die("no campo {$this->getLabel()} declare a tabela da fk");
        }
        $classTableRelated = \system\core\Conn::$em->getClassMetadata($this->tablefk)->getAssociationMapping($this->fk);
        $target = $classTableRelated['targetEntity'];
        $targetpk = \system\core\Conn::$em->getClassMetadata($target)->identifier[0];
        /* @var $dqlObj \Doctrine\ORM\Query */
        $dql = "SELECT t,f FROM {$this->tablefk} t JOIN t.{$this->fk} f WHERE t.{$this->fkthis} = $val";
        $dqlObj = \system\core\Conn::$em->createQuery($dql);
        $arrItens = $dqlObj->getArrayResult();
        $this->value = array();
        foreach ($arrItens as $arrItem) {
            if (isset($arrItem[$this->fk][$targetpk])) {
                $this->value[] = $arrItem[$this->fk][$targetpk];
            }
        }
    }

    /**
     * 
     * @param type $table tabela a ser gravada
     * @param type $fkfield nome do campo da fk
     * @param type $fkfieldforthis nome do campo da fk referente a tabela atual do form
     * @param type $tblLast nome do campo da fk referente a tabela atual do form
     */
    public function setTableFk($table, $fkfield, $fkfieldforthis) {
        $this->tablefk = $table;

        $this->fk = $fkfield;
        $this->fkthis = $fkfieldforthis;
    }

    public function setArrayBi($arr, $val = '', $label = '') {
        $this->arr = $arr;
    }

    public function field() {
        $this->template->assign('arr', $this->arr);
        $pk = 'get' . ucfirst($this->pkName);
        if ($this->tblObj->$pk() !== null) {
            $this->setDbVal();
        }
        return $this->render('fields/select/multiple-group.tpl');
    }

    public function lister() {
        $val = $this->value;
        if (isset($this->arr[$val])) {
            return $this->arr[$val];
        }
        $val;
    }

    public function setValByPost() {
        if (isset($_POST[$this->name])) {
            $this->value = $_POST[$this->name];
        }
    }

    private function deleteAllItens() {
        
    }

    public function onPosPost() {
        $tblName = $this->tablefk;
        $fk = 'set' . ucfirst($this->fk);
        $fkthis = $this->fkthis;
        $fkthisSet = 'set' . ucfirst($fkthis);
        $pk = 'get' . ucfirst($this->pkName);
        $pkval = $this->tblObj->$pk();

        $fkval = $this->fk;
        \system\core\Conn::$em->createQueryBuilder()
                ->delete($tblName, 't')
                ->where("t.{$fkthis}=:fk")
                ->setParameter("fk", $pkval)
                ->getQuery()
                ->execute();
//        \system\core\Conn::$em->find($fkthis, $fkObj)
        $classTableRelated = \system\core\Conn::$em->getClassMetadata($tblName)->getAssociationMapping($fkval);
        $target = $classTableRelated['targetEntity'];
        foreach ($this->value as $item) {
            $relatedObj = \system\core\Conn::$em->find($target, (int) $item);
            $tblFkObj = new $tblName();
            $tblFkObj->$fk($relatedObj);
            $tblFkObj->$fkthisSet($this->tblObj);
            \system\core\Conn::$em->persist($tblFkObj);
            \system\core\Conn::$em->flush();
        }
    }

}
