<?php
/* Smarty version 3.1.30, created on 2016-09-15 08:36:53
  from "C:\wamp\www\structure\site\protected\module\admin\viewc\templates\fields\textarea\field.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57da87d5b9bd38_09018392',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89b91f9513e53f0934aa91fd87526b46325542ee' => 
    array (
      0 => 'C:\\wamp\\www\\structure\\site\\protected\\module\\admin\\viewc\\templates\\fields\\textarea\\field.tpl',
      1 => 1473939412,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57da87d5b9bd38_09018392 (Smarty_Internal_Template $_smarty_tpl) {
?>
<textarea name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" maxlength="<?php echo $_smarty_tpl->tpl_vars['max']->value;?>
" class="form-control"><?php if ($_smarty_tpl->tpl_vars['val']->value != null) {
echo $_smarty_tpl->tpl_vars['val']->value;
}?></textarea><?php }
}
