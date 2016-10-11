<?php
/* Smarty version 3.1.30, created on 2016-09-13 14:57:12
  from "C:\wamp\www\structure\site\protected\module\admin\viewc\templates\fields\text\field.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57d83df8097691_97820550',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd037662b956f7ba618aa5b7feac9bbc4faf51984' => 
    array (
      0 => 'C:\\wamp\\www\\structure\\site\\protected\\module\\admin\\viewc\\templates\\fields\\text\\field.tpl',
      1 => 1473692344,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57d83df8097691_97820550 (Smarty_Internal_Template $_smarty_tpl) {
?>
<input type="text" name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" maxlength="<?php echo $_smarty_tpl->tpl_vars['max']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['val']->value != null) {?>value='<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
'<?php }?> class='form-control' /><?php }
}
