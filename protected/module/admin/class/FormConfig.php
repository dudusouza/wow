<?php

namespace admin;

/**
 * Formulario de administração
 *
 * @author eduardo
 */
abstract class FormConfig {

    const DEFAULT_TAB_NAME = 'tab_default';
    const TABLE_ADMIN = 'Model\TblConfig';
    const TABLE_FIELD_NAME = 'name';
    const TABLE_FIELD_VAL = 'val';

    /**
     * Nome da tabela
     * @var string 
     */
    private $table;

    /**
     * Array de campos
     * @var array 
     */
    private $arrFields = array();

    /**
     * Array de abas do form
     * @var array
     */
    private $arrTabs = array();

    /**
     * Array de referencias de abas e campos
     * @var array 
     */
    private $arrTabsFields = array();

    /**
     * Flags que são aceitas
     * @var string 
     */
    private $aceptedFlags;

    /**
     * Flag atual
     * @var string
     */
    private $currentFlags;

    /**
     * Flag da ação atual
     * @var string
     */
    private $actionFlag;

    /**
     * Label da tab padrão
     * @var string
     */
    protected $defaultTabLabel;

    /**
     * Seta a tabela atual
     * @var \Doctrine_Record
     */
    protected $tableObj;

    /**
     * Nome da chave primária
     * @var type 
     */
    protected $pkName;

    /**
     * Registros por pagina
     * @var int
     */
    protected $rp = 30;
    protected $sortField = false;
    private $fieldName;
    private $fieldValue;

    public function __construct($table = FormConfig::TABLE_ADMIN, $fieldName = FormConfig::TABLE_FIELD_NAME, $fieldVal = FormConfig::TABLE_FIELD_VAL) {
        $this->table = $table;
        $this->tableObj = new $table();
        $this->fieldName = $fieldName;
        $this->fieldValue = $fieldVal;
        $this->pkName = \system\core\Conn::$em->getClassMetadata($table)->identifier[0];
        $this->addTab(self::DEFAULT_TAB_NAME, 'Principal');
        $this->aceptedFlags = form\LOFIVUDE::all();
    }

    protected function setTabLabelDefault($label) {
        $this->addTab(self::DEFAULT_TAB_NAME, $label);
    }

    /**
     * Seta o valor de todos os objetos por post
     */
    function setValByPost() {
        foreach ($this->arrFields as $fieldObj) {
            /* @var $fieldObj \admin\form\Field */
            $fieldObj->setValByPost();
        }
    }

    /**
     * Retorna o valor
     * @param string $name
     * @return string
     */
    private function getValueDql($name) {
        /* @var $builderObj \Doctrine\ORM\QueryBuilder */
        $builderObj = \system\core\Conn::$em->createQueryBuilder()
                ->select('t')
                ->from($this->table, 't')
                ->where("t.{$this->fieldName}=:fieldname")
                ->setParameter('fieldname', $name)
        ;
        $arr = $builderObj->getQuery()->getOneOrNullResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        if ($arr) {
            return $arr[$this->fieldValue];
        }
        return false;
    }

    /**
     * Seta os valores dos campos por post
     */
    private function setValDb() {
        foreach ($this->arrFields as $name => $fieldObj) {
            $val = $this->getValueDql($name);
            if ($val) {
                $this->arrFields[$name]->setValue($val);
            }
        }
    }

    private function loadAllTabs() {
        $arrTabs = array();
        $arrFields = $this->arrFields;
        foreach ($this->arrTabsFields as $tab => $arrFieldNames) {
            if (isset($this->arrTabs[$tab])) {
                $arrTab = array();
                $arrTab['fields'] = array();
                foreach ($arrFieldNames as $fieldname) {
                    if (isset($arrFields[$fieldname])) {
                        /* @var $fieldObj \admin\form\Field */
                        $fieldObj = $arrFields[$fieldname];
                        $arrTab['fields'][] = array(
                            'label' => $fieldObj->getLabel(),
                            'html' => $fieldObj->field()
                        );
                    }
                }
                if (!empty($arrTab['fields'])) {
                    $arrTab['label'] = $this->arrTabs[$tab];
                    $arrTab['alias'] = $tab;
                    $arrTabs[] = $arrTab;
                }
            }
        }
        return $arrTabs;
    }

    /**
     * Retorna o objeto do campo
     * @param string $name
     * @return form\Field
     */
    protected function getField($name) {
        if (isset($this->arrFields[$name])) {
            return $this->arrFields[$name];
        }
        return null;
    }

    /**
     * Seta a chave primária
     * @param type $pk
     */
    public function setPk($pk) {
        $this->tableObj = \Doctrine::getTable($this->table)->find($pk);
    }

    /**
     * Adiciona uma tab
     * @param string $name
     * @param type $label
     */
    public function addTab($name, $label) {
        $this->arrTabs[$name] = $label;
    }

    /**
     * 
     * @param form\Field $fieldObj
     * @param string $tab
     */
    public function addField($fieldObj, $tab = Form::DEFAULT_TAB_NAME) {
        $fieldObj->setTable($this->tableObj);
        $name = $fieldObj->getName();
        $this->arrFields[$name] = $fieldObj;
        $this->arrTabsFields[$tab][] = $name;
    }

    /**
     * Retorna um array de mensagens de erros
     * @param array $arrFields
     * @return array
     */
    public function validadeFields($arrFields) {
        $arrError = array();
        foreach ($arrFields as $fieldObj) {
            /* @var $fieldObj \admin\form\Field */
            if ($fieldObj->validadeReq()) {
                if (!$fieldObj->validade()) {
                    //$arrError[] = str_replace('{name}', $fieldObj->getLabel(), $fieldObj->msgValidade);
                }
            } else {
                $arrError[] = str_replace('{name}', $fieldObj->getLabel(), $fieldObj->msgReq);
            }
        }
        return $arrError;
    }

    /**
     * Retorna as tabs com os fields
     * @return array
     */
    public function getFieldsTabs() {
        $arrFields = $this->getFieldsForFlag();
        $arrTabs = array();
        foreach ($this->arrTabsFields as $tab => $fields) {
            $arrTab['tab'] = $this->arrTabs[$tab];
            foreach ($fields as $field) {
                if (isset($arrFields[$field])) {
                    $arrTab['fields'][] = $arrFields[$field];
                }
            }
            $arrTabs[] = $arrTab;
        }
        return $arrTabs;
    }

    private function config() {
        if (count($this->arrFields) == 0) {
            $this->setup();
        }
    }

    public function setup() {
        
    }

    /**
     * Caso o name ja existir retora apenas o id
     * @param strin $name
     * @return boolean|int
     */
    private function checkValueExsists($name) {
        /* @var $builderObj \Doctrine\ORM\QueryBuilder */
        $builderObj = \system\core\Conn::$em->createQueryBuilder()
                ->select('t')
                ->from($this->table, 't')
                ->where("t.{$this->fieldName}=:fieldname")
                ->setParameter('fieldname', $name);
        $arr = $builderObj->getQuery()->getOneOrNullResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        if ($arr) {
            return $arr[$this->pkName];
        }
        return false;
    }

    /**
     * Seta na tabela os valores dos campos
     * @param array $arrFields
     */
    public function save() {
        $this->config();
        $this->setValByPost();
        $this->prePost();
        foreach ($this->arrFields as $name => $fieldObj) {

            /* @var $fieldObj \admin\form\Field */
            $id = $this->checkValueExsists($name);
            $table = $this->table;
            $fieldName = 'set'.ucfirst($this->fieldName);
            $fieldValue = 'set'.ucfirst($this->fieldValue);
            $tblObj = new $table();
            $tblObj->$fieldName($name);
            if ($id) {
                $tblObj = \system\core\Conn::$em->find($this->table, $id);
            }
            $tblObj->$fieldValue($fieldObj->getValue());
            try {
                \system\core\Conn::$em->persist($tblObj);
                \system\core\Conn::$em->flush();
            } catch (\Exception $e) {
                var_dump($e);
            }
        }
        \system\core\Config::deleteCache();
        $this->posPost();
    }

    public function formSave($setValPost = false) {
        $this->config();
        if (!$setValPost) {
            $this->setValDb();
        } else {
            $this->setValByPost();
        }
        $this->currentFlags = 'U';
        $this->actionFlag = 'F';
        return $this->loadAllTabs();
    }

    /**
     * Salva os dados capturados em visual
     * @param string $data
     */
    public function visualsave($data) {
        $tblname = $this->table;
        $fieldName = 'set'.ucfirst($this->fieldName);
        $fieldValue = 'set'.ucfirst($this->fieldValue);
        $error = "";
        foreach ($data as $name => $arrVal) {
            $this->tableObj = new $tblname();
            $this->tableObj->$fieldName($name);

            $id = $this->checkValueExsists($name);
            if ($id) {
                $this->tableObj = \system\core\Conn::$em->find($tblname, $id);
            }
            $type = "\admin\\form\\" . $arrVal['type'];
            $field = new $type($name, '');
            /* @var $field \admin\form\Field */
            $field->setValue($arrVal['val']);
            $this->tableObj->$fieldValue($field->getValueDb());

            \wow\Wow::$cache->eraseAll();
            try {
                \system\core\Conn::$em->persist($this->tableObj);
                \system\core\Conn::$em->flush();
            } catch (\Doctrine_Exception $ex) {
                $error .= $ex->getMessage();
            }
        }
        return array('success' => empty($error), 'msg' => $error);
    }

    public function posPost() {
        
    }

    public function prePost() {
        
    }

}
