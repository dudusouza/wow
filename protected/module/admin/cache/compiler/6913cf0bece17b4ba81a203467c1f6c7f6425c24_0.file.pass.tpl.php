<?php
/* Smarty version 3.1.30, created on 2016-09-22 11:02:28
  from "C:\wamp\www\sites\estrutura\protected\module\admin\viewc\templates\fields\text\pass.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e3e47475ff29_34116903',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6913cf0bece17b4ba81a203467c1f6c7f6425c24' => 
    array (
      0 => 'C:\\wamp\\www\\sites\\estrutura\\protected\\module\\admin\\viewc\\templates\\fields\\text\\pass.tpl',
      1 => 1473695475,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e3e47475ff29_34116903 (Smarty_Internal_Template $_smarty_tpl) {
?>
<input type="password" name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" maxlength="<?php echo $_smarty_tpl->tpl_vars['max']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['val']->value != null) {?>value='<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
'<?php }?> class='form-control' /><?php }
}
