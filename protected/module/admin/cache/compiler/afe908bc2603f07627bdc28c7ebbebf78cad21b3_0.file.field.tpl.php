<?php
/* Smarty version 3.1.30, created on 2016-09-14 09:39:22
  from "C:\wamp\www\structure\site\protected\module\admin\viewc\templates\fields\img\field.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57d944fa542e36_33010098',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'afe908bc2603f07627bdc28c7ebbebf78cad21b3' => 
    array (
      0 => 'C:\\wamp\\www\\structure\\site\\protected\\module\\admin\\viewc\\templates\\fields\\img\\field.tpl',
      1 => 1473856748,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57d944fa542e36_33010098 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="upload-file-image" style="clear: both">
    <div class="fileUpload btn btn-primary">
        <span>Carregar Imagem</span>
        <input type="file" name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" class="upload" accept="image/*" />
    </div>
    <div class="hr-dashed">
    </div>
    <?php if ($_smarty_tpl->tpl_vars['val']->value == '') {?>
        <img style="display: none;" height="150">
    <?php } else { ?>
        <img src="<?php echo $_smarty_tpl->tpl_vars['public']->value;
echo $_smarty_tpl->tpl_vars['val']->value;?>
" height="150">
    <?php }?>
</div><?php }
}
