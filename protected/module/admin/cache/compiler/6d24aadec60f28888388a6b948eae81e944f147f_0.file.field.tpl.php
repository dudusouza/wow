<?php
/* Smarty version 3.1.30, created on 2016-09-22 11:01:16
  from "C:\wamp\www\sites\estrutura\protected\module\admin\viewc\templates\fields\select\field.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e3e42c85f323_22965720',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d24aadec60f28888388a6b948eae81e944f147f' => 
    array (
      0 => 'C:\\wamp\\www\\sites\\estrutura\\protected\\module\\admin\\viewc\\templates\\fields\\select\\field.tpl',
      1 => 1473707947,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e3e42c85f323_22965720 (Smarty_Internal_Template $_smarty_tpl) {
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
