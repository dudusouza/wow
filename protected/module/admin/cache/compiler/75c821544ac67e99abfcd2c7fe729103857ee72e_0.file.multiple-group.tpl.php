<?php
/* Smarty version 3.1.30, created on 2016-09-22 11:02:28
  from "C:\wamp\www\sites\estrutura\protected\module\admin\viewc\templates\fields\select\multiple-group.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57e3e4748ec670_16595913',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '75c821544ac67e99abfcd2c7fe729103857ee72e' => 
    array (
      0 => 'C:\\wamp\\www\\sites\\estrutura\\protected\\module\\admin\\viewc\\templates\\fields\\select\\multiple-group.tpl',
      1 => 1473776485,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57e3e4748ec670_16595913 (Smarty_Internal_Template $_smarty_tpl) {
?>
<select class='form-control multiple' name='<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
[]' multiple >
    <option <?php if ($_smarty_tpl->tpl_vars['val']->value == '') {?>selected<?php }?>></option>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arr']->value, 'arrItem');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['arrItem']->value) {
?>
        <optgroup label="<?php echo $_smarty_tpl->tpl_vars['arrItem']->value['group'];?>
">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arrItem']->value['itens'], 'label', false, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value => $_smarty_tpl->tpl_vars['label']->value) {
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" <?php if (in_array($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl->tpl_vars['val']->value)) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['label']->value;?>
</option>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </optgroup>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</select><?php }
}
