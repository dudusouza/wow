<?php

namespace admin\form\field;

/**
 * Description of Imagem
 *
 * @author eduardo
 */
class Imagem extends \admin\form\Field {

    private $folder = 'files/';

    public function __construct($name, $label) {
        parent::__construct($name, $label);
        $this->setFlags('LIUD');
    }
    
    public function setFolder($folder) {
        $folder = str_replace('\\', '/', $folder);
        if (substr($folder, -1) != '/') {
            $folder .= '/';
        }
        $this->folder = $folder;
    }

    public function field() {
        $this->template->assign('public', SITE_PUBLIC);
        return $this->render('fields/img/field.tpl');
    }

    public function onPrePost() {
        if (isset($_FILES[$this->name])) {
            $fileName = $_FILES[$this->name]['name'];

            $arrFile = explode('.', $fileName);
            $ext = strtolower(end($arrFile));

            if (!is_dir(APP_PATH . 'public/' . $this->folder)) {
                mkdir(APP_PATH .'public/'. $this->folder, 0777, true);
            }
            $file = $this->folder . md5(uniqid(time(), true)) . '.' . $ext;
            $this->value = $file;

            move_uploaded_file($_FILES[$this->name]['tmp_name'], APP_PATH . 'public/' . $file);
        }
    }

    public function validadeReq() {
        if ($this->isReq) {
            if (!isset($_FILES[$this->name])) {
                return false;
            } elseif ($_FILES[$this->name]['error'] > 0) {
                return false;
            } else {
                $arrFile = explode('.', $_FILES[$this->name]['name']);
                $ext = strtolower(end($arrFile));
                if (!in_array($ext, array('png', 'jpg', 'gif', 'jpeg', 'bmp'))) {
                    return false;
                }
            }
        }
        return true;
    }
    
    public function lister() {
        $file = SITE_URL.'public/'.$this->value;
        return "<img src='{$file}' height='100'>";
    }

}
