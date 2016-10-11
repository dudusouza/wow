<?php
/* Smarty version 3.1.30, created on 2016-09-13 17:02:25
  from "C:\wamp\www\structure\site\protected\module\admin\viewc\templates\fields\text\pass.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57d85b51ea83d1_80837389',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32aec3ad6fcf53953681db66a7a09435f4e8fae0' => 
    array (
      0 => 'C:\\wamp\\www\\structure\\site\\protected\\module\\admin\\viewc\\templates\\fields\\text\\pass.tpl',
      1 => 1473695475,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57d85b51ea83d1_80837389 (Smarty_Internal_Template $_smarty_tpl) {
?>
<input type="password" name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" maxlength="<?php echo $_smarty_tpl->tpl_vars['max']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['val']->value != null) {?>value='<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
'<?php }?> class='form-control' /><?php }
}
