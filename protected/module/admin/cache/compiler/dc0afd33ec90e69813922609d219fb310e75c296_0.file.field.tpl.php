<?php
/* Smarty version 3.1.30, created on 2016-09-13 15:16:29
  from "C:\wamp\www\structure\site\protected\module\admin\viewc\templates\fields\select\field.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57d8427d667959_70104752',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dc0afd33ec90e69813922609d219fb310e75c296' => 
    array (
      0 => 'C:\\wamp\\www\\structure\\site\\protected\\module\\admin\\viewc\\templates\\fields\\select\\field.tpl',
      1 => 1473707947,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57d8427d667959_70104752 (Smarty_Internal_Template $_smarty_tpl) {
?>
<select class='form-control' name='<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
' >
    <option <?php if ($_smarty_tpl->tpl_vars['val']->value == '') {?>selected<?php }?>></option>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arr']->value, 'label', false, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value => $_smarty_tpl->tpl_vars['label']->value) {
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" <?php if (($_smarty_tpl->tpl_vars['val']->value == $_smarty_tpl->tpl_vars['value']->value) && ($_smarty_tpl->tpl_vars['val']->value != '')) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['label']->value;?>
</option>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</select><?php }
}
