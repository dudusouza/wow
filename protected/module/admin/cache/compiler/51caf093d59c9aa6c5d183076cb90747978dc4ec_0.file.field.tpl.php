<?php
/* Smarty version 3.1.30, created on 2016-09-22 11:01:16
  from "C:\wamp\www\sites\estrutura\protected\module\admin\viewc\templates\fields\text\field.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e3e42c6b2178_35684818',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51caf093d59c9aa6c5d183076cb90747978dc4ec' => 
    array (
      0 => 'C:\\wamp\\www\\sites\\estrutura\\protected\\module\\admin\\viewc\\templates\\fields\\text\\field.tpl',
      1 => 1473692344,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e3e42c6b2178_35684818 (Smarty_Internal_Template $_smarty_tpl) {
?>
<input type="text" name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" maxlength="<?php echo $_smarty_tpl->tpl_vars['max']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['val']->value != null) {?>value='<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
'<?php }?> class='form-control' /><?php }
}
