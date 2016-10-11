<?php
namespace admin;
/**
 * Controlador do editor visual
 *
 * @author eduardo
 */
class VisualController extends \wow\Controller {

    public function save() {
//        var_dump($_POST);die;
        $arrError = array("success"=> true,"msg"=>"");
        
        foreach ($_POST as $form => $data) {
            $formObj = \admin\Admin::loadForm($form);
//            var_dump($form);die;
            if ($formObj) {
                $arrCur = $formObj->visualsave($data);
                $arrError['success'] = $arrCur['success']&&$arrError['success'];
                $arrError['msg'] = $arrError['msg'].$arrCur['msg'];
            }
        }
        echo json_encode($arrError);
    }
    public function remove() {
        $formObj = \admin\Admin::loadForm(filter_input(INPUT_POST, 'form'));
        $id = filter_input(INPUT_POST, 'id');
        $arrError = $formObj->visualRemove($id);
        echo json_encode($arrError);
    }

}
