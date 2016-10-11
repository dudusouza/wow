<?php
/* Smarty version 3.1.30, created on 2016-10-06 10:22:29
  from "C:\wamp\www\sites\estrutura2\protected\module\admin\view\templates\fields\text\field.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57f65015cfbb89_50684716',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b78b23758068ee04b4886383c074bd0fa06fd514' => 
    array (
      0 => 'C:\\wamp\\www\\sites\\estrutura2\\protected\\module\\admin\\view\\templates\\fields\\text\\field.tpl',
      1 => 1473692344,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f65015cfbb89_50684716 (Smarty_Internal_Template $_smarty_tpl) {
?>
<input type="text" name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" maxlength="<?php echo $_smarty_tpl->tpl_vars['max']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['val']->value != null) {?>value='<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
'<?php }?> class='form-control' /><?php }
}
