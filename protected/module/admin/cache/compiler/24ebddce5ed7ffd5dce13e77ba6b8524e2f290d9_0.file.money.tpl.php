<?php
/* Smarty version 3.1.30, created on 2016-09-15 08:17:34
  from "C:\wamp\www\structure\site\protected\module\admin\viewc\templates\fields\text\money.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57da834e3b3755_47812824',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '24ebddce5ed7ffd5dce13e77ba6b8524e2f290d9' => 
    array (
      0 => 'C:\\wamp\\www\\structure\\site\\protected\\module\\admin\\viewc\\templates\\fields\\text\\money.tpl',
      1 => 1473937841,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57da834e3b3755_47812824 (Smarty_Internal_Template $_smarty_tpl) {
?>
<input type="text" name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['val']->value != null) {?>value='<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
'<?php }?> class='form-control money' /><?php }
}
