<?php
/* Smarty version 3.1.30, created on 2016-10-06 13:47:29
  from "C:\wamp\www\sites\estrutura2\protected\module\admin\view\templates\fields\text\pass.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57f68021e4cc45_36412360',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '65c1ea5210a128ca68f761199a6f938b06524fb6' => 
    array (
      0 => 'C:\\wamp\\www\\sites\\estrutura2\\protected\\module\\admin\\view\\templates\\fields\\text\\pass.tpl',
      1 => 1473695475,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57f68021e4cc45_36412360 (Smarty_Internal_Template $_smarty_tpl) {
?>
<input type="password" name="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" maxlength="<?php echo $_smarty_tpl->tpl_vars['max']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['val']->value != null) {?>value='<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
'<?php }?> class='form-control' /><?php }
}
