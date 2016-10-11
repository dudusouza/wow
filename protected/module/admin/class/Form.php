<?php

namespace admin;

/**
 * Formulario de administração
 *
 * @author eduardo
 */
abstract class Form {

    const DEFAULT_TAB_NAME = 'tab_default';

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
    protected $currentFlags;

    /**
     * Flag da ação atual
     * @var string
     */
    private $actionFlag;

    /**
     * Caminho do arquivo da view onde sera feita a edição visual
     * @var string
     */
    private $controllerEditable = array();

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

    public function __construct($table, $tabdefault = 'Principal') {
        $this->table = $table;
        $this->tableObj = new $table();
        $this->pkName = \system\core\Conn::$em->getClassMetadata($table)->identifier[0];
        $this->addTab(self::DEFAULT_TAB_NAME, $tabdefault);
        $this->aceptedFlags = form\LOFIVUDE::all();
    }

    protected function setFlags($flags) {
        $this->aceptedFlags = $flags;
    }

    /**
     * Executa o filter e retorna o DQL
     * @return \Doctrine_Query
     */
    private function filter() {
        $this->setValByPost();
        $arrFields = $this->getFieldsForFlag('F');
        $dqlObj = $this->dql();
        //verifica se tem where
        $arrWhere = $dqlObj->getDqlPart('where');
        $where = (count($arrWhere) > 0);
        foreach ($arrFields as $fieldsObj) {
            /* @var $fieldsObj \admin\form\Field */
            $fieldsObj->setValByGet();
            $value = $fieldsObj->getValueDb();

            if (!empty($value) && !is_null($value)) {
                $filter = $fieldsObj->filter();
                $filter = str_replace('{alias}', 't.', $filter);
                if ($where) {
                    $dqlObj->andWhere($filter);
                } else {
                    $dqlObj->where($filter);
                    $where = true;
                }
            }
        }
        return $dqlObj;
    }

    /**
     * Converte os dados para os dados atuais
     * @param array $arrAllData
     * @return array
     */
    private function listDataFields($arrAllData) {
        $arrFields = $this->getFieldsForFlag();
        $arrNewData = array();
        $arrColumns = array();
        foreach ($arrFields as $name => $fieldsObj) {
            $arrColumns[$name] = $fieldsObj->getLabel();
        }
        foreach ($arrAllData as $arrData) {
            foreach ($arrFields as $name => $fieldObj) {
                /* @var $fieldObj \admin\form\Field */
                $arrnew['__PK__'] = $arrData[$this->pkName];
                if (isset($arrData[$name])) {
                    $fieldObj->setValue($arrData[$name]);
                } else {
                    $fieldObj->setValue("");
                }
                $value = $fieldObj->lister();
                $arrnew[$name] = $value;
            }
            $arrNewData[] = $arrnew;
        }
        return array('data' => $arrNewData, 'columns' => $arrColumns);
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
     * Seta os valores dos campos por post
     */
    private function setValDb() {
        $reflectionObj = new \ReflectionObject($this->tableObj);
        foreach ($this->arrFields as $name => $fieldObj) {
            $nameGeter = 'get' . ucfirst($name);
            if ($reflectionObj->hasMethod($nameGeter)) {
                /* @var $fieldObj \admin\form\Field */
                $fieldObj->setValueDb($this->tableObj->$nameGeter());
                $this->arrFields[$name] = $fieldObj;
            }
        }
    }

    private function loadAllTabs() {
        $arrTabs = array();
        $arrFields = $this->getFieldsForFlag();
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
     * Retorna a DQL atual
     * @return \Doctrine\ORM\QueryBuilder
     */
    protected function dql() {
        return \system\core\Conn::$em->createQueryBuilder()
                        ->select('t')
                        ->from($this->table, 't');
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
        $this->tableObj = \system\core\Conn::$em->find($this->table, $pk);
    }

    function getControllerEditable() {
        return $this->controllerEditable;
    }

    function setControllerEditable($controllerEditable, $method) {
        $this->controllerEditable = array($controllerEditable, $method);
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
     * Retorna um array de campos válidos para a flag
     * @var string $flag
     * @return array
     */
    public function getFieldsForFlag($flag = null) {
        $arrFields = array();
        $flag = is_null($flag) ? $this->currentFlags : $flag;
        foreach ($this->arrFields as $name => $fieldObj) {
            /* @var $fieldObj \admin\form\Field */
            if ($fieldObj->checkFlag($this->currentFlags)) {
                $arrFields[$name] = $fieldObj;
            }
        }
        return $arrFields;
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

    public function visual() {
        $arrController = $this->getControllerEditable();
        if (count($arrController) > 0) {
            $path = PROTECTED_PATH . 'controller/' . $arrController[0] . '.php';
            if (file_exists($path)) {
                include_once $path;
                $mainController = new \MainController();
                $mainController->isEditable = true;
                ob_start();
                $mainController->index();
                $content = ob_get_contents();
                ob_end_clean();
                $visual = new VisualEditor($content);
                $visual->render();
            }
        }
    }

    /**
     * Retorna o lister dos dados
     * @param type $page
     * @return type
     */
    public function lister($page) {
        $this->config();

        $this->currentFlags = 'F';
        $this->actionFlag = 'F';
        $this->setValByPost();
        $arrFilterObj = $this->getFieldsForFlag();
        $arrFilter = array();
        foreach ($arrFilterObj as $fieldObj) {
            /* @var $fieldObj \admin\form\Field */
            $fieldObj->setValByGet();
            $arrFilter[] = array(
                'label' => $fieldObj->getLabel(),
                'html' => $fieldObj->fieldFilter()
            );
        }

        $this->currentFlags = 'L';
        $this->actionFlag = 'F';
        if (form\LOFIVUDE::checkFlag($this->currentFlags, $this->aceptedFlags)) {
            $dql = $this->filter();
        } else {
            $dql = $this->dql();
        }
        if (form\LOFIVUDE::checkFlag('O', $this->aceptedFlags) and $this->sortField) {
            $dql->orderBy($this->sortField);
        }
        if ($this->sortField) {
            $this->rp = 9999999999;
            $dql->orderBy('t.' . $this->sortField);
        }

        $pager = new \system\core\query\Pager($dql, $this->rp, $page);
        $arrData = $pager->execute()->getQuery()->getArrayResult();
        $curpage = $pager->getPage();
        $lastpage = $pager->getTotalPage();
        $arrLister = $this->listDataFields($arrData);

        $templateObj = Admin::template();
        $templateObj->assign('arrData', $arrLister['data']);
        $templateObj->assign('arrFilter', $arrFilter);
        $templateObj->assign('arrColumns', $arrLister['columns']);
        $templateObj->assign('curpage', $curpage);
        $templateObj->assign('lastpage', $lastpage);
        $templateObj->assign('isvisual', !empty($this->controllerEditable));
        $templateObj->assign('sortField', $this->sortField);
        $templateObj->assign('fd', form\LOFIVUDE::checkFlag('D', $this->aceptedFlags));
        $templateObj->assign('fu', form\LOFIVUDE::checkFlag('U', $this->aceptedFlags));
        $templateObj->assign('fi', form\LOFIVUDE::checkFlag('I', $this->aceptedFlags));
        $templateObj->assign('ff', form\LOFIVUDE::checkFlag('F', $this->aceptedFlags));
        $templateObj->assign('url', ADMIN_URL . 'menu/form/' . __ALIAS__MENU . '/');
        $lister = $templateObj->fetch('lister.tpl');
        $templateObj->clearAllAssign();
        return $lister;
    }

    /**
     * Seta na tabela os valores dos campos
     * @param \Doctrine_Record $tableObj
     * @param array $arrFields
     */
    private function setFieldsIntoTable($tableObj, $arrFields) {
        $reflection = new \ReflectionObject($tableObj);
        foreach ($arrFields as $name => $fieldObj) {
            /* @var $fieldObj \admin\form\Field */
            $nameSeter = 'set' . ucfirst($name);
            if ($reflection->hasMethod($nameSeter)) {
                $dbVal = $fieldObj->getValueDb();
                if (!is_null($dbVal)) {
                    $tableObj->$nameSeter($fieldObj->getValueDb());
                }
            }
        }
        return $tableObj;
    }

    /**
     * Insere os dados nos campos
     */
    public function insert() {
        if (form\LOFIVUDE::checkFlag('I', $this->aceptedFlags)) {
            $this->currentFlags = 'I';
            $this->actionFlag = 'B';
            $this->config();
            $this->setValByPost();
            $arrFields = $this->getFieldsForFlag();
            $arrMsgError = $this->validadeFields($arrFields);
            if (count($arrMsgError)) {
                $msg = implode('<br/>', $arrMsgError);
                throw new \Exception($msg);
            }
            $this->prePost();
            foreach ($arrFields as $fieldObj) {
                /* @var $fieldObj \admin\form\Field */
                $fieldObj->onPrePost();
            }
            $tblObj = $this->tableObj;
            $tblObj = $this->setFieldsIntoTable($tblObj, $arrFields);
            try {
                \system\core\Conn::$em->persist($tblObj);
                \system\core\Conn::$em->flush();
                $this->posPost();
                foreach ($arrFields as $fieldObj) {
                    /* @var $fieldObj \admin\form\Field */
                    $fieldObj->setTable($tblObj);
                    $fieldObj->onPosPost();
                }
            } catch (\Doctrine_Exception $ex) {
//                var_dump($ex);die;
            }
        } else {
            header("HTTP/1.0 404 Not Found");
            die;
        }
    }

    public function formInsert($setValPost = false) {
        $this->currentFlags = 'I';
        $this->actionFlag = 'F';
        $this->config();
        if ($setValPost) {
            $this->setValByPost();
        }
        return $this->loadAllTabs();
    }

    public function update() {

        if (form\LOFIVUDE::checkFlag('U', $this->aceptedFlags)) {
            $this->currentFlags = 'U';
            $this->actionFlag = 'B';
            $this->config();
            $this->setValByPost();
            $this->prePost();
            $tblObj = $this->tableObj;
            $arrFields = $this->getFieldsForFlag();
            $arrMsgError = $this->validadeFields($arrFields);
            if (count($arrMsgError)) {
                $msg = implode('<br/>', $arrMsgError);
                throw new \Exception($msg);
            }

            foreach ($arrFields as $fieldObj) {
                /* @var $fieldObj \admin\form\Field */
                $fieldObj->onPrePost();
            }
            $tblObj = $this->setFieldsIntoTable($tblObj, $arrFields);
            try {
                \system\core\Conn::$em->persist($tblObj);
                \system\core\Conn::$em->flush();
                $this->posPost();

                foreach ($arrFields as $fieldObj) {
                    /* @var $fieldObj \admin\form\Field */
                    $fieldObj->setTable($tblObj);
                    $fieldObj->onPosPost();
                }
            } catch (\Doctrine_Exception $ex) {
                
            }
        } else {
            header("HTTP/1.0 404 Not Found");
            die;
        }
    }

    public function remove() {
        if (form\LOFIVUDE::checkFlag('D', $this->aceptedFlags)) {
            $this->currentFlags = 'D';
            $this->actionFlag = 'B';
            $this->config();
            $this->prePost();
            $arrFields = $this->getFieldsForFlag();

            foreach ($arrFields as $fieldObj) {
                /* @var $fieldObj \admin\form\Field */
                $fieldObj->onPrePost();
            }
            $tblObj = $this->tableObj;
            try {
                \system\core\Conn::$em->remove($tblObj);
                \system\core\Conn::$em->flush();
                $this->posPost();
                foreach ($arrFields as $fieldObj) {
                    /* @var $fieldObj \admin\form\Field */
                    $fieldObj->setTable($tblObj);
                    $fieldObj->onPosPost();
                }
            } catch (\Doctrine_Exception $ex) {
                
            }
        } else {
            header("HTTP/1.0 404 Not Found");
            die;
        }
    }

    public function formUpdate($setValPost = false) {
        $this->currentFlags = 'U';
        $this->actionFlag = 'F';
        $this->config();
        if (!$setValPost) {
            $this->setValDb();
        } else {
            $this->setValByPost();
        }
        return $this->loadAllTabs();
    }

    public function order($arrOrder) {
        if ($this->sortField) {
            $ordername = $this->sortField;
            foreach ($arrOrder as $id => $order) {
                $tableObj = \Doctrine::getTable($this->table)->find($id);
                $tableObj->$ordername = $order;
                $tableObj->save();
            }
        }
    }

    /**
     * Salva os dados capturados em visual
     * @param string $data
     */
    public function visualsave($data) {
        $tblname = $this->table;
        $error = "";
        foreach ($data as $arrData) {
            $this->tableObj = new $tblname();
            if (isset($arrData['@pk@'])) {
                $this->tableObj = \system\core\Conn::$em->find($tblname, $arrData['@pk@']);
                unset($arrData['@pk@']);
            }

            foreach ($arrData as $name => $arrField) {
                $type = "\admin\\form\\" . $arrField['type'];
                $field = new $type($name, '');
                $nameset = 'set' . ucfirst($name);
                /* @var $field \admin\form\Field */
                $field->setValue($arrField['val']);
                $this->tableObj->$nameset($field->getValueDb());
            }

            try {
                \system\core\Conn::$em->persist($this->tableObj);
                \system\core\Conn::$em->flush();
            } catch (\Doctrine_Exception $e) {
                $error .= $e->getMessage() . "\n";
            }
        }
        return array('success' => empty($error), 'msg' => $error);
    }

    /**
     * Remove a linha da tabela condizente ao ID
     * @param int $id
     */
    public function visualRemove($id) {
        $tblname = $this->table;
        $error = "";
        $this->tableObj = \system\core\Conn::$em->find($tblname, $id);

        try {
            \system\core\Conn::$em->remove($this->tableObj);
            \system\core\Conn::$em->flush();
        } catch (\Doctrine_Exception $e) {
            $error .= $e->getMessage() . "\n";
        }
        return array('success' => empty($error), 'msg' => $error);
    }

    /**
     * Retorna todas as flags
     * @return string
     */
    public function getFlags() {
        return $this->aceptedFlags;
    }

    public function posPost() {
        
    }

    public function prePost() {
        
    }

}
